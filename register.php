<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sendpulse test</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<div class="container">
    <form class="form-register">
        <h2 class="form-signin-heading">Plz register</h2>

        <label for="inputEmail" class="sr-only">Enter name</label>
        <input type="text" id="inputName" class="form-control" placeholder="Your name" required>

        <label for="inputEmail" class="sr-only">Enter Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required>

        <label for="inputPassword" class="sr-only">Enter Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Your password" required>

        <label for="repeatPassword" class="sr-only">Enter Password again</label>
        <input type="password" id="repeatPassword" class="form-control" placeholder="Confirm password" required>
        <hr>
        <button class="btn btn-success" type="submit">Register</button>
        <button class="btn btn-default to-main-page">Return</button>
    </form>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/main.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>

</body>
</html>
