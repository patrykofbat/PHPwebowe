<?php
#foreach($_POST as $_field){
#    echo $_field;
#}
session_start();
$_SESSION['pwd'] = $_POST['pwd'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Mój blog</title>
</head>
<body>
<?php
$url = "http://localhost/PHPwebowe/action2.php";
if($_POST['pwd'] == '123'){
    header("Location: $url"); // go to other url
}
else{
	header("Location: $url"); // go to other url
    echo "zle haslo";
}
?>
    
	
</body>
</html>