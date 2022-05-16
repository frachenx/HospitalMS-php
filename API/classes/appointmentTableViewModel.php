<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class AppointmentTableViewModel extends Database{
    public $id,$patientID,$patientName,$docID,$docName,$specID,$spec,$fee,$dateTime,$createdDate,$status,$action;

    public static function GetDoctorAppointmentHistory($doctorID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM APPOINTMENTS AS A, DOCTORS AS D, PATIENTS AS P WHERE D.id=A.doctor_id AND P.id=A.user_id AND A.doctor_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $doctorID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $appointmentsArray = array();
                        while ($row = $result->fetch_array()) {
                            $appointment= new AppointmentTableViewModel();
                            // public $id,$patientID,$patientName,$docID,$docName,$specID,$spec,$fee,$date,$time,$createdDate,$status,$action;
                            $appointment->id=$row['id'];
                            $appointment->patientID=$row['user_id'];
                            $appointment->patientName=$row['patient_name'];
                            $appointment->docID=$row['doctor_id'];
                            $appointment->docName=$row['doctor_name'];
                            $appointment->specID=$row['spec_id'];
                            $appointment->spec=$row['specialization'];
                            $appointment->fee=$row['consultancy_fees'];

                            $dateTime = $row['appointment_date'];
                            $dateTime .= '//' . $row['appointment_time'];

                            $appointment->dateTime=$row['appointment_date'];
                            $appointment->createdDate=$row['posting_date'];

                            $currentStatus='';
                            $action='';
                            if($row['user_status']=='0' && $row['doctor_status']=='0'){
                                $currentStatus='Canceled';
                                $action='Canceled';
                            }
                            if($row['user_status']=='0' && $row['doctor_status']=='1'){
                                $currentStatus='Canceled by patient';
                                $action='Canceled';
                            }
                            if($row['user_status']=='1' && $row['doctor_status']=='0'){
                                $currentStatus='Canceled by you';
                                $action='Canceled';
                            }
                            if($row['user_status']=='1' && $row['doctor_status']=='1'){
                                $currentStatus='Active';
                                $action='No Action yet';
                            }

                            $appointment->status=$currentStatus;
                            $appointment->action=$action;
                            $appointmentsArray[] = $appointment;
                        }
                        return $appointmentsArray;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public static function GetUserAppointmentHistory($userID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM APPOINTMENTS AS A, DOCTORS AS D, PATIENTS AS P WHERE D.id=A.doctor_id AND P.id=A.user_id AND A.user_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $doctorID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $appointmentsArray = array();
                        while ($row = $result->fetch_array()) {
                            $appointment= new AppointmentTableViewModel();
                            // public $id,$patientID,$patientName,$docID,$docName,$specID,$spec,$fee,$date,$time,$createdDate,$status,$action;
                            $appointment->id=$row['id'];
                            $appointment->patientID=$row['user_id'];
                            $appointment->patientName=$row['patient_name'];
                            $appointment->docID=$row['doctor_id'];
                            $appointment->docName=$row['doctor_name'];
                            $appointment->specID=$row['spec_id'];
                            $appointment->spec=$row['specialization'];
                            $appointment->fee=$row['consultancy_fees'];

                            $dateTime = $row['appointment_date'];
                            $dateTime .= '//' . $row['appointment_time'];

                            $appointment->dateTime=$row['appointment_date'];
                            $appointment->createdDate=$row['posting_date'];

                            $currentStatus='';
                            $action='';
                            if($row['user_status']=='0' && $row['doctor_status']=='0'){
                                $currentStatus='Canceled';
                                $action='Canceled';
                            }
                            if($row['user_status']=='0' && $row['doctor_status']=='1'){
                                $currentStatus='Canceled by you';
                                $action='Canceled';
                            }
                            if($row['user_status']=='1' && $row['doctor_status']=='0'){
                                $currentStatus='Canceled by doctor';
                                $action='Canceled';
                            }
                            if($row['user_status']=='1' && $row['doctor_status']=='1'){
                                $currentStatus='Active';
                                $action='No Action yet';
                            }

                            $appointment->status=$currentStatus;
                            $appointment->action=$action;
                            $appointmentsArray[] = $appointment;
                        }
                        return $appointmentsArray;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

}