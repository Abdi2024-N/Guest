<?php
class DBCon{
    private $host;
    private $user;
    private $pwd;
    private $dbn;
    public function __construct(){
        $this->host="localhost";
        $this->user="root";
        $this->pwd="";
        $this->dbn="project";
    }
    protected function connect(){
        $conn= new mysqli($this->host,$this->user,$this->pwd,$this->dbn);

        if($conn->connect_error)
        {
            die("Database failes to connect ".$conn->error);
        }
        else{
            return $conn;
        }
    }
}
?>