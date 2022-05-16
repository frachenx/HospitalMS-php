<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/user.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput = json_decode(file_get_contents("php://input"));
    $user =  new User();
    $user->fullname=$jsonInput->name;
    $user->address=$jsonInput->name;
    $user->city=$jsonInput->name;
    $user->gender=$jsonInput->name;
    $user->email=$jsonInput->name;
    $user->password=$jsonInput->name;
    echo json_encode($user->Register());
}