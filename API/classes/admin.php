<?php
include_once($_SERVER['DOCUMENT_ROOT'] . "/hospital2/API/classes/database.php");
class Admin extends Database
{
    public $id, $username, $password, $updatedDate;
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
                    $returnObj = new stdClass();
                    $returnObj->id = $row['id'];
                    $returnObj->username = $row['username'];
                    $returnObj->password = $row['password'];
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

        $instance->id = $row['id'];
        $instance->username = $row['username'];
        $instance->password = $row['password'];
        $instance->updatedDate = $row['updated_date'];
        return $instance;
    }
    public static function CheckPassword($adminID, $currentPassword)
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
    public static function ChangePassword($adminID, $newPassword)
    {
        $instance =  new self();
        $conn = $instance->connect();
        $newHash = password_hash($newPassword, PASSWORD_BCRYPT);
        $SQL = 'UPDATE ADMIN SET password=? WHERE id=?';
        $stmt=$conn->prepare($SQL);
        if (!$stmt) {
            return false;
        } else {
            if ($stmt->bind_param("ss", $newHash, $adminID)) {
                return $stmt->execute();
            } else {
                return false;
            }
        }
    }
}
