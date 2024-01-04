<?php

namespace App\Models;

use Core\Database;

class Patients extends User
{
    public function __construct() {
        parent::__construct();
    }


public function getAllPatients()
{
    $this->db->query("SELECT * FROM users");

    $patientsData = $this->db->fetchAllRecords();

    return $patientsData;
}
public function  insertPatient($username,$email,$password,$user_type)
{
    $sql = "INSERT INTO users (username,email,password,user_type) VALUES (:username, :email,:password, :user_type)";
    $result=$this->db->query($sql);
    $this->db->bind(":username",$username);
    $this->db->bind(":email",$email);
    $this->db->bind(":password",$password);
    $this->db->bind(":user_type",$user_type);
    return $result->execute();
}
public function  updatePatient($id,$username,$email,$user_type)
{
    $sql = "UPDATE users set username = :username, email = :email, user_type = :user_type
                WHERE id=:id";
    $result = $this->db->query($sql);
    $this->db->bind(":id",$id);
    $this->db->bind(":username",$username);
    $this->db->bind(":email",$email);
    $this->db->bind(":user_type",$user_type);
    return $result->execute();
}

public function  deletePatient($id)
{
    $sql = "DELETE FROM  users Where id =:id ";
    $result=$this->db->query($sql);
    $this->db->bind(":id",$id);
    
    return $result->execute(); 
}

   
}
