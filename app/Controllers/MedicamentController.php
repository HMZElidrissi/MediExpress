<?php
namespace App\Controllers;
use App\Models\Medicament;
class MedicamentController
{
public $medicament;

public function __construct()
{
    $this->medicament = new Medicament();
}
public function D_medicament()
{
    $d_medicament = $this->medicament->display_medicaments();
    $_SESSION['medicament'] = $d_medicament;
    require(__DIR__ .'../../../views/medicament_table.php');
}
public function A_medicament()
{
    if(isset($_POST['save_med']))
    {
        extract($_POST);
        $a_medicament = $this->medicament->add_medicaments($name, $description, $price, $quantity_in_stock);
        if($a_medicament)
        {
            header('location: medicament_table');
        }
    }
}
public function U_medicament()
{
    if(isset($_POST['update_med']))
    {
        extract($_POST);
        $u_medicament = $this->medicament->Update_medicaments($id, $name, $description, $price, $quantity_in_stock);
        if($u_medicament)
        {
            header('location: medicament_table');
        }
    }
}
public function delete_medicament()
{
    if(isset($_GET['id']))
    {
        $medicament_id = $_GET['id'];
        $delete_med = $this->medicament->delete_medicaments($medicament_id);
        if($delete_med)
        {
            header('location: medicament_table');
        }
    }
}
}