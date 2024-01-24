<?php
    $conn = new mysqli("localhost", "root", "", "kraepelin");
    if ($conn->connect_errno) {    
        echo "Failed to connect to MySQL: " . $conn->connect_error;
    }

    $date = date("Y-m-d H:i:s");
    $time = date("H:m:s");
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $arrkunci = $_POST['kunci'];
    $arrjawaban = $_POST['jawaban'];
    $arrsoal = $_POST['soal'];

    for ($i = 0; $i < 40; $i++) {
        $benar = 0;
        $salah = 0;
        $kunci = '';
        $soal = '';
        $jawaban = '';
        
        $explodesoal = explode(",", $arrsoal[$i]);
        $explodekunci = explode(",", $arrkunci[$i]);
        $explodejawaban = explode(",", $arrjawaban[$i]);

        $j = 39;
        while($j >= 0) {
            if ($j != 39) {
                $kunci .= $explodekunci[$j] . ",";
                $jawaban .= $explodejawaban[$j] . ",";
                if ($explodekunci[$j] == $explodejawaban[$j]) {
                    $benar += 1;
                } 
                else {
                    if ($explodejawaban[$j] != 's') {
                        $salah += 1;
                    }
                }
            }
            $soal .= $explodesoal[$j] . ",";
            $j-=1;
        }
        // sql syntaks
        $finalkunci = rtrim($kunci, ",");
        $finaljawaban = rtrim($jawaban, ",");
        $finalsoal = rtrim($soal, ",");

        $kolom = $i+1;
        $sql = "INSERT INTO kraepelin(cnama,cemail,dtgltest,nkolom,csoal,cjawaban,ckunci,nbnr,nslh) VALUES(?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssisssii',$nama,$email,$date,$kolom,$finalsoal,$finaljawaban,$finalkunci,$benar,$salah); 
        $stmt->execute();
    }
        // echo "<p>".$_POST['email']."</p>";
?>
