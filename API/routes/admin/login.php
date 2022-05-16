<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/admin.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput=json_decode(file_get_contents("php://input"));
    $result = Admin::Login($jsonInput->username,$jsonInput->password);
    if(!$result){
        echo json_encode(false);
    }else{
        echo json_encode($result);
    }
}