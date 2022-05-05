<?php
include('classes/user.php');
$resultString = "";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $fullname=$_POST['username'];
    $address=$_POST['address'];
    $city=$_POST['city'];
    $gender=$_POST['gender'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $user =  new User();
    $user->fullname=$fullname;
    $user->address=$address;
    $user->city=$city;
    $user->gender=$gender;
    $user->email=$email;
    $user->password=password_hash($password,PASSWORD_BCRYPT);
    $result = $user->Register();
    if($result){
        $resultString='1';
        unset($_POST);
    }else{
        $resultString='0';
        unset($_POST);
    }
}