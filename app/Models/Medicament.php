<?php
namespace App\Models;
use Core\Database;

class Medicament{

    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
    public function display_medicaments()
    {
        $sql = "SELECT * FROM medicaments";
        $stmt = $this->db->query($sql);
        $result = $stmt->fetchAllRecords();
        return $result;     
    }
    public function add_medicaments($name, $description, $price, $quantity_in_stock)
    {
        $sql = "INSERT INTO `medicaments`(`name`, `description`, `price`, `quantity_in_stock`) 
                VALUES (:name, :description, :price, :quantity_in_stock)";

        $stmt = $this->db->query($sql);
        $this->db->bind(':name' , $name);
        $this->db->bind(':description' , $description);
        $this->db->bind(':price' , $price);
        $this->db->bind(':quantity_in_stock' , $quantity_in_stock);
        return $stmt->execute();
    }
    public function Update_medicaments($id, $name, $description, $price, $quantity_in_stock)
    {
       
        $sql = "UPDATE medicaments SET 
        `name` = :name,
        `description` = :description,
        `price` = :price,
        `quantity_in_stock` = :quantity_in_stock WHERE id = :id";

        $stmt = $this->db->query($sql);
        $this->db->bind(':id' , $id);
        $this->db->bind(':name' , $name);
        $this->db->bind(':description' , $description);
        $this->db->bind(':price' , $price);
        $this->db->bind(':quantity_in_stock' , $quantity_in_stock);
        return $stmt->execute();
    }
    public function delete_medicaments($medicament_id)
    {
        $sql = "DELETE FROM medicaments WHERE id = :medicament_id";
        $stmt = $this->db->query($sql);
        $this->db->bind(':medicament_id' , $medicament_id);
        return $stmt->execute();
    }
}