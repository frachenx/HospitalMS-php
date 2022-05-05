<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/classes/user.php');

function getMedHistory(){
    if(session_status()==PHP_SESSION_ACTIVE){
    }else{
        session_start();
    }
    $historyArray = User::GetPatientHistory($_SESSION['user_id']);

    foreach($historyArray as $key=>$history){
        echo'
            <tr>
                <td>'.($key+1).'</td>
                <td>'.$history['   '].'</td>
                <td>'.$history['   '].'</td>
                <td>'.$history['   '].'</td>
                <td>'.$history['   '].'</td>
                <td>'.$history['   '].'</td>
                <td>'.$history['   '].'</td>
            </tr>
        ';
    }
}