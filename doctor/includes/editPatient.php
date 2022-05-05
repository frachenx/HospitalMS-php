<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
$resultString='';
$doctor =  new stdClass();

if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    $id=$_GET['id'];
    $doctor = Doctor::GetPatient($id);
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $doctor = Doctor::GetPatient($_GET['id']);
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $name=$_POST['name'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $address=$_POST['address'];
    $gender=$_POST['gender'];
    $age=$_POST['age'];
    $medHistory=$_POST['medHistory'];   
    $result = Doctor::EditPatient($_GET['id'],$name,$contact,$email,$address,$gender,$age,$medHistory);
    if($result){
        $resultString='1';
        unset($_POST);
    }else{
        $resultString='0';
        unset($_POST);
    }
}