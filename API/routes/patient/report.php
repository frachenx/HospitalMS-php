<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/patient.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $start = htmlentities($_GET['start']);
    $end = htmlentities($_GET['end']);
    echo json_encode(Patient::GetReport($start,$end));
}