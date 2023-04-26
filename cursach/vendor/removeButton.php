<?php
    session_start();
    require_once 'connect.php';
    
    $commentId = $_GET['id'];

    if (isset($commentId)) {
        mysqli_query($connect, "DELETE FROM `comments` WHERE `com_id` = '$commentId'");
        header('Location: ../forAdminMM.php');
    }
?>