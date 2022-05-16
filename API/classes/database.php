<?php

class Database{
    private $host="localhost",$user="root",$password="",$database="hms2";

    public function connect(){
        $conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
        return $conn;
    }
}
