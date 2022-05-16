<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/hospital2/API/classes/database.php');

class Query extends Database{
    public $id,$name,$email,$contact,$message,$postDate,$adminRemark,$updatedDate,$status;
    public static function GetNewQueries()
    {
        $instance = new self();
        $conn = $instance->connect();
        $SQL = 'SELECT * FROM CONTACT_US WHERE status!=1';
        $stmt = $conn->prepare($SQL);
        if ($stmt->execute()) {
            $result = $stmt->get_result();
            if (!$result) {
                return false;
            } else {
                $queryArray = array();
                while($row=$result->fetch_array()){
                    $query= new Query();
                    $query->id=$row['id'];
                    $query->name=$row['full_name'];
                    $query->email=$row['email'];
                    $query->contact=$row['contact'];
                    $query->message=$row['message'];
                    $query->postDate=$row['post_date'];
                    $query->adminRemark=$row['admin_remark'];
                    $query->updatedDate=$row['updated_date'];
                    $query->status=$row['status'];
                    $queryArray[]=$query;
                }
                return $queryArray;
            }
        } else {
            return false;
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
                        $query = new Query();
                        
                        $query->id=$row['id'];
                        $query->name=$row['full_name'];
                        $query->email=$row['email'];
                        $query->contact=$row['contact'];
                        $query->message=$row['message'];
                        $query->postDate=$row['post_date'];
                        $query->adminRemark=$row['admin_remark'];
                        $query->updatedDate=$row['updated_date'];
                        $query->status=$row['status'];
                        $queriesArray[] = $query;
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
                        $query = new Query();
                        // public $id,$name,$email,$contact,$message,$postDate,$adminRemark,$updatedDate,$status;
                        $row = $result->fetch_array();
                        $query->id = $row['id'];
                        $query->name = $row['full_name'];
                        $query->email = $row['email'];
                        $query->contact = $row['contact'];
                        $query->message = $row['message'];
                        $query->postDate = $row['post_date'];
                        $query->adminRemark = $row['admin_remark'];
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
}