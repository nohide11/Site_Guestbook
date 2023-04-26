<?php
    $connect = mysqli_connect('localhost', 'root', '', 'guestbook');

    if (!$connect) {
        die('Error - invalid sql');
    }
?>