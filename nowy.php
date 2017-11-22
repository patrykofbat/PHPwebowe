<?php
#echo getcwd()."\\".$_POST['blogName']; #getcwd() get absoulte path of current directory

$_dir=getcwd()."\\".$_POST['blogName'];
$url='http://'. $_SERVER['SERVER_NAME'] . "\\" . "PHPwebowe\\" . "menu.html";

if(file_exists($_dir)){
    header("refresh:5; url=$url");
    echo "Przykro nam ale nazwa blogu jest juz zajeta, zostaniesz teraz przekierowany do menu głównego.";
}
else{
    mkdir($_dir, '0777'); #create dir
    $file = fopen($_dir."\\info.txt", 'w'); #create file

    $blogName=$_POST['blogName']; 
    $userName=$_POST['userName'];  // saving POST data
    $pwd=md5($_POST['pwd']); //crypt password
    $description=$_POST['description'];

    fwrite($file, "Nazwa blogu $blogName\nNazwa użytkownika $userName\nHasło $pwd\nOpis bloga $description\n"); //write info to file

    fclose($file);

    header("refresh:5; url=$url");
    echo "Pomyślnie założyłeś bloga, zostaniesz teraz przekierowany do menu głównego.";
    
}
?>