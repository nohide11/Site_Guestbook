<?php
    session_start();
    require_once 'connect.php';
    
    $login = $_POST['login'];
    $password = md5($_POST['password']);

    $checkUser = mysqli_query($connect, "SELECT login, password FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
    if (mysqli_num_rows($checkUser) > 0) {
        $resultNick = mysqli_query($connect, "SELECT nickname FROM `users` WHERE `login` = '$login' AND `password` = '$password'");
        
        $array = mysqli_fetch_array($resultNick);
        

        $_SESSION['nick'] = strval($array[0]);

        if ($login == "admin123") {
            header('Location: ../forAdminMM.php');
        }

        echo "idi nahyi";
        header('Location: ../mainMenu.php');
    } else {
        $_SESSION['message'] = "Uncorrect login or password!";
        header('Location: ../cursack1.php');
    }
?>