<?php
    $dbHost = '85.10.205.173';// сервер где находиться бд
    $dbName = 'testk_db';// название бд
    $dbUser = 'test_user_teach';// пользователь бд
    $dbPass = 'test123456';// пароль пользователя

    $dbConnect = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName) or die ; //подключение к бд

    if ( !$dbConnect ) exit('Mysql Error');

session_start();
?>