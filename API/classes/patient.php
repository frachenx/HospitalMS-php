<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class Patient extends Database{
    public $id,$doctorID,$name,$contact,$email,$gender,$address,$age,$medicalHistory,$createdDate,$updatedDate;
    public static function GetPatients()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            }else{
                $patientsArray=array();
                while($row=$result->fetch_array()){
                    $patient = new Patient();
                    $patient->id=$row['id'];
                    $patient->doctorid=$row['doctor_id'];
                    $patient->name=$row['patient_name'];
                    $patient->contact=$row['patient_contact'];
                    $patient->email=$row['patient_email'];
                    $patient->gender=$row['patient_gender'];
                    $patient->address=$row['patient_address'];
                    $patient->age=$row['patient_age'];
                    $patient->medicalHistory=$row['patient_medical_history'];
                    $patient->createdDate=$row['created_date'];
                    $patient->updatedDate=$row['updated_date'];
                    $patientsArray[]=$patient;
                }
                return $patientsArray;
            }
        } else {
            return false;
        }
    }
    public static function GetPatient($patientID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS WHERE id=?';
        $stmt = $conn->prepare($SQL);

        if (!$stmt) {
            return false;
        } else {
            if (!$stmt->bind_param("s", $patientID)) {
                return false;
            } else {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $patient = new Patient();
                        while ($row = $result->fetch_array()) {
                            $patient->id = $row['id'];
                            $patient->doctorID = $row['doctor_id'];
                            $patient->name = $row['patient_name'];
                            $patient->contact = $row['patient_contact'];
                            $patient->email = $row['patient_email'];
                            $patient->gender = $row['patient_gender'];
                            $patient->address = $row['patient_address'];
                            $patient->age = $row['patient_age'];
                            $patient->medicalHistory = $row['patient_medical_history'];
                            $patient->createdDate = $row['created_date'];
                            $patient->updatedDate = $row['updated_date'];
                        }
                        return $patient;
                    }
                } else {
                    return false;
                }
            }
        }
    }
    public static function GetReport($startDate, $endDate)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS WHERE created_date BETWEEN (?) AND (?)';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ss", $startDate, $endDate)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $reports = array();
                        while ($row = $result->fetch_array()) {
                            $patient =  new Patient();
                            // public $id,$doctorID,$name,$contact,$email,$gender,$address,$age,$medicalHistory,$createdDate,$updatedDate;
                            $patient->id = $row['id'];
                            $patient->doctorID = $row['doctor_id'];
                            $patient->name = $row['patient_name'];
                            $patient->contact = $row['patient_contact'];
                            $patient->email = $row['patient_email'];
                            $patient->gender = $row['patient_gender'];
                            $patient->address = $row['patient_address'];
                            $patient->age = $row['patient_age'];
                            $patient->medicalHistory = $row['patient_medical_history'];
                            $patient->createdDate = $row['created_date'];
                            $patient->updatedDate = $row['updated_date'];
                            $reports[] = $patient;
                        }
                        return $reports;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public static function GetPatientByName($patientName)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS WHERE patient_name LIKE ?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $patientName)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $reports = array();
                        while ($row = $result->fetch_array()) {
                            $patient =  new Patient();
                            $patient->id = $row['id'];
                            $patient->doctorID = $row['doctor_id'];
                            $patient->name = $row['patient_name'];
                            $patient->contact = $row['patient_contact'];
                            $patient->email = $row['patient_email'];
                            $patient->gender = $row['patient_gender'];
                            $patient->address = $row['patient_address'];
                            $patient->age = $row['patient_age'];
                            $patient->medicalHistory = $row['patient_medical_history'];
                            $patient->createdDate = $row['created_date'];
                            $patient->updatedDate = $row['updated_date'];
                            $reports[] = $patient;
                        }
                        return $reports;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public static function AddPatient($docID,$name,$contact,$email,$gender,$age,$medHistory){
        $instance =  new self();
        $conn = $instance->connect();
        $SQL='INSERT INTO PATIENTS(doctor_id,patient_name,patient_contact,patient_email,patient_gender,patient_age,patient_medical_history) VALUES(?,?,?,?,?,?,?)';
        $stmt=$conn->prepare($SQL);
        if(!$stmt){
            return false;
        }else{
            if($stmt->bind_param("sssssss",$docID,$name,$contact,$email,$gender,$age,$medHistory)){
                return $stmt->execute();
            }else{
                return false;
            }
        }
    }
    public static function GetPatientsByDoctor($doctorID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS WHERE doctor_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if(!$stmt->bind_param("s",$doctorID)){
                return false;
            }
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $patientsArray = array();
                    while ($row = $result->fetch_array()) {
                        $patient = new Patient();
                        $patient->id=$row['id'];
                        $patient->doctorID=$row['doctor_id'];
                        $patient->name=$row['patient_name'];
                        $patient->contact=$row['patient_contact'];
                        $patient->email=$row['patient_email'];
                        $patient->gender=$row['patient_gender'];
                        $patient->address=$row['patient_address'];
                        $patient->age=$row['patient_age'];
                        $patient->medicalHistory=$row['patient_medical_history'];
                        $patient->createdDate=$row['created_date'];
                        $patient->updatedDate=$row['updated_date'];
                        $patientsArray[] = $patient;
                    }
                    return $patientsArray;
                }
            } else {
                return false;
            }
        }
    }
    public static function EditPatient($patientID,$name,$contact,$email,$address,$gender,$age,$medHistory){
        $instance =  new self();
        $conn = $instance->connect();
        $SQL='UPDATE PATIENTS SET patient_name=?,patient_contact=?,patient_email=?,patient_address=?,patient_gender=?,patient_age=?,patient_medical_history=? WHERE id=?';
        $stmt=$conn->prepare($SQL);
        if(!$stmt){
            return false;
        }else{
            if($stmt->bind_param("ssssssss",$name,$contact,$email,$address,$gender,$age,$medHistory,$patientID)){
                return $stmt->execute();
            }else{
                return false;
            }
        }
    }

}