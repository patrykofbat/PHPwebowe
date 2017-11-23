<?php
$userName=$_POST['userName'];  // saving POST data
$pwd=md5($_POST['pwd']); //crypt password
$arrayWithContent = scandir(getcwd());
$matches;
$new;
$i = 1;
$pattern = "/^\\w+/";

foreach($arrayWithContent as $file){ // loop through current dir
    if(is_dir($file)){
        if(preg_match($pattern, $file, $matches) == 1){
            $new[$i] = $matches[0];
            echo "<a href='menu.html'>$matches[0]</a><br/>";
            $i = $i +1;
            
        }
    }
}
print_r($new);


?>