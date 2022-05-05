<?php
include_once('database.php');
class Doctor extends Database
{
    public $id, $specID, $specialization, $doctor_name, $address, $fee, $contact, $email, $password, $createdDate, $updatedDate;
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
                    return $row;
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

    public static function GetDoctor($id)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM DOCTORS WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        $instance->id = $row['id'];
        $instance->specID = $row['spec_id'];
        $instance->specialization = $row['specialization'];
        $instance->doctor_name = $row['doctor_name'];
        $instance->address = $row['address'];
        $instance->fee = $row['doc_fees'];
        $instance->contact = $row['contact_no'];
        $instance->email = $row['doc_email'];
        $instance->password = $row['doc_password'];
        $instance->createdDate = $row['created_date'];
        $instance->updatedDate = $row['updated_date'];
        return $instance;
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

    public function UpdateDoctor()
    {
        $conn = $this->connect();
        $SQL = 'UPDATE DOCTORS SET spec_id=?,specialization=?,doctor_name=?,address=?,doc_fees=?,contact_no=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("sssssss", $this->specID, $this->specialization, $this->doctor_name, $this->address, $this->fee, $this->contact, $this->id)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }

    public static function ChangeDoctorPassword($doctorID, $currentPassword, $newPassword)
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
                                $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
                                $SQL = 'UPDATE DOCTORS SET doc_password=? WHERE id=?';
                                $stmt->prepare($SQL);
                                if (!$stmt) {
                                    return false;
                                } else {
                                    if ($stmt->bind_param("ss", $newHash, $doctorID)) {
                                        return $stmt->execute();
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
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public static function GetAppointmentHistory($doctorID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM APPOINTMENTS AS A, DOCTORS AS D, PATIENTS AS P WHERE D.id=A.doctor_id AND P.id=A.user_id AND A.doctor_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return 'prepareError';
            return false;
        } else {
            if ($stmt->bind_param("s", $doctorID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return 2;
                        return false;
                    } else {
                        $appointmentsArray = array();
                        while ($row = $result->fetch_array()) {
                            $dateTime = $row['appointment_date'];
                            $dateTime .= '  ' . $row['appointment_time'];
                            $appointmentsArray[] = array(
                                "id" => $row['id'],
                                "doctorName" => $row['doctor_name'],
                                "patientName" => $row['patient_name'],
                                "spec" => $row['specialization'],
                                "fee" => $row['consultancy_fees'],
                                "appointmentDateTime" => $dateTime,
                                "createdDate" => $row['posting_date'],
                                "userStatus" => $row['user_status'],
                                "doctorStatus" => $row['doctor_status']
                            );
                        }
                        return $appointmentsArray;
                    }
                } else {
                    return 3;
                    return false;
                }
            } else {
                return 4;
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

    public static function GetPatients($doctorID)
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
                        $patientsArray[] = array(
                            "id" => $row['id'],
                            "doctorID" => $row['doctor_id'],
                            "name" => $row['patient_name'],
                            "contact" => $row['patient_contact'],
                            "email" => $row['patient_email'],
                            "gender" => $row['patient_gender'],
                            "address" => $row['patient_address'],
                            "age" => $row['patient_age'],
                            "medicalHistory" => $row['patient_medical_history'],
                            "createdDate" => $row['created_date'],
                            "updatedDate" => $row['updated_date']
                        );
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
                        $patient = new stdClass();
                        while ($row = $result->fetch_array()) {
                            $patient->id = $row['id'];
                            $patient->doctorID = $row['doctor_id'];
                            $patient->name = $row['patient_name'];
                            $patient->contact = $row['patient_contact'];
                            $patient->email = $row['patient_email'];
                            $patient->gender = $row['patient_gender'];
                            $patient->address = $row['patient_address'];
                            $patient->age = $row['patient_age'];
                            $patient->history = $row['patient_medical_history'];
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
                            $historyArray[] = array(
                                "id" => $row['id'],
                                "patientID" => $row['patient_id'],
                                "bloodPerssure" => $row['blood_pressure'],
                                "bloodSugar" => $row['blood_sugar'],
                                "weight" => $row['weight'],
                                "temp" => $row['temperature'],
                                "prescription" => $row['prescription'],
                                "createdDate" => $row['created_date']
                            );
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
                            $reports[] = array(
                                "id" => $row['id'],
                                "name" => $row['patient_name'],
                                "contact" => $row['patient_contact'],
                                "gender" => $row['patient_gender'],
                                "createdDate" => $row['created_date'],
                                "updatedDate" => $row['updated_date']
                            );
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
}
