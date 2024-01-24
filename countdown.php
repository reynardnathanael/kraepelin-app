<?php
if (!isset($_POST['nama']) || !isset($_POST['email'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kraeplin Test</title>
    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        a {
            cursor: pointer;
            text-decoration: none;
            color: #ccc;
        }

        a:hover {
            color: #fff;
        }

        ul {
            list-style: none
        }

        .clearfix:before,
        .clearfix:after {
            content: " ";
            display: table;
        }

        .clearfix:after {
            clear: both;
        }

        .clearfix {
            *zoom: 1;
        }

        /* Main */

        html,
        body {
            min-height: 100%;
        }

        body {
            font: normal 11px "Helvetica Neue", Helvetica, sans-serif;
            user-select: none;
            color: #888;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .3);
            background: rgb(150, 150, 150);
            background: -moz-radial-gradient(center, ellipse cover, rgba(150, 150, 150, 1) 0%, rgba(89, 89, 89, 1) 100%);
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(150, 150, 150, 1)), color-stop(100%, rgba(89, 89, 89, 1)));
            background: -webkit-radial-gradient(center, ellipse cover, rgba(150, 150, 150, 1) 0%, rgba(89, 89, 89, 1) 100%);
            background: -o-radial-gradient(center, ellipse cover, rgba(150, 150, 150, 1) 0%, rgba(89, 89, 89, 1) 100%);
            background: -ms-radial-gradient(center, ellipse cover, rgba(150, 150, 150, 1) 0%, rgba(89, 89, 89, 1) 100%);
            background: radial-gradient(ellipse at center, rgba(150, 150, 150, 1) 0%, rgba(89, 89, 89, 1) 100%);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#969696', endColorstr='#595959', GradientType=1);

        }

        .container {
            text-align: center;
            position: absolute;
            left: 50%;
            top: 50%;
            width: 140px;
            height: 90px;
            margin: -45px 0 0 -70px;
        }

        #social {
            text-align: center;
            position: absolute;
            bottom: 14%;
            width: 100%;
        }

        #social p {
            margin-bottom: 10px;
        }

        #social ul,
        #social li {
            display: inline-block;
        }

        /* Skeleton */

        ul.flip {
            position: relative;
            float: left;
            margin: 5px;
            width: 60px;
            height: 90px;
            font-size: 80px;
            font-weight: bold;
            line-height: 87px;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, .7);
        }

        ul.flip li {
            z-index: 1;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;

        }

        ul.flip li:first-child {
            z-index: 2;
        }

        ul.flip li a {
            display: block;
            height: 100%;
            perspective: 200px;
        }

        ul.flip li a div {
            z-index: 1;
            position: absolute;
            left: 0;
            width: 100%;
            height: 50%;
            overflow: hidden;
        }

        ul.flip li a div .shadow {
            position: absolute;
            width: 100%;
            height: 100%;
            z-index: 2;
        }

        ul.flip li a div.up {
            transform-origin: 50% 100%;
            top: 0;
        }

        ul.flip li a div.up:after {
            content: "";
            position: absolute;
            top: 44px;
            left: 0;
            z-index: 5;
            width: 100%;
            height: 3px;
            background-color: rgba(0, 0, 0, .4);
        }

        ul.flip li a div.down {
            transform-origin: 50% 0%;
            bottom: 0;
        }

        ul.flip li a div div.inn {
            position: absolute;
            left: 0;
            z-index: 1;
            width: 100%;
            height: 200%;
            color: #ccc;
            text-shadow: 0 1px 2px #000;
            text-align: center;
            background-color: #333;
            border-radius: 6px;
        }

        ul.flip li a div.up div.inn {
            top: 0;

        }

        ul.flip li a div.down div.inn {
            bottom: 0;
        }

        /* PLAY */

        body.play ul li.before {
            z-index: 3;
        }

        body.play ul li.active {
            animation: asd .5s .5s linear both;
            z-index: 2;
        }

        @keyframes asd {
            0% {
                z-index: 2;
            }

            5% {
                z-index: 4;
            }

            100% {
                z-index: 4;
            }
        }

        body.play ul li.active .down {
            z-index: 2;
            animation: turn .5s .5s linear both;
        }

        @keyframes turn {
            0% {
                transform: rotateX(90deg);
            }

            100% {
                transform: rotateX(0deg);
            }
        }

        body.play ul li.before .up {
            z-index: 2;
            animation: turn2 .5s linear both;
        }

        @keyframes turn2 {
            0% {
                transform: rotateX(0deg);
            }

            100% {
                transform: rotateX(-90deg);
            }
        }

        /* SHADOW */

        body.play ul li.before .up .shadow {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
            background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            animation: show .5s linear both;
        }

        body.play ul li.active .up .shadow {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, .1)), color-stop(100%, rgba(0, 0, 0, 1)));
            background: linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, .1) 0%, rgba(0, 0, 0, 1) 100%);
            animation: hide .5s .3s linear both;
        }

        /*DOWN*/

        body.play ul li.before .down .shadow {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
            background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            animation: show .5s linear both;
        }

        body.play ul li.active .down .shadow {
            background: -moz-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, rgba(0, 0, 0, 1)), color-stop(100%, rgba(0, 0, 0, .1)));
            background: linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -o-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: -ms-linear-gradient(top, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            background: linear-gradient(to bottom, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, .1) 100%);
            animation: hide .5s .3s linear both;
        }

        @keyframes show {
            0% {
                opacity: 0;
            }

            100% {
                opacity: 1;
            }
        }

        @keyframes hide {
            0% {
                opacity: 1;
            }

            100% {
                opacity: 0;
            }
        }
    </style>
