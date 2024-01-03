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
        $this->db->query($sql);
        $results = $this->db->fetchAllRecords();
        return $results;     
    }
}