<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/appointment.php");

if($_SERVER['REQUEST_METHOD']=='POST'){
    $jsonInput =json_decode(file_get_contents('php://input'));
    $appointment = new Appointment();
     echo json_encode($appointment->AddAppointment($jsonInput->userID,$jsonInput->doctorID,$jsonInput->spec,$jsonInput->fee,$jsonInput->appointmentDate,$jsonInput->appointmentTime));
}