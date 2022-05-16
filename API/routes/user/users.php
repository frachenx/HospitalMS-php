<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/user.php");

$result = User::GetUsers();
if(!$result){
    echo json_encode(false);
}else{
    echo json_encode($result);
}