<?php
$servername = "127.0.0.1";
$username = "root";
$password = "371325";
$dbName = "db_name";

$link = mysqli_connect($servername, $username, $password);

if (!$link) {
    die("Connection error: " . mysqli_connection_error());
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbName";

if (!mysqli_query($link, $sql)) {
    die("Failed to create db");
    //echo "Failed to create db";
}

mysqli_close($link);

$link = mysqli_connect($servername, $username, $password, $dbName);

$sql = "CREATE TABLE IF NOT EXISTS users(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(20) NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create table Users";
}

$sql = "CREATE TABLE IF NOT EXISTS posts(
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(20) NOT NULL,
    main_text TEXT NOT NULL
)";

if (!mysqli_query($link, $sql)) {
    echo "Failed to create table Posts";
}

mysqli_close($link);
?>