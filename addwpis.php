<?php
echo(file_get_contents("header.html"));
require_once "classBlog.php";
$date = getdate();
$wpis = $_POST["wpis"];
$explosion = explode("-", $_POST["date"]);
$timeExp = explode(":", $_POST["time"]);
$nazwa = $_POST['userName'];
$uniqueNumber = rand(10, 99);
$nameOfFile = $explosion[0].$explosion[1].$explosion[2].$timeExp[0].$timeExp[1].$date["seconds"]."$uniqueNumber";


###########################################################
if(strlen($wpis)>0){
    file_put_contents($nazwa."/".$nameOfFile, $wpis);
    echo "Dodano wpis";
}
if(isset($_FILES)){
    foreach($_FILES as $file){
        $uniqueNumber = rand(10, 99);
        if($file["error"] == 0){
            $extension = explode(".", $file["name"]); //separate by "."
            move_uploaded_file($file["tmp_name"], $nazwa."/".$nameOfFile.".".$extension[1]);
        }
    }
}
?>
<a href="menu.html">Powrót do menu</a>
