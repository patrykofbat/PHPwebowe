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
