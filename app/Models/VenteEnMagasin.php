<?php

namespace App\Models;

use Core\Database;

class VenteEnMagasin extends Vente
{
public function __construct()
{
    parent::__construct();
}
public function getAllVent()
{
    $sql = "SELECT * FROM sales INNER JOIN users ON sales.patient_id = users.id INNER JOIN medicaments ON sales.medicament_id = medicaments.id WHERE sale_type = 'En Magasin'";
    $stmt = $this->db->query($sql);
    $result = $stmt->fetchAllRecords();
    return $result;
}
public function insert_vente($Namemed , $quantity , $date , $lastId)
{
    $sql ="INSERT INTO `sales`(`date`, `patient_id`, `medicament_id`, `quantity`, `sale_type`) VALUES (:date , :patient , :medicament, :quantity , :sale_type)";
    $stmt = $this->db->query($sql);
    $this->db->bind(':date' , $date);
    $this->db->bind(':patient' , $lastId);
    $this->db->bind(':medicament' , $Namemed);
    $this->db->bind(':quantity' , $quantity);
    $this->db->bind(':sale_type' , 'En Magasin');
    return $stmt->execute();
}
public function Update_vente($Namemed , $quantity , $date , $id_vente)
{

    $sql = "UPDATE `sales` SET 
    `date`= :date,
    `medicament_id`= :medicament,
    `quantity`= :quantity WHERE id_vente = :id";
    $stmt = $this->db->query($sql);
    $this->db->bind(':date' , $date);
    $this->db->bind(':medicament' , $Namemed);
    $this->db->bind(':quantity' , $quantity);
    $this->db->bind(':id' , $id_vente);
    return $stmt->execute();
}


}