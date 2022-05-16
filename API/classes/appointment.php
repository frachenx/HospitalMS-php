<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');
class Appointment extends Database{
    public $id,$doctorID,$userID,$spec,$fee,$appointmentDate,$appointmentTime,$createdDate,$userStatus,$doctorStatus,$updatedDate;

    public static function GetAppointments()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM APPOINTMENTS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            } else {
                $appointmentsArray=array();
                while($row=$result->fetch_array()){
                    $appointment= new Appointment();
                    $appointment->id=$row['id'];
                    $appointment->doctorID=$row['doctor_id'];
                    $appointment->userID=$row['user_id'];
                    $appointment->spec=$row['doctor_spec'];
                    $appointment->fee=$row['consultancy_fees'];
                    $appointment->appointmentDate=$row['appointment_date'];
                    $appointment->appointmentTime=$row['appointment_time'];
                    $appointment->createdDate=$row['posting_date'];
                    $appointment->userStatus=$row['user_status'];
                    $appointment->doctorStatus=$row['doctor_status'];
                    $appointment->updatedDate=$row['update_date'];
                    $appointmentsArray[]=$appointment;
                }
                return $appointmentsArray;
            }
        } else {
            return false;
        }
    }
    public static function CancelUserAppointment($appointmentID)
    {
        $instance =  new self();
        $userStatus = 0;
        $conn = $instance->connect();
        $SQL = 'UPDATE APPOINTMENTS SET user_status=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ss", $userStatus, $appointmentID)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
    public static function AddAppointment($userID,$docID,$docSpec,$fee,$appDate,$appTime){
        $status=1;
        $instance = new self();
        $conn = $instance->connect();
        $SQL='INSERT INTO APPOINTMENTS(user_id,doctor_id,doctor_spec,consultancy_fees,appointment_date,appointment_time,user_status,doctor_status) VALUES(?,?,?,?,?,?,?,?)';
        $stmt = $conn->prepare($SQL);
        if(!$stmt){
            return false;
        }else{
            if($stmt->bind_param("ssssssss",$userID,$docID,$docSpec,$fee,$appDate,$appTime,$status,$status)){
                return $stmt->execute();
            }else{
                return false;
            }
        }
    }
}