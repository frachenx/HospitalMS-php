<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/patient.php");

if($_SERVER['REQUEST_METHOD']=='PUT'){
    $jsonInput =  json_decode(file_get_contents('php://input'));
    
    echo json_encode(Patient::EditPatient($jsonInput->id,$jsonInput->name,$jsonInput->contact,$jsonInput->email,$jsonInput->address,$jsonInput->gender,$jsonInput->age,$jsonInput->medicalHistory));
}