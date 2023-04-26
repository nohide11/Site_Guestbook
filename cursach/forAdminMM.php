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
        <link rel="stylesheet" type="text/css" href="forAdminCSS.css">
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
                    ?>
                    <a href="cursack1.php"><img src="images/exit.png" alt="" class="image"></a>
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
                    <p class="commOld">
                        <?= $data['comment'];?>
                    </p>
                    <?php
                        $id = $data['com_id'];
                    ?>
                    <!-- <input type="button" onclick="window.location.href = 'https://localhost/cursach/vendor/editButton.php';" value="edit" name=$id/>
                    <input type="button" onclick="window.location.href = 'https://localhost/cursach/vendor/removeButton.php';" value="remove" name=$id/> -->

                    <a href="vendor/editButton.php?id=<?= $id ?>" class="image"><img src="images/edit.png" alt="<= $id?>" class="image"></a>
                    <a href="vendor/removeButton.php?id=<?= $id ?>" class="image"><img src="images/remove.png" alt="<= $id?>" class="image"></a>
            </div>

            <?php endforeach; ?>
                <?php
                    if (isset($_SESSION['editCom'])) {
                        echo '<textarea class="inp" type="text" placeholder="Enter your comment:" name="comm">' . $_SESSION['editCom'] . '</textarea>';
                        $_SESSION['edit_start'] = true;
                    } else {
                        echo '<textarea class="inp" type="text" placeholder="Enter your comment:" name="comm">' . '</textarea>';
                    }
                ?>
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
            </div>
        </form>        
    </body>
</html>

<script>
  function addEmoji(emoji) {
    var textarea = document.querySelector(".inp");
    textarea.value += emoji;
  }
</script>