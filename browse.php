<?php
echo(file_get_contents("header.html"));
require_once "classBlog.php";
session_start();
$arrayWithContent = scandir(getcwd());
$matches;
$new;
$i = 1;
$pattern = "/^\\w+/";
echo "<pre>";
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
<form action="action2.php" method="post">
<select name="selectedOption">
    <?php foreach ($new as $blog) : ?>
    <option value=<?=$blog?>><?=$blog?></option>
    <?php endforeach ?>
</select>
<input type="submit" value="Wybierz blog"/><br/><br/>
<a href="menu.html">Powrót do menu</a><br/>
<a href="check.php">Stwórz własny blog.</a><br/>
<a href="check2.php">Dodaj wpis do własnego blogu.</a><br/>
<a href="check3.php">Przeglądaj dostępne blogi.</a><br/>


</form>