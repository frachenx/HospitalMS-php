<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class MedicalHistory extends Database{
    public $id,$patientID,$bloodPressure,$bloodSugar,$weight,$temperature,$prescription,$createdDate;

    public static function GetPatientHistory($patientID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM MEDICAL_HISTORY WHERE patient_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $patientID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $historyArray = array();
                        while ($row = $result->fetch_array()) {
                            $history = new MedicalHistory();
                            $history->id=$row['id'];
                            $history->patientID=$row['patient_id'];
                            $history->bloodPressure=$row['blood_pressure'];
                            $history->bloodSugar=$row['blood_sugar'];
                            $history->weight=$row['weight'];
                            $history->temperature=$row['temperature'];
                            $history->prescription=$row['prescription'];
                            $history->createdDate=$row['created_date'];
                            $historyArray[] = $history;
                        }
                        return $historyArray;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public static function AddMedicalHistory($patientID,$bloodPressure,$bloodSugar,$weight,$temp,$prescription){
        $instance = new self();
        $conn = $instance->connect();
        $SQL='INSERT INTO MEDICAL_HISTORY(patient_id,blood_pressure,blood_sugar,weight,temperature,prescription) VALUES(?,?,?,?,?,?)';
        $stmt=$conn->prepare($SQL);
        if(!$stmt){
            return false;
        }else{
            if($stmt->bind_param("ssssss",$patientID,$bloodPressure,$bloodSugar,$weight,$temp,$prescription)){
                return $stmt->execute();
            }else{  
                return false;
            }
        }
    }
}