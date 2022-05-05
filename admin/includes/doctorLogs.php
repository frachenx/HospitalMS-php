<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/admin.php');


function getDoctorLogs(){
    $logs = Admin::GetDoctorLogs();
    foreach($logs as $key=>$log){
        echo '
        <tr>
            <td>'.($key+1).'</td>
            <td>'.$log['userID'].'</td>
            <td>'.$log['username'].'</td>
            <td>'.$log['ip'].'</td>
            <td>'.$log['loginTime'].'</td>
            <td>'.$log['logoutTime'].'</td>
        </tr>
        ';
    }
}