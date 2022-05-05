<?php
include_once('database.php');
class User extends Database
{
    public $id, $fullname, $address, $city, $gender, $email, $password;
    public static function Login($username, $password)
    {
        $SQL = "SELECT * FROM USERS WHERE email=?";
        $instance = new self();
        $conn = $instance->connect();
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $username);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_array();
                $hash = $row['password'];
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
        $SQL = 'INSERT INTO USER_LOGS(uid,username,user_ip,status) VALUES(?,?,?,?)';
        $instance = new self();
        $conn = $instance->connect();
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssss", $userID, $username, $ip, $status);
        if ($stmt->execute()) {
            $SQL = "SELECT * FROM USER_LOGS ORDER BY id DESC LIMIT 1";
            $stmt = $conn->prepare($SQL);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_array();
            return $row['id'];
        }
    }
    public function Register()
    {
        $conn = $this->connect();
        $SQL = 'INSERT INTO USERS(fullname,address,city,gender,email,password) VALUES(?,?,?,?,?,?)';
        if ($stmt = $conn->prepare($SQL)) {
            if ($stmt->bind_param("ssssss", $this->fullname, $this->address, $this->city, $this->gender, $this->email, $this->password)) {
                return $stmt->execute();
            } else {
                echo mysqli_error($conn);
                return false;
            }
        } else {
            echo mysqli_error($conn);
            return false;
        }
    }
    public static function GetUser($id)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM USERS WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();
        $instance->id = $row['id'];
        $instance->fullname = $row['fullname'];
        $instance->address = $row['address'];
        $instance->city = $row['city'];
        $instance->gender = $row['gender'];
        $instance->email = $row['email'];
        $instance->password = $row['password'];
        $instance->createdDate = $row['created_date'];
        $instance->updatedDate = $row['updated_date'];
        return $instance;
    }
    public static function Logout($logID)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'UPDATE USER_LOGS set logout_time=? WHERE id=?';
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
    public function UpdateUser()
    {
        $conn = $this->connect();
        $SQL = 'UPDATE USERS SET fullname=?,address=?,city=?,gender=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("sssss", $this->fullname, $this->address, $this->city, $this->gender, $this->id)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }

    public static function GetAppointmentHistory($userID)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT A.id as appointmentID,doctor_name,patient_name,specialization,consultancy_fees,appointment_date,appointment_time,posting_date,user_status,doctor_status FROM APPOINTMENTS AS A, DOCTORS AS D, PATIENTS AS P WHERE D.id=A.doctor_id AND P.id=A.user_id AND A.user_id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $userID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $appointmentsArray = array();
                        while ($row = $result->fetch_array()) {
                            $dateTime = $row['appointment_date'];
                            $dateTime .= '  ' . $row['appointment_time'];
                            $appointmentsArray[] = array(
                                "id" => $row['appointmentID'],
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
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public static function CancelAppointment($appointmentID)
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
                    $specArray[] = array(
                        "id" => $row['id'],
                        "spec" => $row['specialization'],
                        "created_date" => $row['created_date'],
                        "updated_date" => $row['updated_date']
                    );
                }
                return $specArray;
            }
        } else {
            return false;
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
                            $doctorsArray[] = array(
                                "id" => $row['id'],
                                "specID" => $row['spec_id'],
                                "spec" => $row['specialization'],
                                "docName" => $row['doctor_name'],
                                "address" => $row['address'],
                                "fee" => $row['doc_fees'],
                                "contact" => $row['contact_no'],
                                "email" => $row['doc_email'],
                                "password" => $row['doc_password'],
                                "createdDate" => $row['created_date'],
                                "updatedDate" => $row['updated_date'],
                            );
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
                        $doctorObj = new stdClass();
                        $doctorObj->id = $row['id'];
                        $doctorObj->specID = $row['spec_id'];
                        $doctorObj->spec = $row['specialization'];
                        $doctorObj->name = $row['doctor_name'];
                        $doctorObj->address = $row['address'];
                        $doctorObj->fee = $row['doc_fees'];
                        $doctorObj->contact = $row['contact_no'];
                        $doctorObj->email = $row['doc_email'];
                        $doctorObj->password = $row['doc_password'];
                        $doctorObj->created = $row['created_date'];
                        $doctorObj->updated = $row['updated_date'];
                        return $doctorObj;
                    }
                }
            } else {
                return false;
            }
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
                            $returnObj->id = $row['id'];
                            $returnObj->spec = $row['specialization'];
                            $returnObj->createdDate = $row['created_date'];
                            $returnObj->updateDate = $row['updated_date'];
                            return $returnObj;
                        } else {
                            return false;
                        }
                    }
                }
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
}
