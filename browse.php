<?php
$arrayWithContent = scandir(getcwd());
$matches;
$new;
$i = 1;
$pattern = "/^\\w+/";

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
<input type="submit" value="Wybierz blog"/>


</form>