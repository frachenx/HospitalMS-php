<?php
include_once($_SERVER['DOCUMENT_ROOT']."/hospital2/API/classes/database.php");
class User extends Database{
    public $id, $fullname, $address, $city, $gender, $email, $password,$createdDate,$updatedDate;
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
                    $returObj=new stdClass();
                    $returObj->id=$row['id'];
                    $returObj->fullname=$row['fullname'];
                    $returObj->address=$row['address'];
                    $returObj->city=$row['city'];
                    $returObj->gender=$row['gender'];
                    $returObj->email=$row['email'];
                    $returObj->password=$row['password'];
                    $returObj->createdDate=$row['created_date'];
                    $returObj->updatedDate=$row['updated_date'];
                    $returObj->logID=User::LoginLog($returObj->id,$returObj->email);
                    return $returObj;
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
    public static function GetUsers()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM USERS';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            } else {
                $usersArray=array();
                while($row=$result->fetch_array()){
                    $user = new User();
                    // public $id, $fullname, $address, $city, $gender, $email, $password,$createdDate,$updatedDate;
                    $user->id=$row['id'];
                    $user->fullname=$row['fullname'];
                    $user->address=$row['address'];
                    $user->city=$row['city'];
                    $user->gender=$row['gender'];
                    $user->email=$row['email'];
                    $user->password=$row['password'];
                    $user->createdDate=$row['created_date'];
                    $user->updatedDate=$row['updated_date'];
                    $usersArray[]=$user;
                }
                return $usersArray;
            }
        }else{
            return false;
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
    public static function CheckPassword($userID,$currentPassword){
        $instance =  new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM USERS WHERE id=?';
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
                        $row = $result->fetch_array();
                        if (!is_null($row)) {
                            $hash = $row['password'];
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
    public static function ChangePassword($userID,$newPassword){
        $instance =  new self();
        $conn = $instance->connect();
        $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $SQL = 'UPDATE USERS SET password=? WHERE id=?';
        $stmt=$conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ss", $newHash, $userID)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
}