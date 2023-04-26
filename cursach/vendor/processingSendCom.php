<?php
    session_start();
    require_once 'connect.php';

    $com = $_POST['comm'];
    $nick = $_SESSION['nick'];
    echo $com . "&#128516";

    if (isset($_SESSION['edit_start'])) {
        $idEdit = $_SESSION['commentId'];  
        mysqli_query($connect, "UPDATE `comments` SET `comment` = '$com' WHERE `com_id` = '$idEdit'" );

        unset($_SESSION['editCom']);
        unset($_SESSION['edit_start']);
        unset($_SESSION['commentId']);
        header('Location: ../mainMenu.php');
    } else {
        $id_user_search = mysqli_query($connect, "SELECT * FROM `users` WHERE `nickname` = '$nick'");
        $row = mysqli_fetch_row($id_user_search);

        $idCom = intval($row[0]);

        mysqli_query($connect, "INSERT INTO `comments` (`com_id`, `user_id`, `comment`, `nick`) VALUES (null, '$idCom', '$com', '$nick')");   

        header('Location: ../mainMenu.php');
        // $_SESSION['message'] = "Registration was successful!";
        // header('Location: ../cursack1.php');
    }
?>