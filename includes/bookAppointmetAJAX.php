<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['specID'])){
    $specID = $_GET['specID'];
    $doctorArray = User::GetDoctorsSpecialties($specID);
    echo json_encode($doctorArray);
}

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['docID'])){
    $docID = $_GET['docID'];
    $doctor = User::GetDoctor($docID);
    echo json_encode($doctor);
}