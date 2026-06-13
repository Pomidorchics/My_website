<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leina Alexandra</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <div class="row">
            <div class="col-12 text-center">
                <h1 class="mb-4">Login</h1>
                <form action="login.php" method="post" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-hacker-input" placeholder="login">
                    <input type="password" name="password" class="form-control-hacker-input" placeholder="password">
                    <button class="btn btn-primary" type="submit" name="submit">Login</button>
                    <p class="mt-3">Don't have an account? <a href="registration.php">Register</a></p>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>

<?php
    require_once('db.php');

    if (isset($_COOKIE['User'])) {
        header("Location: profile.php");
        exit();
    }

    $link = mysqli_connect('127.0.0.1', 'root', '371325', 'db_name');

    if (isset($_POST['submit'])) {
        $login = $_POST['login'];
        $password = $_POST['password'];

        if (!$login || !$password) die ("input all parameters");

        $sql = "SELECT * FROM users WHERE username='$login' AND password='$password'";

        $result = mysqli_query($link, $sql);

        if (mysqli_num_rows($result) == 1) {
            setcookie("User", $login, time()+7200);
            header("Location: profile.php");
        } else {
            echo 'incorrect username or password';
        }
    }
?>