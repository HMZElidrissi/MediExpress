<?php

namespace App\Models;

use Core\Database;
use App\Models\User;


class PatientEnLigne extends Patient implements Authenticatable
{
    public function __construct()
    {
        parent::__construct();
    }

    public function register($data)
    {
        $this->db->query('INSERT INTO users (username, email, password, user_type) VALUES (:username, :email, :password, :user_type)');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));
        $this->db->bind(':user_type', "Patient");

        if ($this->db->execute()) {
            $lastUserId = $this->db->lastInsertId();

            $this->db->query('INSERT INTO patients (patient_id, patient_type) VALUES (:patient_id, :patient_type)');
            $this->db->bind(':patient_id', $lastUserId);
            $this->db->bind(':patient_type', 'En Ligne');

            if ($this->db->execute()) {
                return $lastUserId;
            }
        }

        return false;
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->execute();
        $row = $this->db->fetchSingleRecord();

        if ($row && password_verify($password, $row->password)) {
            return $row;
        }
        return false;
    }
    public function getPatientsEnLigne()
    {
        $this->db->query("SELECT * FROM users WHERE user_type = 'Patient' AND id IN (SELECT patient_id FROM patients WHERE patient_type = 'En Ligne')");
        return $this->db->fetchAllRecords();
    }
}