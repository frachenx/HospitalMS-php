<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor-log.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(DoctorLog::GetDoctorLogs());
}