<?php
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
        $path = $dir."\\info.txt";
        file_put_contents($path, "Nazwa blogu $this->nameOfBlog\nNazwa użytkownika $this->userName\nHasło $this->password\nOpis bloga $this->description\n"); //write info to file
        
    }


}


?>