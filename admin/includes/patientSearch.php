<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/classes/admin.php');
$searchWord='';
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
    $searchWord=$_POST['search'];
}
function getPatients()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
        $searchWord = "{$_POST['search']}%";
        $patients=Admin::GetPatientByName($searchWord);
        foreach($patients as $key=>$patient){
            echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$patient['name'].'</td>
                <td>'.$patient['contact'].'</td>
                <td>'.$patient['gender'].'</td>
                <td>'.$patient['createdDate'].'</td>
                <td>'.$patient['updatedDate'].'</td>
                <td>
                    <a href="//localhost/hospital2/admin/view-patient.php?id='.$patient['id'].'"><i class="fa-solid fa-eye"></i></a>
                </td>
            </tr>
            ';
        }
    }
}
