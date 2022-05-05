<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');
function getAppointments()
{
    $appointments = Admin::GetAppointments();
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
            $currentStatus='Canceled by doctor';
            $action='Canceled';
        }
        if($appointment['userStatus']=='1' && $appointment['doctorStatus']=='1'){
            $currentStatus='Active';
            $action='No Action yet';
        }
        echo '
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$appointment['doctorName'].'</td>
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
