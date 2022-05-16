<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/user.php");

if($_SERVER['REQUEST_METHOD']=='DELETE'){
    $ID=$_GET['id'];
    echo json_encode(User::DeleteUser($ID));
}