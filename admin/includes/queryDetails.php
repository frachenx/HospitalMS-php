<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    $query=Admin::GetQuery($_GET['id']);
}   

if($_SERVER['REQUEST_METHOD']=='POST'){
    (Admin::UpdateQuery($_GET['id'],$_POST['remark']));
    $query=Admin::GetQuery($_GET['id']);
}