<?php
    session_start();

    $db = new PDO("mysql:host=localhost;dbname=guestbook", "root", "");

    $info = [];

    if ($query = $db->query("SELECT * FROM `comments`")) {
        $info = $query->fetchAll(PDO::FETCH_ASSOC);
        // $com_user_search = mysqli_query($connect, "SELECT comment FROM `users`");

        // $tostr = mysqli_fetch_row($com_user_search);

        // $str = strval($tostr[0]);
        // echo $str;
    } else {
        print_r($db->errorInfo());
    }
?>



<!DOCTYPE html>
<html lang="em">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="newMM.css">
        <title>Main Menu Guest Book</title>
    </head>
    <body>
        <header>
            <div class="logo">
            <a href="#"><img src="images/book.png" alt="Logo"></a>
            </div>
            <h1 class = "main_name">Guest Book</h1>
            <nav>
                <ul>
                    <label class="accNam">Account - </label>
                    <?php
                        // <li><a href="#">Главная</a></li>
                        echo '<li><a href="#">' . $_SESSION['nick'] . '</a></li>';
                        if ($_SESSION['nick'] == "admin123") {
                            header('Location: forAdminMM.php');
                        }
                    ?>
                    <form action="cursack1.php#">
                        <button class="but" type="submit">Exit</button>
                    </form>
                </ul>
            </nav>        
        </header>


        <form class="form_reg" action="vendor/processingSendCom.php" method="post">
            <label class="lable_comm">Book of reviews</label>  
            <?php
                foreach ($info as $data):
            ?>
            <div class="divCom">
                <h3><?= $data['nick']?></h3>
                <h2 class="commOld"><?= $data['comment']?></h2>
            </div>
            <?php endforeach; ?>
            <textarea class="inp" name="comm" type="text" placeholder="Enter your comment:"></textarea>
            <p class="paragraph_for_emoji">
            <a href="#!" onclick="addEmoji('😊')" name="happy">
                <img class="emoji" src="images/emoji_emoticon_happy_laugh_icon.png" alt="emoji1">
            </a>
            <a href="#!" onclick="addEmoji('🤪')" name="silly">
                <img class="emoji" src="images/emoji_emoticon_silly_icon.png" alt="emoji2">
            </a>
            <a href="#!" onclick="addEmoji('😘')" name="kiss">
                <img class="emoji" src="images/emoji_kiss_smiley_icon.png" alt="emoji3">
            </a>
            <a href="#!" onclick="addEmoji('🤮')" name="sick">
                <img class="emoji" src="images/emoji_puke_sick_icon.png" alt="emoji4">
            </a>
            <a href="#!" onclick="addEmoji('😴')" name="sleep">
                <img class="emoji" src="images/emoji_sleep_sleeping_icon.png" alt="emoji5">
            </a>
            <button class="butToSend" type="submit"><img src="images/send.png" alt="Кнопка «button»" class="imageMM"></button>
            </p>
        </form>    
        
    </body>
</html>

<script>
  function addEmoji(emoji) {
    var textarea = document.querySelector(".inp");
    textarea.value += emoji;
  }
</script>