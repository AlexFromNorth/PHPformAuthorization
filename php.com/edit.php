<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}

require_once 'include/connect.php';

$connect_db =  $_SESSION['user']['email'];

?>
<br>
<?php

$select_db = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$connect_db'");
$data_db = mysqli_fetch_assoc($select_db);

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Редактирование данных</title>
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

    <!-- Профиль -->
    <form action="include/signedit.php" method="POST" enctype="multipart/form-data">
        <h2>Введите новые данные<br>(которые собираетесь поменять)</h2>    
        <label>ФИО</label>
        <input type="text" name="full_name" placeholder="<?= $_SESSION['user']['full_name'] ?>">
        <label>Логин</label>
        <input type="text" name="login" placeholder=" <?= $data_db['login'] ?>">
        <label>Почта</label>
        <input type="email" name="email" placeholder="<?= $_SESSION['user']['email'] ?>">
        <label>О себе</label>
        <input type="text" name="about_me" placeholder="<?= $data_db['about_me']; ?>">
        <p class="msg none">Lorem ipsum.</p>
        <div style="margin: 5px 0;">
            <button class="edit-btn" type="submit">Изменить</button>    
            <a href="profile.php" class="logout">Профиль</a>
        </div>
    </form>

    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="assets/js/jquery-3.4.1.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>