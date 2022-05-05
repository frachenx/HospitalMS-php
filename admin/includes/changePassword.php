<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$resultString='';
if(session_status()==PHP_SESSION_ACTIVE){
}else{
    session_start();
}
if($_SERVER['REQUEST_METHOD']=='POST' ){
    $currentPassword=$_POST['currentPassword'];
    $newPassword=$_POST['newPassword'];
    $confirmPassword=$_POST['confirmPassword'];
    $result = Admin::ChangeAdminPassword($_SESSION['admin_id'],$currentPassword,$newPassword);
    if($result){
        $resultString='1';
    }else{
        $resultString='0';
    }
    unset($_POST);
}