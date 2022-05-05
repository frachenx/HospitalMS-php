<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
if($_SERVER['REQUEST_METHOD']=='GET' && isset($_GET['id'])){
    User::CancelAppointment($_GET['id']);
}

function getAppointments()
{
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $appointments = User::GetAppointmentHistory($_SESSION['user_id']);
    foreach ($appointments as $key => $appointment) {
        $currentStatus='';
        if($appointment['userStatus']=='0' && $appointment['doctorStatus']=='0'){
            $currentStatus='Canceled';
        }
        if($appointment['userStatus']=='0' && $appointment['doctorStatus']=='1'){
            $currentStatus='Canceled by you';
        }
        if($appointment['userStatus']=='1' && $appointment['doctorStatus']=='0'){
            $currentStatus='Canceled by Doctor';
        }
        if($appointment['userStatus']=='1' && $appointment['doctorStatus']=='1'){
            $currentStatus='Active';
        }
        $status = ($appointment['userStatus']==0) ? ('Canceled') : ('<a href="//localhost/hospital2/appointment-history.php?id='.$appointment['id'].'">Cancel</a>') ; 
        echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$appointment['patientName'].'</td>
                <td>'.$appointment['spec'].'</td>
                <td>'.$appointment['fee'].'</td>
                <td>'.$appointment['appointmentDateTime'].'</td>
                <td>'.$appointment['createdDate'].'</td>
                <td>'.$currentStatus.'</td>
                <td>
                    '.$status.'
                </td>
            </tr>
        ';
    }
}


