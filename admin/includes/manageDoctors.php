<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/classes/admin.php');
$resultString='';
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    $id = $_GET['id'] ; 
    if(Admin::DeleteDoctor($id)){
        $resultString='1';
        // header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/manage-doctors.php');
        // unset($_GET['id']);
    }else{
        $resultString='0';
        // header('Location:'.$_SERVER['DOCUMENT_ROOT'].'/hospital2/admin/manage-doctors.php');
        // unset($_GET['id']);
    }
}
function getDoctors()
{
    $doctors = Admin::GetDoctors();
    if (!$doctors) {
    } else {
        for ($k = 0; $k < count($doctors); $k++) {
            echo '
            <tr>
                <td>'.($k+1).'</td>
                <td>'.$doctors[$k]['spec'].'</td>
                <td>'.$doctors[$k]['docName'].'</td>
                <td>'.$doctors[$k]['createdDate'].'</td>
                <td>
                    <a href="//localhost/hospital2/admin/edit-doctor.php?id='.$doctors[$k]['id'].'" class="table-edit" title="Edit"><i class="fa-solid fa-marker"></i></a>
                    <a href="//localhost/hospital2/admin/manage-doctors.php?id='.$doctors[$k]['id'].'&del=delete" class="table-delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                </td>
            </tr>
            ';
        }
    }
}
