<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel</title>
    <style>
        table,
        td,
        th {
            border: 1px solid black;
            text-align: left;
            height: 2rem;
            padding-left: 5px;
            padding-right: 5px;
        }

        table {
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <?php
    include("koneksiodbc.php");
    ?>
    <form action="delete.php" method="post">
        <button type="submit">DELETE</button>
    </form>
    <br>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Tgl Test</th>
                <th>Kolom</th>
                <th>Soal</th>
                <th>Jawaban</th>
                <th>Kunci</th>
                <th>Benar</th>
                <th>Salah</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT * FROM PUB.kraplin ORDER BY cemail, nkolom, dtgltest WITH(NOLOCK)";
            $res = odbc_exec($conn, $sql);
            while ($data = odbc_fetch_array($res)) {
            ?>
                <tr>
                    <td><? echo $data['id'] ?></td>
                    <td><? echo $data['cnama'] ?></td>
                    <td><? echo $data['cemail'] ?></td>
                    <td><? echo $data['dtgltest'] ?></td>
                    <td><? echo $data['nkolom'] ?></td>
                    <td><? echo $data['csoal'] ?></td>
                    <td><? echo $data['cjawaban'] ?></td>
                    <td><? echo $data['ckunci'] ?></td>
                    <td><? echo $data['nbnr'] ?></td>
                    <td><? echo $data['nslh'] ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</body>

</html>