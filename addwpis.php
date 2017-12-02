<?php 
session_start();
$wpis = $_POST["wpis"];
$nazwaBlogu = $_SESSION["nazwa"];
$date = getdate(); //get date from server
echo "<pre/>";
print_r($_FILES);
$uniqueNumber1 = rand(10, 99);
$nameOfFile1 = $date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"]."$uniqueNumber1";
file_put_contents($nazwaBlogu."\\".$nameOfFile1, $wpis);


foreach($_FILES as $file){
    $uniqueNumber2 = rand(10, 99);
    $nameOfFile = $date["year"].$date["mon"].$date["mday"].$date["hours"].$date["minutes"].$date["seconds"]."$uniqueNumber2";
    if($file["error"] == 0){
    $extension = explode(".", $file["name"]); //separate by "."
    move_uploaded_file($file["tmp_name"], $nazwaBlogu."\\".$nameOfFile.".".$extension[1]);
    }
}

echo $nameOfFile;
print_r($date);

?>