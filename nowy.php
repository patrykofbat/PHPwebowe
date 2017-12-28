<?php
echo(file_get_contents("header.html"));
require_once "classBlog.php";
$flaga = 1;
$dir=getcwd()."/".$_POST['userName'];


if(file_exists($dir)){
    header("refresh:5; url=menu.html");
    echo "Przykro nam ale nazwa uzytkownika jest juz zajeta, zostaniesz teraz przekierowany do menu głównego.";
}
else{
      $newBlog = new Blog($_POST['userName'], $_POST['pwd'], $_POST['blogName'], $_POST['description']);
      $newBlog->createInfo($dir);
      header("refresh:5; url=menu.html");
      echo "Pomyślnie założyłeś bloga, zostaniesz teraz przekierowany do menu głównego.";
}


?>
