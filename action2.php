<?php

$selectedOption = $_POST["selectedOption"];
echo $selectedOption;
$url='http://'. $_SERVER['SERVER_NAME'] . "/~papior" . "/PHPwebowe" . "blog2.php?nazwa=$selectedOption";
echo $url;
header("Location: $url");


?>


