<?php

namespace App\Models;

use Core\Database;
 class User
{
    protected $db;
  
    public function __construct() {
        $this->db = Database::getInstance();
    }

    // public function getUserById($id)
  
}
