<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
$patient = new stdClass();
$historyArray = array();
if(isset($_GET['id'])){
    $patient = Doctor::GetPatient($_GET['id']);
    $historyArray = Doctor::GetPatientHistory($_GET['id']);
}
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['bloodPressure']) && isset($_POST['bloodSugar']) && isset($_POST['weight']) && isset($_POST['bodyTemp']) && isset($_POST['prescription'])){
    $bloodPressure = (isset($_POST['bloodPressure']) ? $_POST['bloodPressure'] :'');
    $bloodSugar = (isset($_POST['bloodSugar']) ? $_POST['bloodSugar'] :'');
    $weight = (isset($_POST['weight']) ? $_POST['weight'] :'');
    $temp = (isset($_POST['bodyTemp']) ? $_POST['bodyTemp'] :'');
    $prescription = (isset($_POST['prescription']) ? $_POST['prescription'] :'');
    $result = Doctor::AddMedicalHistory($_GET['id'],$bloodPressure,$bloodSugar,$weight,$temp,$prescription);
    unset($_POST);
    $patient = Doctor::GetPatient($_GET['id']);
    $historyArray = Doctor::GetPatientHistory($_GET['id']);
}
function printHistory(){
    foreach($GLOBALS['historyArray'] as $key=>$history){
        echo '
        <tr>
            <td>'.($key+1).'</td>
            <td>'.$history['bloodPerssure'].'</td>
            <td>'.$history['weight'].'</td>
            <td>'.$history['bloodSugar'].'</td>
            <td>'.$history['temp'].'</td>
            <td>'.$history['prescription'].'</td>
            <td>'.$history['createdDate'].'</td>
        </tr>
        ';
    }
}