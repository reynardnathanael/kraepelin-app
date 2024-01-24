<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/login.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin" method="post" action="countdown.php">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-bold">Kraeplin Test</h1>
            <p>Silahkan mengisi nama dan email yang aktif</p>
        </div>

        <div class="form-label-group">
            <input type="text" id="nama" name="nama" class="form-control" placeholder="Name" required autofocus>
            <label for="nama">Name</label>
        </div>

        <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="email">Email address</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
        <!-- <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p> -->
    </form>
</body>

</html>