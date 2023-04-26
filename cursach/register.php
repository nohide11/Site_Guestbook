<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="em">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="cursach.css">
        <title>GuestBook</title>
    </head>
    <body>
        <h1 class = "main_name">Guest Book</h1>
        <form class="form_reg" action="vendor/signp.php" method="post" enctype="multipart/form-data">
            <label class="lable_in_reg">Full name</label>
            <input class="reg_input" name="fullName" type="text" placeholder="Enter your full name"> 

            <label class="lable_in_reg">Nickname</label>
            <input class="reg_input" name="nickName" type="text" placeholder="View other users">

            <label class="lable_in_reg">Login</label>
            <input class="reg_input" name="login" type="text" placeholder="Enter your login">

            <label class="lable_in_reg">Password</label>
            <input class="reg_input" name="password" type="password" placeholder="Enter your password">

            <label class="lable_in_reg">Repead password</label>
            <input class="reg_input" name="confirmPassword" type="password" placeholder="Enter your password">

            <button class="but_ok" type="submit">Okay</button>

            <p id="ifHaveNotAcc">
                Do you have account? - 
            <a href="cursack1.php?#">Enter</a>!
            </p>


            <?php
                if (isset($_SESSION['message'])) {
                    echo '<p class="msg"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>
    </body>
</html>