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
                <h1 class="mb-4">Registration</h1>
                <form action="registration.php" method="post" class="d-flex flex-column gap-3">
                    <input type="text" name="login" class="form-control-hacker-input" placeholder="login">
                    <input type="email" name="email" class="form-control-hacker-input" placeholder="email">
                    <input type="password" name="password" class="form-control-hacker-input" placeholder="password">
                    <button class="btn btn-primary" type="submit" name="submit">Register</button>
                    <p class="mt-3">Already have an account? <a href="login.php">Login</a></p>
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
        $email = $_POST['email'];
        $password = $_POST['password'];

        if (!$login || !$email ||!$password) die ("input all parameters");

        $sql = "INSERT INTO users (username, email, password) VALUES ('$login', '$email', '$password')";

        if (!mysqli_query($link, $sql)) {
            echo "Failed to add user";
        } else {
            header("Location: login.php");
            exit();
        }
    }
?>