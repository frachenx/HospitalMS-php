<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/appointmentTableViewModel.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $ID=htmlentities($_GET['id']);
    echo json_encode(AppointmentTableViewModel::GetDoctorAppointmentHistory($ID));
}