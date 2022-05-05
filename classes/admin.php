<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/hospital2/classes/database.php');
class Admin extends Database
{
    public $username, $password;
    public static function Login($username, $password)
    {
        $SQL = "SELECT * FROM ADMIN WHERE username=?";
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
    public static function SendContactInfo($name, $email, $mobile, $description)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'INSERT INTO contact_us(full_name,email,contact,message) VALUES(?,?,?,?)';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            die(mysqli_error($conn));
        }
        $stmt->bind_param("ssss", $name, $email, $mobile, $description);

        return $stmt->execute();
    }
    public static function GetAdmin($id)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM ADMIN WHERE id=?';
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_array();

        $instance->username = $row['username'];
        $instance->password = $row['password'];
        return $instance;
    }
    public static function GetUsersCount()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT COUNT(id) as count FROM USERS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return 0;
            } else {
                $row = $result->fetch_array();
                return $row['count'];
            }
        }
    }
    public static function GetDoctorsCount()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT COUNT(id) as count FROM DOCTORS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return 0;
            } else {
                $row = $result->fetch_array();
                return $row['count'];
            }
        } else {
            return 0;
        }
    }
    public static function GetAppointmentsCount()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT COUNT(id) as count FROM APPOINTMENTS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return 0;
            } else {
                $row = $result->fetch_array();
                return $row['count'];
            }
        } else {
            return 0;
        }
    }
    public static function GetPatientsCount()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT COUNT(id) as count FROM PATIENTS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return 0;
            } else {
                $row = $result->fetch_array();
                return $row['count'];
            }
        } else {
            return 0;
        }
    }
    public static function GetNewQueries()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT COUNT(id) as count FROM CONTACT_US WHERE status!=1';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return 0;
            } else {
                $row = $result->fetch_array();
                return $row['count'];
            }
        } else {
            return 0;
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

    public static function GetDoctors()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT *  FROM DOCTORS';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
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

    public static function UpdateDoctor($doctor)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $specObjs = Admin::GetSpecialty($doctor->specID);
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
            if (!$stmt->bind_param("sssssss", $doctor->specID, $specName, $doctor->name, $doctor->address, $doctor->fee, $doctor->contact, $doctor->id)) {
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

    public static function GetUsers()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM USERS';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $usersArray = array();
                    while ($row = $result->fetch_array()) {
                        $usersArray[] = array(
                            "id" => $row['id'],
                            "fullname" => $row['fullname'],
                            "address" => $row['address'],
                            "city" => $row['city'],
                            "gender" => $row['gender'],
                            "email" => $row['email'],
                            "password" => $row['password'],
                            "created_date" => $row['created_date'],
                            "updated_date" => $row['updated_date']
                        );
                    }
                    return $usersArray;
                }
            } else {
                return false;
            }
        }
    }

    public static function DeleteUser($id)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'DELETE FROM USERS WHERE id=?';
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

    public static function GetPatients()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM PATIENTS';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
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

    public static function GetAppointments()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM APPOINTMENTS AS A, DOCTORS AS D, PATIENTS AS P WHERE D.id=A.doctor_id AND P.id=A.user_id;';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $appointmentsArray = array();
                    while ($row = $result->fetch_array()) {
                        $dateTime = $row['appointment_date'];
                        $dateTime .= '//' . $row['appointment_time'];
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
                return false;
            }
        }
    }

    public static function GetUnreadQueries()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM CONTACT_US WHERE status!=1';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $queriesArray = array();
                    while ($row = $result->fetch_array()) {
                        $queriesArray[] = array(
                            "id" => $row['id'],
                            "name" => $row['full_name'],
                            "email" => $row['email'],
                            "contact" => $row['contact'],
                            "message" => $row['message'],
                            "createdDate" => $row['post_date'],
                            "remark" => $row['admin_remark'],
                            "updatedDate" => $row['updated_date'],
                            "status" => $row['status']
                        );
                    }
                    return $queriesArray;
                }
            } else {
                return false;
            }
        }
    }

    public static function GetReadQueries()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM CONTACT_US WHERE status=1';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->execute()) {
                $result = $stmt->get_result();
                if (!$result) {
                    return false;
                } else {
                    $queriesArray = array();
                    while ($row = $result->fetch_array()) {
                        $queriesArray[] = array(
                            "id" => $row['id'],
                            "name" => $row['full_name'],
                            "email" => $row['email'],
                            "contact" => $row['contact'],
                            "message" => $row['message'],
                            "createdDate" => $row['post_date'],
                            "remark" => $row['admin_remark'],
                            "updatedDate" => $row['updated_date'],
                            "status" => $row['status']
                        );
                    }
                    return $queriesArray;
                }
            } else {
                return false;
            }
        }
    }

    public static function GetQuery($queryID)
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM CONTACT_US WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $queryID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $query = new stdClass();
                        $row = $result->fetch_array();
                        $query->id = $row['id'];
                        $query->name = $row['full_name'];
                        $query->email = $row['email'];
                        $query->contact = $row['contact'];
                        $query->message = $row['message'];
                        $query->createdDate = $row['post_date'];
                        $query->remark = $row['admin_remark'];
                        $query->updatedDate = $row['updated_date'];
                        $query->status = $row['status'];
                        return $query;
                    }
                } else {
                    return false;
                }
            } else {
                return false;
            }
        }
    }

    public static function UpdateQuery($queryID, $remark)
    {
        $status = 1;
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'UPDATE CONTACT_US SET admin_remark=?, status=? WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if (!$stmt->bind_param("sss", $remark, $status, $queryID)) {
                return false;
            } else {
                return $stmt->execute();
            }
        }
    }

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
                        $doctorLogsArray[] = array(
                            "id" => $row['id'],
                            "userID" => $row['uid'],
                            "username" => $row['username'],
                            "ip" => $row['user_ip'],
                            "loginTime" => $row['login_time'],
                            "logoutTime" => $row['logout_time'],
                            "status" => $row['status']
                        );
                    }
                    return $doctorLogsArray;
                }
            } else {
                return false;
            }
        }
    }

    public static function GetUserLogs()
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM USER_LOGS';
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
                        $doctorLogsArray[] = array(
                            "id" => $row['id'],
                            "userID" => $row['uid'],
                            "username" => $row['username'],
                            "ip" => $row['user_ip'],
                            "loginTime" => $row['login_time'],
                            "logoutTime" => $row['logout_time'],
                            "status" => $row['status']
                        );
                    }
                    return $doctorLogsArray;
                }
            } else {
                return false;
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

    public static function ChangeAdminPassword($adminID, $currentPassword, $newPassword)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM ADMIN WHERE id=?';
        $stmt = $conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("s", $adminID)) {
                if ($stmt->execute()) {
                    $result = $stmt->get_result();
                    if (!$result) {
                        return false;
                    } else {
                        $row = $result->fetch_array();
                        if (!is_null($row)) {
                            $hash = $row['password'];
                            $hash = str_replace("$2a$", "$2y$", $hash);
                            $hash = str_replace("$2b$", "$2y$", $hash);
                            if(password_verify($currentPassword,$hash)){
                                $newHash=password_hash($newPassword,PASSWORD_BCRYPT);
                                $SQL='UPDATE ADMIN SET password=? WHERE id=?';
                                $stmt->prepare($SQL);
                                if(!$stmt){
                                    return false;
                                }else{
                                    if($stmt->bind_param("ss",$newHash,$adminID)){
                                        return $stmt->execute();
                                    }else{
                                        return false;
                                    }
                                }
                            }else{
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
}
