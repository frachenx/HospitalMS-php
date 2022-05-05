<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/classes/admin.php');
$doctor =  new stdClass();
$specialties =  array();
$resultString='';
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $doctor = Admin::GetDoctor($_GET['id']);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id'])) {
    $doctor = Admin::GetDoctor($_GET['id']);
    $doctor->specID = $_POST['spec'];
    $doctor->name = $_POST['name'];
    $doctor->address = $_POST['address'];
    $doctor->fee = $_POST['fee'];
    $doctor->contact = $_POST['contact'];
    if(Admin::UpdateDoctor($doctor)){
        $resultString='1';
    }else{
        $resultString='0';
    }
    unset($_POST);
}

function getSpecialties()
{
    $specialties = Admin::GetSpecialties();
    $spec = $GLOBALS['doctor']->specID;
    for ($k = 0; $k < count($specialties); $k++) {
        echo '
            <option value="' . $specialties[$k]['id'] . '"' . (($specialties[$k]['id'] == $spec) ? ('selected') : ('')) . '>' . $specialties[$k]['spec'] . '</option>
        ';
    }
}
