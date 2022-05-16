<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/doctor.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    $ID=htmlentities($_GET['id']);
    $result = Doctor::GetDoctor($ID);

    if($resul==null || !$result){
        echo json_encode(false);
    }else{
        echo json_encode($result);
    }
}