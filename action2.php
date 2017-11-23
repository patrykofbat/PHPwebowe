<?php

$fileContent = file_get_contents($_POST["selectedOption"]."\\info.txt");
$selectedOption = $_POST["selectedOption"];
$matches;
$pattern = "/Opis bloga(.+)/";
preg_match($pattern, $fileContent, $matches);

?>
<h2><?php echo "Blog: $selectedOption"?></h2>
<h4>Opis bloga:</h4><br/>
<?php echo $matches[1]; ?>
