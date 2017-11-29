<?php
#foreach($_POST as $_field){
#    echo $_field;
#}
session_start();
$nazwa = $_GET['nazwa'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Mój blog</title>
</head>
<body>
	<h2>Nazwa blogu</h2>
	<?php
	echo "$nazwa";
	?>
<br/><br/><br/>
<p>Dodaj wpis</p>
<form action = "addwpis.php" method = "post">
	<textarea name="wpis" style="width:300px; height:100px"></textarea><br/><br/>
	<input type="submit" value="Dodaj" /><br/><br/>
    <input type="reset" value="Wyczyść" />
</form>
    
	
</body>
</html>