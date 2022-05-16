<?php
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/config.php");
include_once($_SERVER["DOCUMENT_ROOT"]."/hospital2/API/classes/query.php");

if($_SERVER['REQUEST_METHOD']=='GET'){
    echo json_encode(Query::GetReadQueries());
}