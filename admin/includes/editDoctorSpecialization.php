<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$resultString='';
$specialty = new stdClass();
if($_SERVER['REQUEST_METHOD']==='GET' && isset($_GET['id'])){
    $specialty = Admin::GetSpecialty($_GET['id']);
    unset($_POST);
}

if($_SERVER['REQUEST_METHOD']==='POST' && isset($_POST['spec']) && isset($_GET['id'])){
        if(Admin::UpdateSpecialty($_GET['id'],$_POST['spec'])){
            $specialty = Admin::GetSpecialty($_GET['id']);
            $resultString = '1';
            unset($_POST);
        }else{
            $specialty = Admin::GetSpecialty($_GET['id']);
            $resultString = '0';
            unset($_POST);
        }
}