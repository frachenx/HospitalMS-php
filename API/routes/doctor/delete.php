<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor.php");

if($_SERVER['REQUEST_METHOD']=='DELETE'){
    $ID=$_GET['id'];
    echo json_encode(Doctor::DeleteDoctor($ID));
}