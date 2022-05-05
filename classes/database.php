<?php

class Database {
    private $host='localhost',$user='root',$password='',$db='hms2';

    protected function connect(){
        $conn=mysqli_connect($this->host,$this->user,$this->password,$this->db);
        return $conn;
    }
}