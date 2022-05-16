<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/hospital2/API/classes/database.php");
class Doctor extends Database
{
    public $id, $specID, $spec, $doctorName, $address, $docFee, $contact, $email, $password, $createdDate, $updatedDate;
    public static function Login($username, $password)
    {
        $SQL = "SELECT * FROM DOCTORS WHERE doc_email=?";
        $instance = new self();
        $conn = $instance->connect();
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                $hash = $row['doc_password'];
                $hash = str_replace("$2a$", "$2y$", $hash);
                $hash = str_replace("$2b$", "$2y$", $hash);
                if (password_verify($password, $hash)) {
                    $returnObj = new stdClass();
                    $returnObj->id = $row["id"];
                    $returnObj->specID = $row["spec_id"];
                    $returnObj->spec = $row["specialization"];
                    $returnObj->doctorName = $row["doctor_name"];
                    $returnObj->address = $row["address"];
                    $returnObj->docFee = $row["doc_fees"];
                    $returnObj->contact = $row["contact_no"];
                    $returnObj->email = $row["doc_email"];
                    $returnObj->password = $row["doc_password"];
                    $returnObj->createdDate = $row["created_date"];
                    $returnObj->updatedDate = $row["updated_date"];
                    $returnObj->logID = Doctor::LoginLog($returnObj->id, $returnObj->email);
                    return $returnObj;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function LoginLog($userID, $username)
    {
        $ip = '';
        $status = 1;
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        $SQL = 'INSERT INTO DOCTORSLOG(uid,username,user_ip,status) VALUES(?,?,?,?)';
        $instance = new self();
        $conn = $instance->connect();
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssss", $userID, $username, $ip, $status);
        if ($stmt->execute()) {
            $SQL = "SELECT * FROM DOCTORSLOG ORDER BY id DESC LIMIT 1";
            $stmt = $conn->prepare($SQL);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            return $row['id'];
        }
    }
    public static function GetDoctors()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTORS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            } else {
                $doctorsArray = array();
                while ($row = $result->fetch_array()) {
                    $doctorsArray[] = array(
                        "id" => $row['id'],
                        "specID" => $row['spec_id'],
                        "spec" => $row['specialization'],
                        "doctorName" => $row['doctor_name'],
                        "address" => $row['address'],
                        "docFee" => $row['doc_fees'],
                        "contact" => $row['contact_no'],
                        "email" => $row['doc_email'],
                        "password" => $row['doc_password'],
                        "createdDate" => $row['created_date'],
                        "updatedDate" => $row['updated_date']
                    );
                }
                return $doctorsArray;
            }
        } else {
            return false;
        }
    }
    public static function InsertDoctor($specID, $spec, $docName, $address, $fee, $contact, $email, $password)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'INSERT INTO DOCTORS(spec_id,specialization,doctor_name,address,doc_fees,contact_no,doc_email,doc_password) VALUES(?,?,?,?,?,?,?,?) ';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ssssssss", $specID, $spec, $docName, $address, $fee, $contact, $email, $password)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
    public static function GetDoctor($id)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTORS WHERE id=? ';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $id)) {
                $stmt->execute();
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $row = $result->fetch_array();
                    if (!is_null($row)) {
                        $doctor = new Doctor();
                        // public $id,$specID,$spec,$doctorName,$address,$docFee,$contact,$email,$password,$createdDate,$updatedDate;
                        $doctor->id = $row['id'];
                        $doctor->specID = $row['spec_id'];
                        $doctor->spec = $row['specialization'];
                        $doctor->doctorName = $row['doctor_name'];
                        $doctor->address = $row['address'];
                        $doctor->docFee = $row['doc_fees'];
                        $doctor->contact = $row['contact_no'];
                        $doctor->email = $row['doc_email'];
                        $doctor->password = $row['doc_password'];
                        $doctor->createdDate = $row['created_date'];
                        $doctor->updatedDate = $row['updated_date'];
                        return $doctor;
                    }
                }
            } else {
                return false;
            }
        }
    }
    public static function UpdateDoctor($doctor)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $specObjs = Specialty::GetSpecialty($doctor->specID);
        $specName = '';
        if (!$specObjs) {
        } else {
            $specName = $specObjs->spec;
        }
        $SQL = 'UPDATE DOCTORS SET spec_id=?,specialization=?,doctor_name=?,address=?,doc_fees=?,contact_no=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if (!$stmt->bind_param("sssssss", $doctor->specID, $specName, $doctor->doctorName, $doctor->address, $doctor->docFee, $doctor->contact, $doctor->id)) {
                return false;
            } else {
                return $stmt->execute();
            }
        }
    }
    public static function DeleteDoctor($id)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'DELETE FROM DOCTORS WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $id)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
    public static function CheckPassword($doctorID, $currentPassword)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTORS WHERE id=?';
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
                        $row = $result->fetch_array();
                        if (!is_null($row)) {
                            $hash = $row['doc_password'];
                            $hash = str_replace("$2a$", "$2y$", $hash);
                            $hash = str_replace("$2b$", "$2y$", $hash);
                            if (password_verify($currentPassword, $hash)) {
                                return true;
                            } else {
                                return false;
                            }
                        } else {
                            return false;
                        }
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }
    public static function ChangePassword($doctorID, $newPassword)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $SQL = 'UPDATE DOCTORS SET doc_password=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ss", $newHash, $doctorID)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
    public static function GetDoctorsSpecialties($specID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT *  FROM DOCTORS WHERE spec_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $specID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $doctorsArray = array();
                        while ($row = $result->fetch_array()) {
                            $doctor = new Doctor();
                            $doctor->id = $row['id'];
                            $doctor->specID = $row['spec_id'];
                            $doctor->spec = $row['specialization'];
                            $doctor->doctorName = $row['doctor_name'];
                            $doctor->address = $row['address'];
                            $doctor->docFee = $row['doc_fees'];
                            $doctor->contact = $row['contact_no'];
                            $doctor->email = $row['doc_email'];
                            $doctor->password = $row['doc_password'];
                            $doctor->createdDate = $row['created_date'];
                            $doctor->updatedDate = $row['updated_date'];
                            $doctorsArray[] = $doctor;
                        }
                        return $doctorsArray;
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
