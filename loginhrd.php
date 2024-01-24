<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login HRD</title>

    <!-- Bootstrap core CSS -->
    <link href="style/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="style/css/login.css" rel="stylesheet">
</head>

<body>
    <form class="form-signin" method="post" action="list.php">
        <div class="text-center mb-4">
            <h1 class="h3 mb-3 font-weight-bold">Welcome HRD!</h1>
            <p>Silahkan mengisi email dan password yang sesuai</p>
        </div>

        <div class="form-label-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email address" required autofocus>
            <label for="email">Email address</label>
        </div>

        <div class="form-label-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Name" required autofocus>
            <label for="password">Password</label>
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>
</body>

</html>