<?php

namespace App\Models;

use App\Models\Vente;
class VenteEnLigne extends Vente
{
    public function __construct()
    {
        parent::__construct();
    }
    public function getAllVent()
    {
        $sql = "SELECT * FROM sales INNER JOIN users ON sales.patient_id = users.id INNER JOIN medicaments ON sales.medicament_id = medicaments.id WHERE sale_type = 'En Ligne'";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAllRecords();
        return $result;
    }
}