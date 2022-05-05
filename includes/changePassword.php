<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');
$resultString='';
if(session_status()==PHP_SESSION_ACTIVE){
}else{
    session_start();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
    $userID = $_SESSION['user_id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
    $user = User::GetUser($userID);
    $hash = $user->password;
    $hash = str_replace("$2a$","$2y$",$hash);
    $hash = str_replace("$2b$","$2y$",$hash);  
    if(password_verify($currentPassword,$hash)){
        $newHash = password_hash($newPassword,PASSWORD_BCRYPT);
        $user->password =$newHash;
        if($user->UpdateUser()){
            $resultString='1';
        }else{
            $resultString='0';
        }
    }else{
        $resultString='0';
    }
}