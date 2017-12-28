<?php
echo(file_get_contents("header.html"));
$userName=$_POST['userName'];  // saving POST data
$pwd=md5($_POST['passUser']); //crypt password
$arrayWithContent = scandir(getcwd());
$matchesHaslo;
$patternHaslo = "/Hasło (.+)/";

if(is_dir($userName)){
    $fileContent = file_get_contents($userName."/info.txt");
    preg_match($patternHaslo, $fileContent, $matchesHaslo); // get pwd from file
        if($pwd == $matchesHaslo[1]){ // check pwd
            echo "Zalogowales sie !\n";
            echo "<br/>";
            echo "Zaraz zostaniesz przekierowany do wlasnego bloga";
            header("refresh:2; url=blog.php?nazwa=$userName");
        }
        else{
            echo "Zly login lub haslo\n";
            echo "<br/>";
            echo "Sprobuj ponownie";
            header("refresh:2; url=menu.html");
        }
    }
else{
    echo "Nazwa uzytkownika nie istnieje";
}
?>
<br/>
<a href = "menu.html">Powrót do menu</a>
