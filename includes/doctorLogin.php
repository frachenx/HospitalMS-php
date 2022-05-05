<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password = $_POST['password'];
    $result = Doctor::Login($username,$password);
    if(!$result){
        $resultString='0';
        unset($_POST);
    }else{
        if(session_status()=='PHP_SESSION_ACTIVE '){session_destroy();}
        session_start();
        $resultString='1';
        $doctor = $result;
        echo $doctor['id'];
        $doctorLogID = Doctor::LoginLog($doctor['id'],$doctor['doctor_name']);
        $_SESSION['doctor_id']=$doctor['id'];
        $_SESSION['doctor_log_id']=$doctorLogID;
        unset($_POST);
        header('Location: ../dashboard.php');
    }
}