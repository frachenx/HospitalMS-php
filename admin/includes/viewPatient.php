<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$patient = new stdClass();
$historyArray = array();
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    $patient = Admin::GetPatient($_GET['id']);
    $historyArray = Admin::GetPatientHistory($_GET['id']);
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