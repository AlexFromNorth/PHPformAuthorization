<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once 'include/connect.php';

$connect_db =  $_SESSION['user']['email'];

$select_db = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$connect_db'");
$data_db = mysqli_fetch_assoc($select_db);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <!-- Профиль -->

    <form>
        <img src="<?= $data_db['avatar'] ?>" width="200" alt="">
        <h2 style="margin: 10px 0;"><?= $data_db['full_name'] ?></h2>
        <a href="#"><?= $data_db['email'] ?></a>
        <h3 style="margin: 10px 0;"><?= $data_db['about_me'] ?></h2>
        <div style="margin: 5px 0;" class="profile_include">
            <a class="qwer-btn" href="edit.php">Редактировать</a>
            <a href="include/logout.php" class="logout">Выход
        </div>
    </form>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>