<?php
session_start();
if (!isset($_SESSION['email']) || !isset($_SESSION['password'])) {
    if ($_POST['email'] != "hrd@gmail.com" || $_POST['password'] != "password") {
        header("location: loginhrd.php");
    }
    else {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['password'] = $_POST['password'];
    }
}
else {
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
    <title>List</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/kraeplin.css" rel="stylesheet">
</head>

<body>
    <?php
        $conn = new mysqli("localhost", "root", "", "kraepelin");
        if ($conn->connect_errno) {    
            echo "Failed to connect to MySQL: " . $conn->connect_error;
        }
    ?>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top d-flex justify-content-between">
        <a class="navbar-brand" href="#">Hasil Tes Peserta</a>
    </nav>

    <main role="main" class="container">
        <div class="starter-template" id="row1">
            <div class="row d-flex justify-content-center">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Tgl Test</th>
                                <th scope="col">Benar</th>
                                <th scope="col">Salah</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT MIN(cemail) as 'email', MIN(cnama) as 'nama', MIN(dtgltest) as 'tgl', SUM(nbnr) as 'bnr', SUM(nslh) as 'slh' FROM kraepelin GROUP BY cemail";
                            $res = mysqli_query($conn, $sql);
                            while($data = mysqli_fetch_array($res)) {
                            ?>
                                <tr>
                                    <td><? echo $data['nama'] ?></td>
                                    <td><? echo $data['email'] ?></td>
                                    <td><? echo date('d/m/Y', strtotime($data['tgl'])) ?></td>
                                    <td><? echo $data['bnr'] ?></td>
                                    <td><? echo $data['slh'] ?></td>
                                    <td>
                                        <a class="btn btn-primary" href="result.php?email=<? echo $data['email'] ?>&nama=<? echo $data['nama'] ?>&tgl=<? echo date('d/m/Y', strtotime($data['tgl'])) ?>" target="_blank">Show</a>
                                        <a class="btn btn-success" href="export.php?email=<? echo $data['email'] ?>&nama=<? echo $data['nama'] ?>&tgl=<? echo date('d/m/Y', strtotime($data['tgl'])) ?>" target="_blank">Export</a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

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
</body>

</html>