</head>

<body>
    <?php
        $nama = $_POST['nama'];
        $email = $_POST['email'];
    ?>
    <form action="kraeplin.php" method="post" id="hiddenform">
        <input type="hidden" name="nama" value="<? echo $nama ?>">
        <input type="hidden" name="email" value="<? echo $email ?>">
    </form>
    <div class="container">
        <ul class="flip minutePlay">
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">0</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">0</div>
                    </div>
                </a>
            </li>
        </ul>
        <ul class="flip secondPlay">
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">0</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">0</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">5</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">5</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">4</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">4</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">3</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">3</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">2</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">2</div>
                    </div>
                </a>
            </li>
            <li>
                <a href="#">
                    <div class="up">
                        <div class="shadow"></div>
                        <div class="inn">1</div>
                    </div>
                    <div class="down">
                        <div class="shadow"></div>
                        <div class="inn">1</div>
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <script src="style/js/jquery.min.js"></script>
    <script>
        setInterval(function() {
            secondPlay()
        }, 1000);


        setInterval(function() {
            minutePlay()
        }, 10000);


        function secondPlay() {
            $("body").removeClass("play");
            var aa = $("ul.secondPlay li.active");

            if (aa.html() == undefined) {
                aa = $("ul.secondPlay li").eq(0);
                aa.addClass("before")
                    .removeClass("active")
                    .next("li")
                    .addClass("active")
                    .closest("body")
                    .addClass("play");

            } else if (aa.is(":last-child")) {
                $("ul.secondPlay li").removeClass("before");
                aa.addClass("before").removeClass("active");
                aa = $("ul.secondPlay li").eq(0);
                aa.addClass("active")
                    .closest("body")
                    .addClass("play");
                // window.open("kraeplin.php", "_self");
                document.getElementById("hiddenform").submit();
            } else {
                $("ul.secondPlay li").removeClass("before");
                aa.addClass("before")
                    .removeClass("active")
                    .next("li")
                    .addClass("active")
                    .closest("body")
                    .addClass("play");
            }

        }

        function minutePlay() {
            $("body").removeClass("play");
            var aa = $("ul.minutePlay li.active");

            if (aa.html() == undefined) {
                aa = $("ul.minutePlay li").eq(0);
                aa.addClass("before")
                    .removeClass("active")
                    .next("li")
                    .addClass("active")
                    .closest("body")
                    .addClass("play");

            } else if (aa.is(":last-child")) {
                $("ul.minutePlay li").removeClass("before");
                aa.addClass("before").removeClass("active");
                aa = $("ul.minutePlay li").eq(0);
                aa.addClass("active")
                    .closest("body")
                    .addClass("play");
            } else {
                $("ul.minutePlay li").removeClass("before");
                aa.addClass("before")
                    .removeClass("active")
                    .next("li")
                    .addClass("active")
                    .closest("body")
                    .addClass("play");
            }

        }

        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        }
    </script>
</body>

</html>