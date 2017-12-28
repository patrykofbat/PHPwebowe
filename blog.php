<?php
session_start();
$nazwa = $_GET['nazwa'];
$dataForm = date("Y-m-d");
$fileContent = file_get_contents($nazwa."/info.txt");
$matches;
$matchesBlog;
$pattern = "/Opis bloga(.+)/";
$patternBlog = "/Nazwa blogu(.+)/";
preg_match($pattern, $fileContent, $matches);
preg_match($patternBlog, $fileContent, $matchesBlog);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Mój blog</title>
</head>
<body>
	<h2>Nazwa blogu - <?php echo "$matchesBlog[1]";?></h2>
	<h3>Opis</h3>
	<?php echo "$matches[1]"; ?>
	<p>########################################################</p>
<p>Dodaj wpis: </p>
<form action = "addwpis.php" method = "post" enctype="multipart/form-data">
	<textarea name="wpis" style="width:300px; height:100px"></textarea><br/><br/>
	<p>załącznik 1:</p>
	<input type="file" name="file" value="Dodaj załącznik"/><br/><br/>
	<p>załącznik 2:</p>
	<input type="file" name="file2" value="Dodaj załącznik"/><br/><br/>
	<p>załącznik 3:</p>
	<input type="file" name="file3" value="Dodaj załącznik"/><br/><br/>
	<p>Data: </p>
	<input type="date" name="date" value=<?=$dataForm;?> required><br/><br/>
	<input type="time" name="time"  required><br/><br/>
	<input type="submit" value="Dodaj" /><br/><br/>
    <input type="reset" value="Wyczyść" />
</form>
<br/>
<a href = "menu.html">Powrót do menu</a>


</body>
</html>
