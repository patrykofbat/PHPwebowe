<?php
// session_start();
class Blog{
    public $userName;
    public $password;
    public $nameOfBlog;
    public $description;
    public $arrayWithAttachments;
    public $arrayWithEntries;
    public $arrayWithComments;

    public function __construct($userName, $password, $nameOfBlog, $description){
        $this->userName = $userName;
        $this->password = md5($password);
        $this->nameOfBlog = $nameOfBlog;
        $this->description = $description;
        $this->arrayWithAttachments = array();
        $this->arrayWithEntries = array();
        $this->arrayWithComments = array();
    }

    public static function update(){
        $patternForBlog = "/^\w+/";
        $content = scandir(getcwd());
        $patternLogin = "/Nazwa użytkownika (.+)/";
        $patternHaslo = "/Hasło (.+)/";
        $patternDes = "/Opis bloga (.+)/";
        $matchesPwd;
        $matchesLogin;
        $matchesDes;
        foreach($content as $blog){
            if(is_dir($blog) && preg_match($patternForBlog, $blog)){
                $arrayWithAttachments = array();
                $arrayWithEntries = array();
                $arrayWithComments = array();
                $userName;
                $password;
                $nameOfBlog;
                $description;
                $contentOfBlog = scandir($blog);
                foreach($contentOfBlog as $file){
                    $separate = explode(".", $file);
                    if(isset($separate[1])){

                        if($separate[0] == "info"){
                            $nameOfBlog = $blog;
                            $info = file_get_contents($blog."/"."info.txt");
                            preg_match($patternLogin, $info, $matchesLogin); // get login from file 
                            preg_match($patternHaslo, $info, $matchesPwd); // get pwd from file 
                            preg_match($patternDes, $info, $matchesDes);
                            $userName = $matchesLogin[1];
                            $password = $matchesPwd[1];
                        }
                        else{
                            if(strlen($separate[1])>1){
                                $arrayWithAttachments[] = $file;
                            }
                            else if($separate[1] == "k"){
                                $arrayWithComments[] = $file;
                            }
                        }

                    }
                    else{
                        $arrayWithEntries[] = $file;
                    }
                }
                $obj = new Blog($userName, $password, $blog, $matchesDes[1]);
                $obj->arrayWithAttachments = $arrayWithAttachments;
                unset($arrayWithAttachments);
                $obj->arrayWithEntries = $arrayWithEntries;
                unset($arrayWithEntries);
                $obj->arrayWithComments = $arrayWithComments;
                unset($arrayWithComments);
                $_SESSION[$blog] = $obj;
                // here we create an object 
            }
        }
    }

    public function createInfo($dir){
        $dir = str_replace(" ","_","$dir");
        mkdir($dir);
        $path = $dir."/info.txt";
        file_put_contents($path, "Nazwa blogu $this->nameOfBlog\nNazwa użytkownika $this->userName\nHasło $this->password\nOpis bloga $this->description\n"); //write info to file
        
    }
    public function addEntry($entry, $name){
        $nameOfFile = $name;
        $this->arrayWithEntries[] = $nameOfFile;
        file_put_contents($this->nameOfBlog."/".$nameOfFile, $entry);

    }

    public function addAttachments($arrayWithAttachments, $name){
        $date = getdate();
        foreach($arrayWithAttachments as $file){
            $uniqueNumber = rand(10, 99);
            $nameOfFile = $name;
            if($file["error"] == 0){
                $extension = explode(".", $file["name"]); //separate by "."
                $this->arrayWithAttachments[] = $nameOfFile.".".$extension[1];
                move_uploaded_file($file["tmp_name"], $this->nameOfBlog."/".$nameOfFile.".".$extension[1]);
            }
        }
    }


}


?>