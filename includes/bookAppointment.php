<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST)){
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $userID=$_SESSION['user_id'];
    $docID=$_POST['doctor'];
    $docSpecID=$_POST['docSpec'];
    $specialtyObj = User::GetSpecialty($docSpecID);
    $spec = $specialtyObj->spec;
    $fee=$_POST['fee'];
    $date=$_POST['date'];
    $time=$_POST['time'];
    if(User::AddAppointment($userID,$docID,$spec,$fee,$date,$time)){
        $resultString='1';
        unset($_POST);
    }else{
        $resultString='0';
        unset($_POST);
    }
}

function getSpecialties(){
    $specialties = User::GetSpecialties();
    if(!$specialties){
        echo 'NO SPECIALTIES';
    }else{
        echo 'HELLO';
        foreach($specialties as $specialty){
            echo '
                <option value="'.$specialty['id'].'">'.$specialty['spec'].'</option>
            ';
        }
    }
}