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
        <form class="form_reg" action="vendor/signin.php" method="post">
            <label class="lable_in_reg" >Login</label>
            <input class="reg_input" type="text" name="login" placeholder="Enter your login">

            <label class="lable_in_reg" >Password</label>
            <input class="reg_input" type="text" name="password" placeholder="Enter your password">
            <button class="but_ok" type="submit">Okay</button>

            <p id="ifHaveNotAcc">
                Don't you have an account? - 
            <a href="register.php?#">Registration</a>!
            </p>
        </form>
    </body>
</html>