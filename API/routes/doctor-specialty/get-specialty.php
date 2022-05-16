<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor-specialty.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $ID=htmlentities($_GET['id']);
    $result = Specialty::GetSpecialty($ID);

    if($result==null || !$result){
        echo json_encode(false);
    }else{
        echo json_encode($result);
    }
}