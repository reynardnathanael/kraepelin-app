<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    header("location: loginhrd.php");
} else {
    if ($_SESSION['email'] != "hrd@gmail.com" || $_SESSION['password'] != "password") {
        header("location: loginhrd.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Result</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/kraeplin.css" rel="stylesheet">

    <style>
        #row2,
        #row3,
        #row4 {
            display: none;
        }

        /* Chrome, Safari, Edge, Opera */
        input[type=number]::-webkit-outer-spin-button,
        input[type=number]::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
    </style>
</head>

<body>
    <?php
    $con = new mysqli("localhost", "root", "", "kraepelin");
    if ($con->connect_errno) {    
        echo "Failed to connect to MySQL: " . $con->connect_error;
    }

    if (isset($_GET['email']) && isset($_GET['nama'])) {
        $email = $_GET['email'];
        $nama = $_GET['nama'];
        $tgl = $_GET['tgl'];
    ?>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between">
            <a class="navbar-brand" href="#">Result (<? echo $nama ?>)</a>
            <button id="export" class="btn btn-outline-success my-2 my-sm-0" type="button">Export</button>
        </nav>

        <main role="main" class="container">

            <div class="starter-template" id="row1">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        $i = 39;
                        while ($i >= 0) {
                        ?>
                            <div class="row" style="text-align: left;">
                                <label>&nbsp;</label>
                            </div>
                            <?php
                            if ($i != 0) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input value="<?php echo $i ?>" type="text" class="form-control input-sm" style="width: 30px; text-align: left; padding:0;border-color: white;background:white" disabled>
                                    </div>
                                </div>
                        <?php
                            }
                            $i--;
                        }
                        ?>
                    </div>
                    <?php
                    $sql = "SELECT * FROM kraepelin WHERE nkolom <= 10 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc";
                    $res = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-sm-1 pl-5 pr-4 mr-2">
                            <?php
                            $arrsoal = explode(",", $data['csoal']);
                            $arrsoalreverse = array_reverse($arrsoal);

                            $arrjawaban = explode(",", $data['cjawaban']);
                            $arrjawabanreverse = array_reverse($arrjawaban);

                            $arrkunci = explode(",", $data['ckunci']);
                            $arrkuncireverse = array_reverse($arrkunci);

                            for ($j = 0; $j < count($arrsoalreverse); $j++) {
                                $bgcolor = "";
                            ?>
                                <div class="row" style="text-align: left;">
                                    <label><? echo $arrsoalreverse[$j] ?></label>
                                </div>
                                <?php
                                if ($j != count($arrsoalreverse) - 1) {
                                    if ($arrjawabanreverse[$j] != $arrkuncireverse[$j]) {
                                        $bgcolor = "color:white; background:red";
                                    }
                                ?>
                                    <div class="row justify-content-end" style="text-align: right;">
                                        <div class="col-xs-2" style="text-align: right;">
                                            <input value="<?php echo $arrjawabanreverse[$j] ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0; <? echo $bgcolor ?>" disabled>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="starter-template" id="row2">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        $i = 39;
                        while ($i >= 0) {
                        ?>
                            <div class="row" style="text-align: left;">
                                <label>&nbsp;</label>
                            </div>
                            <?php
                            if ($i != 0) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input value="<?php echo $i ?>" type="text" class="form-control input-sm" style="width: 30px; text-align: left; padding:0;border-color: white;background:white" disabled>
                                    </div>
                                </div>
                        <?php
                            }
                            $i--;
                        }
                        ?>
                    </div>
                    <?php
                    $sql = "SELECT * FROM kraepelin WHERE nkolom > 10 AND nkolom <= 20 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc";
                    $res = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-sm-1 pl-5 pr-4 mr-2">
                            <?php
                            $arrsoal = explode(",", $data['csoal']);
                            $arrsoalreverse = array_reverse($arrsoal);

                            $arrjawaban = explode(",", $data['cjawaban']);
                            $arrjawabanreverse = array_reverse($arrjawaban);

                            $arrkunci = explode(",", $data['ckunci']);
                            $arrkuncireverse = array_reverse($arrkunci);

                            for ($j = 0; $j < count($arrsoalreverse); $j++) {
                                $bgcolor = "";
                            ?>
                                <div class="row" style="text-align: left;">
                                    <label><? echo $arrsoalreverse[$j] ?></label>
                                </div>
                                <?php
                                if ($j != count($arrsoalreverse) - 1) {
                                    if ($arrjawabanreverse[$j] != $arrkuncireverse[$j]) {
                                        $bgcolor = "color:white; background:red";
                                    }
                                ?>
                                    <div class="row justify-content-end" style="text-align: right;">
                                        <div class="col-xs-2" style="text-align: right;">
                                            <input value="<?php echo $arrjawabanreverse[$j] ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0; <? echo $bgcolor ?>" disabled>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="starter-template" id="row3">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        $i = 39;
                        while ($i >= 0) {
                        ?>
                            <div class="row" style="text-align: left;">
                                <label>&nbsp;</label>
                            </div>
                            <?php
                            if ($i != 0) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input value="<?php echo $i ?>" type="text" class="form-control input-sm" style="width: 30px; text-align: left; padding:0;border-color: white;background:white" disabled>
                                    </div>
                                </div>
                        <?php
                            }
                            $i--;
                        }
                        ?>
                    </div>
                    <?php
                    $sql = "SELECT * FROM kraepelin WHERE nkolom > 20 AND nkolom <= 30 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc";
                    $res = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-sm-1 pl-5 pr-4 mr-2">
                            <?php
                            $arrsoal = explode(",", $data['csoal']);
                            $arrsoalreverse = array_reverse($arrsoal);

                            $arrjawaban = explode(",", $data['cjawaban']);
                            $arrjawabanreverse = array_reverse($arrjawaban);

                            $arrkunci = explode(",", $data['ckunci']);
                            $arrkuncireverse = array_reverse($arrkunci);

                            for ($j = 0; $j < count($arrsoalreverse); $j++) {
                                $bgcolor = "";
                            ?>
                                <div class="row" style="text-align: left;">
                                    <label><? echo $arrsoalreverse[$j] ?></label>
                                </div>
                                <?php
                                if ($j != count($arrsoalreverse) - 1) {
                                    if ($arrjawabanreverse[$j] != $arrkuncireverse[$j]) {
                                        $bgcolor = "color:white; background:red";
                                    }
                                ?>
                                    <div class="row justify-content-end" style="text-align: right;">
                                        <div class="col-xs-2" style="text-align: right;">
                                            <input value="<?php echo $arrjawabanreverse[$j] ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0; <? echo $bgcolor ?>" disabled>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="starter-template" id="row4">
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        $i = 39;
                        while ($i >= 0) {
                        ?>
                            <div class="row" style="text-align: left;">
                                <label>&nbsp;</label>
                            </div>
                            <?php
                            if ($i != 0) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input value="<?php echo $i ?>" type="text" class="form-control input-sm" style="width: 30px; text-align: left; padding:0;border-color: white;background:white" disabled>
                                    </div>
                                </div>
                        <?php
                            }
                            $i--;
                        }
                        ?>
                    </div>
                    <?php
                    $sql = "SELECT * FROM kraepelin WHERE nkolom > 30 AND nkolom <= 40 AND cemail = '$email' AND cnama = '$nama' ORDER BY nkolom asc";
                    $res = mysqli_query($con, $sql);
                    while ($data = mysqli_fetch_array($res)) {
                    ?>
                        <div class="col-sm-1 pl-5 pr-4 mr-2">
                            <?php
                            $arrsoal = explode(",", $data['csoal']);
                            $arrsoalreverse = array_reverse($arrsoal);

                            $arrjawaban = explode(",", $data['cjawaban']);
                            $arrjawabanreverse = array_reverse($arrjawaban);

                            $arrkunci = explode(",", $data['ckunci']);
                            $arrkuncireverse = array_reverse($arrkunci);

                            for ($j = 0; $j < count($arrsoalreverse); $j++) {
                                $bgcolor = "";
                            ?>
                                <div class="row" style="text-align: left;">
                                    <label><? echo $arrsoalreverse[$j] ?></label>
                                </div>
                                <?php
                                if ($j != count($arrsoalreverse) - 1) {
                                    if ($arrjawabanreverse[$j] != $arrkuncireverse[$j]) {
                                        $bgcolor = "color:white; background:red";
                                    }
                                ?>
                                    <div class="row justify-content-end" style="text-align: right;">
                                        <div class="col-xs-2" style="text-align: right;">
                                            <input value="<?php echo $arrjawabanreverse[$j] ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0; <? echo $bgcolor ?>" disabled>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <br>
            <div class="starter-template">
                <div class="row d-flex justify-content-center">
                    <nav aria-label="...">
                        <ul class="pagination">
                            <li class="page-item active"><a id="1" class="page-link">1</a></li>
                            <li class="page-item"><a id="2" class="page-link">2</a></li>
                            <li class="page-item"><a id="3" class="page-link">3</a></li>
                            <li class="page-item"><a id="4" class="page-link">4</a></li>
                        </ul>
                    </nav>
                </div>
            </div>

        </main>
    <?php
    }
    ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="style/js/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="style/js/jquery-slim.min.js"><\/script>')
    </script>
    <script src="style/js/popper.min.js"></script>
    <script src="style/js/bootstrap.min.js"></script>
    <script>
        window.scrollTo(0, document.body.scrollHeight);
        $(".page-link").click(function() {
            var pastid = $(".active").children().attr("id");
            // console.log(pastid);
            $("#row" + pastid).hide();
            $(".active").removeClass("active");

            var currentid = $(this).attr("id");
            $("#row" + currentid).show();
            $(this).parent().addClass("active");
            window.scrollTo(0, document.body.scrollHeight);
        });

        $("#export").click(function() {
            window.open("export.php?email=" + "<? echo $email ?>" + "&" + "nama=" + "<? echo $nama ?>" + "&" + "tgl=" + "<? echo $tgl ?>");
        });
    </script>
</body>

</html>