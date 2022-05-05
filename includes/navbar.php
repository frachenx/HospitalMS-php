<?php
session_start();
;
include($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');
include($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
include($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$user;
$username='';
if(isset($_SESSION['user_id'])){
    $user = User::GetUser($_SESSION['user_id']);
    $username = $user->fullname;
}
if(isset($_SESSION['doctor_id'])){
    $user = Doctor::GetDoctor($_SESSION['doctor_id']);
    $username = $user->doctor_name;
}
if(isset($_SESSION['admin_id'])){
    $user = Admin::GetAdmin($_SESSION['admin_id']);
    $username = $user->username;
}

function EditProfile(){
    if(isset($_SESSION['user_id'])){
        return '//localhost/hospital2/edit-profile.php';
    }
    if(isset($_SESSION['doctor_id'])){
        return '//localhost//hospital2/doctor/edit-profile.php';
    }
}
function ChangePassword(){
    if(isset($_SESSION['user_id'])){
        return '//localhost/hospital2/change-password.php';
    }
    if(isset($_SESSION['doctor_id'])){
        return '//localhost//hospital2/doctor/change-password.php';
    }
    if(isset($_SESSION['admin_id'])){
        return '//localhost/hospital2/admin/change-password.php';
    }
}