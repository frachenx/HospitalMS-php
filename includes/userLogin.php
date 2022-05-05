<?php
include('classes/user.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password = $_POST['password'];
    $result = User::Login($username,$password);
    if(!$result){
        $resultString='0';
        unset($_POST);
    }else{
        if(session_status()=='PHP_SESSION_ACTIVE '){session_destroy();}
        session_start();
        $resultString='1';
        $user = $result;
        $userLogID = User::LoginLog($user['id'],$user['fullname']);
        $_SESSION['user_id']=$user['id'];
        $_SESSION['user_log_id']=$userLogID;
        unset($_POST);
        header('Location: dashboard.php');
    }
}