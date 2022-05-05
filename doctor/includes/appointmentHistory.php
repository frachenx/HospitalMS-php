<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/doctor.php');
function getAppointments()
{
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $appointments = Doctor::GetAppointmentHistory($_SESSION['doctor_id']);
    foreach ($appointments as $key => $appointment) {
        $currentStatus='';
        $action='';
        if($appointment['userStatus']=='0' && $appointment['doctorStatus']=='0'){
            $currentStatus='Canceled';
            $action='Canceled';
        }
        if($appointment['userStatus']=='0' && $appointment['doctorStatus']=='1'){
            $currentStatus='Canceled by patient';
            $action='Canceled';
        }
        if($appointment['userStatus']=='1' && $appointment['doctorStatus']=='0'){
            $currentStatus='Canceled by you';
            $action='Canceled';
        }
        if($appointment['userStatus']=='1' && $appointment['doctorStatus']=='1'){
            $currentStatus='Active';
            $action='No Action yet';
        }
        echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$appointment['patientName'].'</td>
                <td>'.$appointment['spec'].'</td>
                <td>'.$appointment['fee'].'</td>
                <td>'.$appointment['appointmentDateTime'].'</td>
                <td>'.$appointment['createdDate'].'</td>
                <td>'.$currentStatus.'</td>
                <td>'.$action.'</td>
            </tr>
        ';
    }
}
