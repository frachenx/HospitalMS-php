<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
$resultString='';
if(session_status()==PHP_SESSION_ACTIVE){
}else{
    session_start();
}
$doctor = Doctor::GetDoctor($_SESSION['doctor_id']);
if($_SERVER['REQUEST_METHOD']=='POST'){
    $specID = $_POST['spec'];
    $specObj=Admin::GetSpecialty($specID);
    $spec = $specObj->spec;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $fee = $_POST['fee'];
    $contact = $_POST['contact'];
    $doctor->specID=$specID;
    $doctor->specialization=$spec;
    $doctor->doctor_name=$name;
    $doctor->address=$address;
    $doctor->fee=$fee;
    $doctor->contact=$contact;
    if($doctor->UpdateDoctor()){
        $resultString='1';
    }else{
        $resultString='0';
    }
    unset($_POST);
    
}
function getSpecialties(){
    $doctor = Doctor::GetDoctor($_SESSION['doctor_id']);
    $specialties = Admin::GetSpecialties();
    if(!$specialties){
        return false;
    }else{
        foreach($specialties as $specialty){
            
            $selected ="";
            if($specialty['id']==$doctor->specID){
                $selected="selected";
            }else{
                $selected="";
            }
            echo'
                <option value="'.$specialty['id'].'" '.$selected.'>'.$specialty['spec'].'</option>
            ';
        }
    }
}