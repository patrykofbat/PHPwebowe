<?php
echo(file_get_contents("header.html"));
require_once "classBlog.php";
session_start();
$flaga == 1;

#echo getcwd()."\\".$_POST['blogName']; #getcwd() get absoulte path of current directory

$dir=getcwd()."/".$_POST['blogName'];
$url='http://'. $_SERVER['SERVER_NAME'] . "/~papior" . "/PHPwebowe" . "/menu.html";
//create new Blog
$newBlog = new Blog($_POST['userName'], $_POST['pwd'], $_POST['blogName'], $_POST['description']);
$_SESSION["$newBlog->nameOfBlog"] = $newBlog;



    
if(file_exists($dir)){
    header("refresh:5; url=$url");
    echo "Przykro nam ale nazwa blogu jest juz zajeta, zostaniesz teraz przekierowany do menu głównego.";
}
else{
    foreach($_SESSION as $key){
        if(is_object($key)){
            if($key->userName == $_POST['userName']){
                $flaga = 0;
                echo "Przykro nam ale nazwa uzytkownika jest juz zajeta, zostaniesz teraz przekierowany do menu głównego.";
                header("refresh:5; url=$url");
            }
    }
}
}

if($flaga == 1){
    $newBlog->createInfo($dir);
    header("refresh:5; url=$url");
    echo "Pomyślnie założyłeś bloga, zostaniesz teraz przekierowany do menu głównego.";
}
?>