<?php
include($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password = $_POST['password'];
    $result = Admin::Login($username,$password);
    if(!$result){
        $resultString='0';
        unset($_POST);
    }else{
        if(session_status()=='PHP_SESSION_ACTIVE '){session_destroy();}
        session_start();
        $resultString='1';
        $admin = $result;
        $_SESSION['admin_id']=$admin['id'];
        unset($_POST);
        header('Location: ../dashboard.php');
    }
    
}