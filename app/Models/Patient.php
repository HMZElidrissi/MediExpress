<?php

namespace App\Models;

use Core\Database;

class Patient extends User
{
    public function createPatient($data)
    {
        $this->db->query('INSERT INTO users (username, email, password) VALUES (:username, :email, :password, )');
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', password_hash($data['password'], PASSWORD_DEFAULT));

        if ($this->db->execute()) {
            $lastUserId = $this->db->lastInsertId();
            return $lastUserId;
        }

        return false;
    }

    public function getAllPatients()
    {
        $this->db->query("SELECT * FROM users ");
        return $this->db->fetchAllRecords();
    }

    public function getPatientById($id)
    {
        $this->db->query("SELECT * FROM users WHERE id = :id ");
        $this->db->bind(':id', $id);
        return $this->db->fetchSingleRecord();
    }

    public function updatePatient($id, $data)
    {
        $this->db->query("UPDATE users SET username = :username, email = :email WHERE id = :id ");
        $this->db->bind(':id', $id);
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);

        return $this->db->execute();
    }

    public function deletePatient($id)
    {
        $this->db->query("DELETE FROM users WHERE id = :id ");
        $this->db->bind(':id', $id);

        return $this->db->execute();
    }
}
