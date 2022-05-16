<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/patient.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $ID=htmlentities($_GET['id']);
    $result = Patient::GetPatient($ID);
    if(!$result){
        echo json_encode(false);
    }else{
        echo json_encode($result);
    }
}