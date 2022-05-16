<?php
include_once($_SERVER['DOCUMENT_ROOT']."/hospital2/API/config.php");
include_once($_SERVER['DOCUMENT_ROOT']."/hospital2/API/classes/admin.php");
if($_SERVER['REQUEST_METHOD']=="POST"){
    $jsonInput = json_decode(file_get_contents("php://input"));
    $result = Admin::SendContactInfo($jsonInput->name,$jsonInput->email,$jsonInput->contact,$jsonInput->description);
    $resultObj=new stdClass();
    if($result){
        $resultObj->response=true;
    }else{
        $resultObj->response=false;
    }
    echo  json_encode($resultObj);
}