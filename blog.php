<?php
session_start();
$nazwa = $_GET['nazwa'];
$dataForm = date("Y-m-d");
$fileContent = file_get_contents($nazwa."/info.txt");
$matches;
$matchesBlog;
$pattern = "/Opis bloga(.+)/";
$patternBlog = "/Nazwa blogu(.+)/";
preg_match($pattern, $fileContent, $matches);
preg_match($patternBlog, $fileContent, $matchesBlog);

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link id="linkStyle" rel="stylesheet" type="text/css" href="style4.css">
    <title>Blogosfera</title>
</head>
<body onload="setStyle()">
	<script src="menu.js"></script>
	<div class="container">
		<div class="header">
			<h2>Nazwa blogu - <?php echo "$matchesBlog[1]";?></h2>
		</div>
		<div class="menu">
            <h4>Menu</h4>
            <ul>
                <li class="litem"><a href="formCreateBlog.html" class="navblocks">Stwórz blog.</a></li>
                <li class="litem"><a href="browse.php" class="navblocks">Przeglądaj blogi.</a></li>
            </ul>
        </div>
		
		<div class="ad">
            <p>
                <h3>Chatbox</h3>
            </p>
            <div class="chatbox">
            </div>
            <div id="chat">
            </div>
            <form class="chatAdd">
              <label>Nick: </label>
              <input type="text" name="userName" id="userName" required><br><br>
              <label>Wiadomość: </label>
              <input type="text" name="fieldText" id="fieldText"><br><br>
              <input type="button" name="submitBtn" id="Btn" value="Wyslij"><br><br>
              <label id="labelCheck">Wlacz</label>
              <input type="checkbox" id="check">
            </form>

        </div>
		<div class="content">
			<h3>Opis</h3>
			<?php echo "$matches[1]"; ?>
			<p>########################################################</p>
			<p>Dodaj wpis: </p>
			<form id="form" enctype="multipart/form-data">
				<input type="hidden" name="userName" value=<?=$nazwa;?>>
				<textarea name="wpis" style="width:300px; height:100px"></textarea><br/><br/>
				<p>Dodaj zalacznik</p>
				<div id="zalaczniki">
					<input type="file" name="file" value="Dodaj załącznik"/><br/><br/>
				</div>
				<button type="button" name="button" onclick="handleSumbit()">Dodaj kolejny</button>
				<p>Data: </p>
				<input type="text" id="date"><br/><br/>
				<input type="text" id="time"><br/><br/>
				<input type="submit" value="Dodaj" /><br/><br/>
				<input type="reset" value="Wyczyść" />
			</form>
			<br/>
				<div class="selectStyle">
					<ul>
						<li class="litem"><a class="navblocks" onclick="changeStyle(1)">Styl 1</a></li>
						<li class="litem"><a class="navblocks" onclick="changeStyle(2)">Styl 2</a></li>
						<li class="litem"><a class="navblocks" onclick="changeStyle(3)">Styl 3</a></li>
						<li class="litem"><a class="navblocks" onclick="changeStyle(4)">Styl 4</a></li>
					</ul>
				</div>
			<script src="validate.js" charset="utf-8" type="text/javascript"></script>
		</div>
		<script src="changeStyle.js"></script>
	</div>

</body>
</html>
