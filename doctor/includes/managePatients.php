<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
function getPatients(){
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $patients = Doctor::GetPatients($_SESSION['doctor_id']);
    
    if(!$patients){
        echo 'NO RESULTS';
    }else{
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
                    <a href="//localhost/hospital2/doctor/edit-patient.php?id='.$patient['id'].'" class="table-edit"><i class="fa-solid fa-marker"></i></a>
                    <a href="//localhost/hospital2/doctor/view-patient.php?id='.$patient['id'].'" class="table-view"><i class="fa-solid fa-eye"></i></a>
                </td>
            </tr>
            ';
        }
    }
}