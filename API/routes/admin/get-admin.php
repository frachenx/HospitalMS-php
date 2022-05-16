<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/admin.php");

if($_SERVER['REQUEST_METHOD']=="GET"){
    $id=htmlentities($_GET['id']);
    echo json_encode(Admin::GetAdmin($id));
}