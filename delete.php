<?php
    include("koneksiodbc.php");

    // $sql = "DELETE FROM PUB.kraplin WHERE cnama='aa'";
    // $sql = "UPDATE PUB.kraplin SET cjawaban='1,0,1,1,7,5,6,9,3,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s,s' WHERE nkolom=2";
    $sql = "UPDATE PUB.kraplin SET nslh=3 WHERE nkolom=2";
    $res = odbc_exec($conn, $sql);
    header("location: database.php");
