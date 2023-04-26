<?php
    session_start();
    require_once 'connect.php';

    $fullName = $_POST['fullName'];
    $nick = $_POST['nickName'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $confPas = $_POST['confirmPassword'];

    if ($password != $confPas) {
        $_SESSION['message'] = "Confirm password is not correct!";
        header('Location: ../register.php');
    }

    if (strlen($password) < 6 && $password != null) {        
        $_SESSION['message'] = "The password is too short!";
        header('Location: ../register.php');
    }


    // echo mysqli_num_rows($checkLog);

    $checkLog = mysqli_query($connect, "SELECT * FROM `users` WHERE `login` = '$login'");   // Проверка совпадениий логинов
    $countRow = (int) mysqli_num_rows($checkLog);

    if ($countRow > 0) {       
        $_SESSION['message'] = "The login is already occupied";
        header('Location: ../register.php');
    }

    $checkLog = mysqli_query($connect, "SELECT * FROM `users` WHERE `nickname` = '$nick'");    // Проверка совправдений nickname
    $countRow = (int) mysqli_num_rows($checkLog);
    
    if ($countRow > 0) {       
        $_SESSION['message'] = "The login is already occupied";
        header('Location: ../register.php');
    }

    $password =md5($password);

    // $result = mysqli_query($connect, "SELECT MAX(id) FROM `users`");
    
    // $row = mysqli_fetch_array($result, 'MYSQLI_ASSOC'); // Use something like this to get the result
    // $maxIdPlusOne = intval($row['quantity']) + 1;


    mysqli_query($connect, "INSERT INTO `users` 
    (`id`, `full_name`, `login`, `password`, `nickname`) 
    VALUES (null, '$fullName', '$login', '$password', '$nick')");   
    $_SESSION['message'] = "Registration was successful!";
    header('Location: ../cursack1.php');
?>