<?php
    session_start();
    require_once 'connect.php';
    
    $commentId = $_GET['id'];
    $_SESSION['commentId'] = $commentId;

    echo $commentId;

    if (isset($commentId)) {
        $sqlSearchCom = mysqli_query($connect, "SELECT * FROM `comments` WHERE `com_id` = '$commentId'");
        
        $arrayAim = mysqli_fetch_array($sqlSearchCom);
        $neededCom = $arrayAim[2];

        $_SESSION['editCom'] = $neededCom;
        header('Location: ../forAdminMM.php');
    }
?>