<?php

namespace App\Models\User;

use Core\Database;
use App\Models\Patient;

class PatientEnMagasin extends Patient
{
    public function createPatientInMagasin($data)
    {
        return $this->createPatient($data);
    }

    public function getAllPatientsInMagasin()
    {
        return $this->getAllPatients();
    }

    public function getPatientInMagasinById($id)
    {
        return $this->getPatientById($id);
    }

    public function updatePatientInMagasin($id, $data)
    {
        return $this->updatePatient($id, $data);
    }

    public function deletePatientInMagasin($id)
    {
        return $this->deletePatient($id);
    }

   
}
