<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$specialties=new stdClass();
$resultString='';
function getSpecialties(){
    if(!Admin::GetSpecialties()){
    }else{
        $specialties=Admin::GetSpecialties();
        for($k=0;$k<count($specialties);$k++){
            echo '<option value="'.$specialties[$k]['id'].'">'.$specialties[$k]['spec'].'</option>';
        }
    }
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    $specID =$_POST['spec'];
    $spec='';
    $specObj=Admin::GetSpecialty($specID);
    if(!$specObj){
    }else{
        $spec = $specObj->spec;
    }
    $docName =$_POST['docName'];
    $address =$_POST['address'];
    $fee =$_POST['fee'];
    $contact =$_POST['contact'];
    $email =$_POST['email'];
    $password =$_POST['password'];
    $password = password_hash($password,PASSWORD_BCRYPT);
    if(Admin::InsertDoctor($specID,$spec,$docName,$address,$fee,$contact,$email,$password)){
        $resultString='1';
        unset($_POST);
    }else{
        $resultString='0';
        unset($_POST);
    }
    
}