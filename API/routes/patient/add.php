<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/patient.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput = json_decode(file_get_contents('php://input'));
    echo json_encode(Patient::AddPatient($jsonInput->doctorID,$jsonInput->name,$jsonInput->contact,$jsonInput->email,$jsonInput->gender,$jsonInput->age,$jsonInput->medicalHistory));
}