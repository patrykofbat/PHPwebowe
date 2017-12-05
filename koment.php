<?php
session_start();
$date = getdate();
$uniqueNumber = rand(10, 99);
$nameOfDir = $date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"].$uniqueNumber.".k";
$dataWyslania = $date["year"]."-".$date["mon"]."-".$date["mday"].", ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
$url='http://'. $_SERVER['SERVER_NAME'] . "/~papior" . "/PHPwebowe" . "/browse.php";
// echo $dataWyslania;

// echo $nameOfDir;
// echo "<pre/>";
// print_r($_POST);

if(!is_file($_POST["nameOfBlog"]."\\".$nameOfDir)){
    mkdir($_POST["nameOfBlog"]."\\".$nameOfDir);
    for($i=1;$i<=$_POST["iteracje"];$i++){
        if(strlen($_POST[$i]) != 0){
            $data ="Rodzaj komentarza ".$_POST["typeOfComment".$i]."\n"."Data wyslania ".$dataWyslania."\n"."Nadawca ".$_POST["nazwaNadawcy".$i]."\n"."Tresc ".$_POST[$i];
            file_put_contents($_POST["nameOfBlog"]."\\".$nameOfDir."\\".($i-1), $data);
        }
    }
}
else{
   
    
}
header("Location: $url");

?>