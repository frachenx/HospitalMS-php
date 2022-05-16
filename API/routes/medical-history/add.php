<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/medical-history.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput = json_decode(file_get_contents('php://input'));
    
    echo json_encode(MedicalHistory::AddMedicalHistory($jsonInput->patientID,$bloodPressure,$bloodSugar,$weight,$temperature,$prescription));
}