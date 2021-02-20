<?php

    $connect = mysqli_connect('localhost', 'root', '', 'check_db');

    if (!$connect) {
        die('Error connect to DataBase');
    }