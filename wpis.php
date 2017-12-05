<?php
$userName=$_POST['userName'];  // saving POST data
$pwd=md5($_POST['pwd']); //crypt password
$arrayWithContent = scandir(getcwd());
$matchesHaslo;
$matchesLogin;
$matchesBlog;
$url='http://'. $_SERVER['SERVER_NAME'] . "/~papior" . "/PHPwebowe" . "/blog.php";
$url2 = 'http://'. $_SERVER['SERVER_NAME'] . "/~papior" . "/PHPwebowe" . "/formManageBlog.html";
$new;
$i = 1;
$pattern = "/^\\w+/";
$patternLogin = "/Nazwa użytkownika (.+)/";
$patternHaslo = "/Hasło (.+)/";
$patternBlog = "/Nazwa blogu (.+)/";
$flag = true;

foreach($arrayWithContent as $file){ // loop for blog through current dir
    if(is_dir($file)){
        if(preg_match($pattern, $file, $new) == 1){
            $fileContent = file_get_contents($new[0]."\\info.txt");
            preg_match($patternLogin, $fileContent, $matchesLogin); // get login from file 
            preg_match($patternHaslo, $fileContent, $matchesHaslo); // get pwd from file 
            if($userName == $matchesLogin[1]){  // check login
                $flag = false;
                if($pwd == $matchesHaslo[1]){ // check pwd
                    preg_match($patternBlog, $fileContent, $matchesBlog); //get name of blog
                    echo "Zalogowales sie !\n";
                    echo "<br/>"; 
                    echo "Zaraz zostaniesz przekierowany do wlasnego bloga";
                    $url = $url."?nazwa=$matchesBlog[1]";
                    header("refresh:2; url=$url");
                }
                else{
                    echo "Zly login lub haslo\n";
                    echo "<br/>";
                    echo "Sprobuj ponownie";
                    header("refresh:2; url=$url2");
                }
            }
        }

    }
}
if($flag){
    echo "Blog nie istnieje";
}




?>
<br/>
<a href = "menu.html">Powrót do menu</a>