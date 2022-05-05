<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    if(Admin::DeleteUser($_GET['id'])){
        $resultString='1';
    }else{
        $resultString='0';
    }
    unset($_GET['id']);
}

function getUsers(){
    $users = Admin::GetUsers();
    foreach($users as $key=>$user){
        echo '
        <tr>
            <td>'.($key+1).'</td>
            <td>'.$user['fullname'].'</td>
            <td>'.$user['address'].'</td>
            <td>'.$user['city'].'</td>
            <td>'.$user['gender'].'</td>
            <td>'.$user['email'].'</td>
            <td>'.$user['created_date'].'</td>
            <td>'.$user['updated_date'].'</td>
            <td>
                <a href="//localhost/hospital2/admin/manage-users.php?id='.$user['id'].'" class="table-delete"><i class="fa-solid fa-trash-can"></i></a>
            </td>
        </tr>
        ';
    }
    for($k=0;$k<count($users);$k++){
        
    }
    // echo  json_encode($users);
}