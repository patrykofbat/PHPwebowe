<?php
echo"<pre>";
print_r($_GET);
$arrayWithContent = scandir($_GET['nazwa']); // array with content of blog dir
$entriesBlog;
$patternForWpis = "/\d+/";
$iterator = 1;
$matches;
foreach($arrayWithContent as $singleField){
    if(preg_match($patternForWpis, $singleField, $matches) == 1){ // zle ! :
        $entriesBlog[$iterator] = $matches;
        $iterator +=1;
    }

}
print_r($entriesBlog);
print_r($arrayWithContent);

?>