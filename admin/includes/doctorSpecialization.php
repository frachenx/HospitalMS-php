<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
$resultString = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['doc_spec'])) {
        $spec = $_POST['doc_spec'];
        if (Admin::InsertSpecialty($spec)) {
            $resultString = '1';
            unset($_POST);
        } else {
            $resultString = '0';
            unset($_POST);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    // We delete the selected specialization
    $id = $_GET['id'];
    if (Admin::DeleteSpecialty($id)) {
        $resultString = '3';
        unset($_POST);
    } else {
        $resultString = '2';
        unset($_POST);
    }
}



function getSpecialties()
{
    $specialties = Admin::GetSpecialties();
    $specCount = count($specialties, COUNT_NORMAL);
    for ($k = 0; $k < $specCount; $k++) {
        echo '
                    <tr>
                        <td>' . ($k + 1) . '</td>
                        <td>' . $specialties[$k]['spec'] . '</td>
                        <td>' . $specialties[$k]['created_date'] . '</td>
                        <td>' . $specialties[$k]['updated_date'] . '</td>
                        <td>
                            <a href="//localhost/hospital2/admin/edit-doctor-specialization.php?id=' . $specialties[$k]['id'] . '" class="table-edit" title="Edit"><i class="fa-solid fa-marker"></i></a>
                            <a href="//localhost/hospital2/admin/doctor-specialization.php?id=' . $specialties[$k]['id'] . '&del=delete" class="table-delete" title="Delete"><i class="fa-solid fa-trash-can"></i></a>
                        </td>
                    </tr>
                    ';
    }
}
