<?php
require_once "classBlog.php";
session_start();
$nameOfBlog = $_GET["nazwa"];
$blog = $_SESSION[$nameOfBlog];
$nameOfBlog = $blog->nameOfBlog;
echo"<pre>";
$iterator = 1;
$iterZal=1;
?>

<?php foreach($blog->arrayWithEntries as $entry) : ?>
<?php echo "######################################<br/>"?>
<?php echo "<h2>Wpis $iterator</h2>"; ?>
<?= $content = file_get_contents($blog->nameOfBlog."\\".$entry); ?>
<h3>Załączniki</h3>
<?php foreach($blog->arrayWithAttachments as $attach): ?>
<?php
$explosion = explode(".", $attach);
$entryFormat = substr($entry, 0, strlen($entry)-2);
$attachFormat = substr($explosion[0], 0,strlen($entry)-2);
?>
<?php if($attachFormat == $entryFormat): ?>
<?php   $fileToDownload = $attachFormat;
 $linkToDownload = $attach; ?>
<a href=<?=$nameOfBlog."/".$linkToDownload?>  download><?="Zalacznik ".$iterZal?><a/>
<?php $iterZal+=1; ?>
<?php endif ?>
<?php endforeach ?>

<?php   $newIter = $iterator-1;
        $blogDir=scandir($nameOfBlog);
        foreach($blogDir as $con){
                $ext = explode(".", $con);
                if(isset($ext[1])){
                        if($ext[1] == "k"){
                                if(is_file($nameOfBlog."\\".$con."\\".($newIter))){
                                        $content = file_get_contents($nameOfBlog."\\".$con."\\".($newIter));
                                        echo "<h3>Komentarze<br/></h3>";
                                        echo $content;
                                        echo "<br/><br/>";
                                }
                        }
                }
        }
        echo "Dodaj komentarz: ";
?>


<form action="koment.php" method="post">
<textarea name=<?=$iterator?>></textarea>
<h4>Typ komentarza: </h4>
<select name=<?="typeOfComment".$iterator?>>
        <option>neutral</option>
        <option>positive</option>
        <option>negative</option>
</select>
<h4>Imie, Nazwisko lub Pseudonim :</h4>
<input type="text" name=<?="nazwaNadawcy".$iterator?>>
<input type="hidden" name="nameOfBlog" value=<?=$nameOfBlog?>>
<input type="hidden" name="iteracje" value=<?=$nameOfBlog?>>
<input type="submit" value="Dodaj komentarz"/><br/><br/>
<input type="reset" value="Wyczyść"/><br/><br/>
<?php $iterator+=1; ?>
<?php endforeach ?>
<input type="hidden" name="iteracje" value=<?=$iterator-=1?>>
</form>
<a href="menu.html">Powrót do menu</a><br/>
<a href="check.php">Stwórz własny blog.</a><br/>
<a href="check2.php">Dodaj wpis do własnego blogu.</a><br/>
<a href="check3.php">Przeglądaj dostępne blogi.</a><br/>

