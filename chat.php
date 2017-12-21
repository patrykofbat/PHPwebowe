<?php
echo "<pre>";
print_r($_POST);
file_put_contents("chatData.txt", $_POST['userName'].": ".$_POST['data']."\n", FILE_APPEND);
?>
