<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');

session_start();
echo 'HOLA      ';
echo 'ID: '.$_SESSION['user_id'];
echo 'LOG: '.$_SESSION['user_log_id'];
if(isset($_SESSION['user_id']) && isset($_SESSION['user_log_id'])){
    $userID=$_SESSION['user_id'];
    $logID=$_SESSION['user_log_id'];     
    User::Logout($logID);
    echo 'HOLA USER: '.date('Y-m-d H:i:s');
    

}
if(isset($_SESSION['doctor_id']) && isset($_SESSION['doctor_log_id'])){
    $userID=$_SESSION['doctor_id'];
    $logID=$_SESSION['doctor_log_id'];     
    Doctor::Logout($logID);
    echo 'HOLA DOC: '.date('Y-m-d H:i:s');

}
if(session_status()==PHP_SESSION_ACTIVE){
    session_destroy();
    
}else{
    session_start();
    session_destroy();
}
header('Location: index.php');
