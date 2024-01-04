<?php

namespace App\Models;

use Core\Database;

class PatientEnMagasin extends Patient
{
  public function __construct()
    {
        parent::__construct();
    }
    public function insertPatientEnmagain($name){
        $sql = "INSERT INTO `users`(`username`, `email`, `password`, `user_type`) VALUES (:username , :email , :password, :user_type)";
        $stmt = $this->db->query($sql);
        $this->db->bind(":username" , $name); 
        $this->db->bind(":email" , ""); 
        $this->db->bind(":password" , ""); 
        $this->db->bind(":user_type" , "Patient En Magasin"); 
        $stmt->execute();
        return $lastId = $this->db->lastInsertId();;
    }
}