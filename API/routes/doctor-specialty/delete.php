<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor-specialty.php");

if($_SERVER['REQUEST_METHOD']=="DELETE"){
    $ID=$_GET['id'];
    echo json_encode(Specialty::DeleteSpecialty($ID));
}