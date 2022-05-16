<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/user.php");

if($_SERVER['REQUEST_METHOD']=='PUT'){
    $jsonInput = json_decode(file_get_contents('php://input'));
    $user = new User();
    // public $id, $fullname, $address, $city, $gender, $email, $password,$createdDate,$updatedDate;
    $user->id=$jsonInput->id;
    $user->fullname=$jsonInput->id;
    $user->address=$jsonInput->id;
    $user->city=$jsonInput->id;
    $user->gender=$jsonInput->id;
    echo json_encode($user->UpdateUser());
}