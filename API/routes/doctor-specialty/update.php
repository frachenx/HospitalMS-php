<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor-specialty.php");

if($_SERVER['REQUEST_METHOD']=='PUT'){
    $jsonInput = json_decode(file_get_contents('php://input'));

    echo json_encode(Specialty::UpdateSpecialty($jsonInput->id,$jsonInput->spec)) ;
}