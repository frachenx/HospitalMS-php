<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class Specialty extends Database{
    public $id,$spec,$createdDate,$updatedDate;
    public static function GetSpecialties()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTOR_SPECIALIZATION';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $specArray = array();
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            } else {
                while ($row = $result->fetch_array()) {
                    $specialty=new Specialty();
                    $specialty->id=$row['id'];
                    $specialty->spec=$row['specialization'];
                    $specialty->createdDate=$row['created_date'];
                    $specialty->updatedDate=$row['updated_date'];
                    $specArray[] = $specialty;
                }
                return $specArray;
            }
        } else {
            return false;
        }
    }
    public static function InsertSpecialty($specName)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'INSERT INTO DOCTOR_SPECIALIZATION(specialization) VALUES(?) ';
        $stmt = $conn->prepare($SQL);
        $returnObj = null;
        if (!$stmt->bind_param("s", $specName)) {
            return false;
        } else {
            return $stmt->execute();
        }
    }
    public static function GetSpecialty($specID)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTOR_SPECIALIZATION WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $returnObj = new stdClass();
        if (!$stmt) {
            return false;
        } else {
            if (!$stmt->bind_param("s", $specID)) {
                return false;
            } else {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $row = $result->fetch_array();
                        if (!is_null($row)) {
                            $specialty= new Specialty();
                            $specialty->id=$row['id'];
                            $specialty->spec=$row['specialization'];
                            $specialty->createdDate=$row['created_date'];
                            $specialty->updatedDate=$row['updated_date'];
                            return $specialty;
                        } else {
                            return false;
                        }
                    }
                }
            }
        }
    }
    public static function UpdateSpecialty($specID, $spec)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'UPDATE DOCTOR_SPECIALIZATION SET specialization=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $returnObj = null;
        if (!$stmt->bind_param("ss", $spec, $specID)) {
            return false;
        } else {
            return $stmt->execute();
        }
    }
    public static function DeleteSpecialty($specID)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'DELETE FROM DOCTOR_SPECIALIZATION WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $returnObj = null;
        if (!$stmt->bind_param("s", $specID)) {
            return false;
        } else {
            return $stmt->execute();
        }
    }

    
}