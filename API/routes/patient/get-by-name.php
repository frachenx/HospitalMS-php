<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/patient.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $name = htmlentities($_GET['name']);
    echo json_encode(Patient::GetPatientByName($name));
}