<?php
echo(file_get_contents("header.html"));
require_once "classBlog.php"; 
session_start();
$date = getdate();
$wpis = $_POST["wpis"];
$explosion = explode("-", $_POST["date"]);
$timeExp = explode(":", $_POST["time"]);
$nameOfBlog = $_SESSION["nazwa"];
$blog = $_SESSION["$nameOfBlog"];
$uniqueNumber = rand(10, 99);
$nameOfFile = $explosion[0].$explosion[1].$explosion[2].$timeExp[0].$timeExp[1].$date["seconds"]."$uniqueNumber";


###########################################################
if(strlen($wpis)>0){
    $blog->addEntry($wpis, $nameOfFile);
    echo "Dodano wpis";
    
}
if(isset($_FILES)){
    $blog->addAttachments($_FILES, $nameOfFile);
}    
?>
<a href="menu.html">Powrót do menu</a>