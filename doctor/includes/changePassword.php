<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
$resultString='';
if(session_status()==PHP_SESSION_ACTIVE){
}else{
    session_start();
}
if($_SERVER['REQUEST_METHOD']=='POST' ){
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST['confirmPassword'];
    $result = Doctor::ChangeDoctorPassword($_SESSION['doctor_id'],$currentPassword,$newPassword);
    if($result){
        $resultString='1';
    }else{
        $resultString='0';
    }
    unset($_POST);
}