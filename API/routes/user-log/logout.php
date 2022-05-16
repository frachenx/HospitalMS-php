<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/user-log.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput = json_decode(file_get_contents('php://input'));
    $ID=$jsonInput->id;
    echo json_encode(UserLog::Logout($ID));
}