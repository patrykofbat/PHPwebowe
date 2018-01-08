<?php
require_once "classBlog.php";
session_start();
$arrayWithContent = scandir(getcwd());
$matches;
$new;
$i = 1;
$pattern = "/^\\w+/";
// echo "<pre>";
// print_r($_SESSION);

foreach($arrayWithContent as $file){ // loop through current dir
    if(is_dir($file)){
        if(preg_match($pattern, $file, $matches) == 1){
            $new[$i] = $matches[0];
            # echo "<form action='action2.php' method='post' ><button value='$matches[0]'>$matches[0]</button></form><br/>";
            $i = $i +1;
           
        }
    }
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link id="linkStyle" rel="stylesheet" type="text/css" href="style4.css">
    <title>Blogosfera</title>
</head>
<body onload="setStyle()">
    <script src="menu.js"></script>
    <div class="container">
        <div class="header">
            <h2>Witaj w blogosferze !</h2>
        </div>

        <div class="menu">
            <h4>Menu</h4>
            <ul>
                <li class="litem"><a href="formCreateBlog.html" class="navblocks">Stwórz blog.</a></li>
                <li class="litem"><a href="menu.html" class="navblocks">Powrót do menu.</a></li>
            </ul>
        </div>

        <div class="ad">
            <p>
                <h3>Chatbox</h3>
            </p>
            <div class="chatbox">
            </div>
            <div id="chat">
            </div>
            <form class="chatAdd">
                <label>Nick: </label>
                <input type="text" name="userName" id="userName" required><br><br>
                <label>Wiadomość: </label>
                <input type="text" name="fieldText" id="fieldText"><br><br>
                <input type="button" name="submitBtn" id="Btn" value="Wyslij"><br><br>
                <label id="labelCheck">Wlacz</label>
                <input type="checkbox" id="check">
            </form>
        </div>

        <div class="content">
            <form action="action2.php" method="post">
                <select name="selectedOption">
                    <?php foreach ($new as $blog) : ?>
                    <option value=<?=$blog?>><?=$blog?></option>
                    <?php endforeach ?>
                </select>
                <input type="submit" value="Wybierz blog"/><br/><br/>
            </form>

            <div class="selectStyle">
                <ul>
                    <li class="litem"><a class="navblocks" onclick="changeStyle(1)">Styl 1</a></li>
                    <li class="litem"><a class="navblocks" onclick="changeStyle(2)">Styl 2</a></li>
                    <li class="litem"><a class="navblocks" onclick="changeStyle(3)">Styl 3</a></li>
                    <li class="litem"><a class="navblocks" onclick="changeStyle(4)">Styl 4</a></li>
                </ul>
            </div>
        </div>
        <script src="changeStyle.js"></script>
    </div>
</body>

</html>