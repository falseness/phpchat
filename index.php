<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ñîöñåòü íîâîãî ïîêîëåíèÿ!</title>
    <style>
        .chat
        {
            margin-top:5px;
            width:500px;
            border: 2px dashed green;
            padding:5px;
        }
        .message
        {
            background: #e6e6e6;
            padding:2px;
            margin-bottom:5px;
        }
    </style>
</head>
<body>
    <form method = "POST">
        Èìÿ<br><input type = "text" name = "username"><br>
        Òåêñò ñîîáùåíèÿ<br><input type = "text" name = "text"><br>
        <br>
        <input type = "submit" value = "Îòïðàâèòü">
    </form>
    <?php
        $text = $_POST['text'];
        $username = $_POST['username'];
        
        if (!empty($text) && !empty($username))
        {
            $file = fopen('history.txt', 'a+');
            $t = file_get_contents('history.txt');
            if (!empty($t))
                fwrite($file, "\r\n");
            fwrite($file, $username.' ('.(date('d').'.'.date('j').'.'.date('y').' '.date('H').':'.date('i')).'): '.$text);
            fclose($file);
        }
    ?>
    <div class = "chat">
        <?php
            $f = fopen('history.txt', 'a+');
            $file_text = file_get_contents('history.txt');
            $file_text = trim($file_text, "\n");
            $file_text = str_replace("\n", '</div><div class = "message">', $file_text);
            echo '<div class = "message">'.$file_text.'</div>';
        ?>
    </div>
</body>
</html>
