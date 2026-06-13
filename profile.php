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
    <nav class="navbar navbar-dark bg-dark p-3">
        <div class="container-fluid">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <img src="logohack.png" alt="логотип-сайта" class="me-2">
                <span class="text-light">History</span>
            </a>
            <?php if (isset($_COOKIE['User'])): ?>
                <form action="logout.php" method="post" class="d-flex">
                    <button class="btn btn-outline-danger" type="submit">Logout</button>
                </form>
            <?php endif; ?>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="story-container">
            <div class="story-text">
                <p>Well, Prince, so Genoa and Lucca are now just family estates of the Buonapartes. But I warn you, if you don’t tell me that this means war, if you still try to defend the infamies and horrors perpetrated by that Antichrist—I really believe he is Antichrist—I will have nothing more to do with you and you are no longer my friend, no longer my ‘faithful slave,’ as you call yourself! But how do you do? I see I have frightened you—sit down and tell me all the news.</p>
            </div>
            <img src="hack1.png" alt="фото-хакера" class="hacker-img">
        </div>

        <div class="text-center mt-4">
            <button id="toggleButton" class="btn btn-primary">Open</button>
        </div>
        <div id="extraImage" class="mt-3 text-center" style="display: none;">
            <img class="hacker-img" src="hack2.png" alt="скрытое-фото">
        </div>

        <div class="mt-5">
            <h2 class="text-center mb-4">Add New Post</h2>
            <form action="profile.php" id="postForm" class="d-flex flex-column gap-3" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle" class="form-label">Post Title</label>
                    <input type="text" name="postTitle" id="postTitle" class="form-control hacker-input" placeholder="Enter post Title" required>
                </div>
                <div class="form-group">
                    <label for="postContent" class="form-label">Post Content</label>
                    <textarea name="postContent" id="postContent" class="form-control hacker-input" placeholder="Enter Post Content" rows="5" required></textarea>
                </div>
                <div class="form-group">
                    <label for="file" class="form-label"></label>
                    <input type="file" name="file" id="file" class="form-control hacker-input">
                </div>
                <button class="btn btn-primary" type="submit" name="submit">Save Post</button>
            </form>
        </div>
    </div>
    
    <script src="js/script.js"></script>
</body>
</html>

<?php
if (!isset($_COOKIE['User'])) {
    header('Location: login.php');
    exit();
}

require_once('db.php');

$link = mysqli_connect('127.0.0.1', 'root', '371325', 'db_name');

if (isset($_POST['submit'])) {
    $title = $_POST['postTitle'];
    $main_text = $_POST['postContent'];

    if (!$title || !$main_text) die("no data post");
    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die("error insert data post");

    if (!empty($_FILES["file"]["tmp_name"])) {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg") || 
        (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg") ||
        (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png")) &&
        (@$_FILES["file"]["size"] < 102400)) {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in: " . "upload/" . $_FILES["file"]["name"];
        } else {
            echo "upload failed";
        }
    }
}
?>