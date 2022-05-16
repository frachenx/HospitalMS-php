<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $specID=htmlentities($_GET['id']);
    echo json_encode(Doctor::GetDoctorsSpecialties($specID));
}