<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class DoctorLog extends Database{
    public $id,$userID,$username,$userIP,$loginTime,$logoutTime,$status;

    public static function GetDoctorLogs()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTORSLOG';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $doctorLogsArray = array();
                    while ($row = $result->fetch_array()) {
                        $log = new DoctorLog();
                        // public $id,$userID,$username,$userIP,$loginTime,$logoutTime,$status;
                        $log->id=$row['id'];
                        $log->userID=$row['uid'];
                        $log->username=$row['username'];
                        $log->userIP=$row['user_ip'];
                        $log->loginTime=$row['login_time'];
                        $log->logoutTime=$row['logout_time'];
                        $log->status=$row['status'];
                        $doctorLogsArray[] =$log;
                    }
                    return $doctorLogsArray;
                }
            } else {
                return false;
            }
        }
    }
    public static function Logout($logID)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'UPDATE DOCTORSLOG set logout_time=? WHERE id=?';
        $currentDateTime = date('Y-m-d H:i:s');
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if (!$stmt->bind_param("ss", $currentDateTime, $logID)) {
                return false;
            } else {
                return $stmt->execute();
            }
        }
    }
}