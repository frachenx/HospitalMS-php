<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/appointment.php");

$result = Appointment::GetAppointments();

if(!$result){
    echo json_encode(false);
}else{
    echo json_encode($result);
}