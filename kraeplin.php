<?php
if (!isset($_POST['nama']) || !isset($_POST['email'])) {
    header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kraeplin Test</title>

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
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between">
        <a class="navbar-brand" href="#">Kraeplin Test</a>
        <!-- <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button> -->
    </nav>

    <main role="main" class="container">

        <div class="starter-template" id="row1">
            <div class="row d-flex justify-content-center">
                <?php
                for ($j = 1; $j <= 10; $j++) {
                ?>
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        for ($i = 1; $i <= 40; $i++) {
                            $soal = mt_rand(0, 9);
                        ?>
                            <div class="row" style="text-align: left;">
                                <label id="soal<?php echo $j . "-" . $i ?>"><? echo $soal ?></label>
                            </div>

                            <?php
                            if ($i != 40) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input id="jwbn<?php echo $j . "-" . $i ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0">
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
                <?php
                for ($j = 11; $j <= 20; $j++) {
                ?>
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        for ($i = 1; $i <= 40; $i++) {
                            $soal = mt_rand(0, 9);
                        ?>
                            <div class="row" style="text-align: left;">
                                <label id="soal<?php echo $j . "-" . $i ?>"><? echo $soal ?></label>
                            </div>

                            <?php
                            if ($i != 40) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input id="jwbn<?php echo $j . "-" . $i ?>" type="number" maxlength="1" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0">
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
                <?php
                for ($j = 21; $j <= 30; $j++) {
                ?>
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        for ($i = 1; $i <= 40; $i++) {
                            $soal = mt_rand(0, 9);
                        ?>
                            <div class="row" style="text-align: left;">
                                <label id="soal<?php echo $j . "-" . $i ?>"><? echo $soal ?></label>
                            </div>

                            <?php
                            if ($i != 40) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input id="jwbn<?php echo $j . "-" . $i ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0">
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
                <?php
                for ($j = 31; $j <= 40; $j++) {
                ?>
                    <div class="col-sm-1 pl-5 pr-4 mr-2">
                        <?php
                        for ($i = 1; $i <= 40; $i++) {
                            $soal = mt_rand(0, 9);
                        ?>
                            <div class="row" style="text-align: left;">
                                <label id="soal<?php echo $j . "-" . $i ?>"><? echo $soal ?></label>
                            </div>

                            <?php
                            if ($i != 40) {
                            ?>
                                <div class="row justify-content-end" style="text-align: right;">
                                    <div class="col-xs-2" style="text-align: right;">
                                        <input id="jwbn<?php echo $j . "-" . $i ?>" type="number" maxlength="1" class="form-control input-sm inputan" style="width: 30px; text-align: right; padding:0">
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
        <!-- <button class="btn btn-success" id="coba">TESTING</button> -->
        <!-- <div id="cekk"></div> -->

    </main><!-- /.container -->

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
        $("#jwbn1-39").focus();
        window.scrollTo(0, document.body.scrollHeight);

        // max length for each input is 1
        document.querySelectorAll('input[type="number"]').forEach(input => {
            input.oninput = () => {
                if (input.value.length > input.maxLength) input.value = input.value.slice(0, input.maxLength);
            }
        })
        // count all soal
        const arrsoal = [];
        for (let j = 1; j <= 40; j++) {
            var tampungsoal = '';
            for (let i = 1; i <= 40; i++) {
                var soal = $("#soal" + j + "-" + i).html();
                // arrs.push(soal);
                tampungsoal += soal + ",";
            }
            arrsoal.push(tampungsoal.substring(0, tampungsoal.length - 1));
        }
        console.log(arrsoal);

        // count all answer
        const arr = [];
        for (let j = 1; j <= 40; j++) {
            // const arr2 = [];
            var tampungkunci = '';
            for (let i = 1; i < 40; i++) {
                var hasil = ($("#soal" + j + "-" + i).html() * 1) + ($("#soal" + j + "-" + (i + 1)).html() * 1);
                if (hasil.toString().length == 2) {
                    var divide = hasil.toString().substring(1, 2);
                    // arr2.push(divide);
                    tampungkunci += divide + ",";
                } else {
                    // arr2.push(hasil.toString());
                    tampungkunci += hasil.toString() + ",";
                }
            }
            // arr.push(arr2);
            arr.push(tampungkunci.substring(0, tampungkunci.length - 1))
        }
        console.log(arr);

        // trigger when user input number
        $(".inputan").keyup(function() {
            if ($(this).val() != '') {
                var id = $(this).attr("id");
                var replace = id.replace("jwbn", "");
                const arrnumber = replace.split("-");
                var counter = (arrnumber[1] * 1) - 1;
                $("#jwbn" + arrnumber[0] + "-" + counter).focus();
                window.scrollBy(0, -50);
            }
        });

        const jawaban = [];
        var kolom = 0;
        // SET COUNTDOWN
        function countdown(current) {
            var counter = 10;
            if (kolom >= 20 && kolom < 30) {
                counter = 20;
            } else if (kolom >= 30) {
                counter = 30;
            }

            var interval = setInterval(function() {
                counter--;
                if (counter == 0) {
                    clearInterval(interval);
                    for (let a = 1; a <= 39; a++) {
                        $("#jwbn" + (current - 1 * 1) + "-" + a).attr('disabled', 'disabled');
                    }
                    kolom++;
                    if (kolom == 10) {
                        for (let j = 1; j <= 10; j++) {
                            var tampungjawaban = '';
                            for (let i = 1; i < 40; i++) {
                                var jawab = $("#jwbn" + j + "-" + i).val();
                                if (jawab == '') {
                                    // arrbantu.push("s");
                                    tampungjawaban += "s,";
                                } else {
                                    // arrbantu.push(jawab.toString());
                                    tampungjawaban += jawab.toString() + ",";
                                }
                            }
                            // jawaban.push(arrbantu);
                            jawaban.push(tampungjawaban.substring(0, tampungjawaban.length - 1))
                        }
                        $("#row1").hide();
                        $("#row2").show();
                        $("#jwbn11-39").focus();
                    } else if (kolom == 20) {
                        for (let j = 11; j <= 20; j++) {
                            var tampungjawaban = '';
                            for (let i = 1; i < 40; i++) {
                                var jawab = $("#jwbn" + j + "-" + i).val();
                                if (jawab == '') {
                                    // arrbantu.push("s");
                                    tampungjawaban += "s,";
                                } else {
                                    // arrbantu.push(jawab.toString());
                                    tampungjawaban += jawab.toString() + ",";
                                }
                            }
                            // jawaban.push(arrbantu);
                            jawaban.push(tampungjawaban.substring(0, tampungjawaban.length - 1))
                        }
                        $("#row2").hide();
                        $("#row3").show();
                        $("#jwbn21-39").focus();
                    } else if (kolom == 30) {
                        for (let j = 21; j <= 30; j++) {
                            var tampungjawaban = '';
                            for (let i = 1; i < 40; i++) {
                                var jawab = $("#jwbn" + j + "-" + i).val();
                                if (jawab == '') {
                                    // arrbantu.push("s");
                                    tampungjawaban += "s,";
                                } else {
                                    // arrbantu.push(jawab.toString());
                                    tampungjawaban += jawab.toString() + ",";
                                }
                            }
                            // jawaban.push(arrbantu);
                            jawaban.push(tampungjawaban.substring(0, tampungjawaban.length - 1))
                        }
                        $("#row3").hide();
                        $("#row4").show();
                        $("#jwbn31-39").focus();
                    }
                    // console.log(kolom);
                    $("#jwbn" + current + "-" + "39").focus();
                    window.scrollTo(0, document.body.scrollHeight);
                    if (kolom != 40) {
                        countdown((current + 1) * 1);
                    } else {
                        for (let j = 31; j <= 40; j++) {
                            var tampungjawaban = '';
                            for (let i = 1; i < 40; i++) {
                                var jawab = $("#jwbn" + j + "-" + i).val();
                                if (jawab == '') {
                                    // arrbantu.push("s");
                                    tampungjawaban += "s,";
                                } else {
                                    // arrbantu.push(jawab.toString());
                                    tampungjawaban += jawab.toString() + ",";
                                }
                            }
                            // jawaban.push(arrbantu);
                            jawaban.push(tampungjawaban.substring(0, tampungjawaban.length - 1))
                        }
                        console.log(jawaban);
                        $.ajax({
                            type: "POST",
                            url: "insert.php",
                            data: {
                                nama: "<?php echo $_POST['nama'] ?>",
                                email: "<?php echo $_POST['email'] ?>",
                                kunci: arr,
                                jawaban: jawaban,
                                soal: arrsoal,
                            },
                            success: function(data) {
                                // $("#cekk").html(data);
                                // console.log("aaa");
                                // alert(data.responseText);
                                alert("Waktu habis. Silahkan menghubungi HRD untuk instruksi selanjutnya!");
                                window.location = 'login.php';
                            },
                            error: function(data) {
                                alert(data.responseText);
                            }
                        });
                    }
                }
            }, 1000);
        }
        countdown(2);

        // kalau minimize/ganti tab, website akan ter-refresh secara otomatis
        document.addEventListener('visibilitychange', function() {
            if (document.hidden) {
                window.location.replace("login.php");
            }
        });

        window.onbeforeunload = function() {
            window.setTimeout(function() {
                window.location = 'login.php';
            }, 0);
            window.onbeforeunload = null; // necessary to prevent infinite loop, that kills your browser 
        }

        window.history.pushState(null, "", window.location.href);
        window.onpopstate = function() {
            window.history.pushState(null, "", window.location.href);
        }
    </script>
</body>

</html>