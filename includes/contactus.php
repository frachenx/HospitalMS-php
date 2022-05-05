<?php
include('classes/admin.php');
$resultString="";
if($_SERVER['REQUEST_METHOD']=='POST'){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $mobile=$_POST['mobile'];
    $description=$_POST['description'];
    $result = Admin::SendContactInfo($name,$email,$mobile,$description);
    if($result){
        $resultString='1';
        unset($_POST);
    }else{
        $resultString='0';
        unset($_POST);
    }
}