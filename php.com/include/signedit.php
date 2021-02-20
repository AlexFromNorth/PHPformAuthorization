<?php

session_start();
require 'connect.php';

$connect_db =  $_SESSION['user']['email'];
$check =  $_SESSION['user']['email'];

$select_db = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$connect_db'");
$data_db = mysqli_fetch_assoc($select_db);

$user_id = mysqli_query($connect, "SELECT `id` FROM `users` WHERE `email` = '$check'");
$data_id = mysqli_fetch_assoc($user_id);
$data = $data_id['id'];

$new__full_name = $_POST['full_name'];
$new__login = $_POST['login'];
$new__email = $_POST['email'];
$new__about_me = $_POST['about_me'];

if ($new__full_name != null){
    $edit__full_name = mysqli_query($connect, "UPDATE `users` SET `full_name` = '$new__full_name' WHERE `users`.`id` = '$data'  ;");    
}

if ($new__login != null){
    $edit__login = mysqli_query($connect, "UPDATE `users` SET `login` = '$new__login' WHERE `users`.`id` = '$data'  ;");    
}

if ($new__email != null){
    $edit__email = mysqli_query($connect, "UPDATE `users` SET `email` = '$new__email' WHERE `users`.`id` = '$data'  ;");    
}

if ($new__about_me != null){
    $edit__about_me = mysqli_query($connect, "UPDATE `users` SET `about_me` = '$new__about_me' WHERE `users`.`id` = '$data'  ;");    
}

echo '<meta http-equiv="refresh" content="0; URL=../profile.php" />';

?>