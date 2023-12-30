<?php
namespace App\Controllers;
use App\Models\VenteEnLigne;
use App\Models\VenteEnMagasin;
use App\Models\Medicament;

class VenteController
{
   private $vent_enligne;
   private $vent_enmagasin;
   private $medicament;
   public function __construct()
   {
    $this->vent_enligne = new VenteEnLigne();
    $this->vent_enmagasin = new VenteEnMagasin();
    $this->medicament = new Medicament();
   }
   public function Display_VentEnligne()
    {
        $d_vent = $this->vent_enligne->getAllVent();
        require(__DIR__ .'../../../views/VenteEnlign.php');
    }
    public function display_ventEnmagasin()
    {
        $d_vent = $this->vent_enmagasin->getAllVent();
        $d_medicament = $this->medicament->display_medicaments();
        require(__DIR__ .'../../../views/VenteEnMagasin.php');

    }
    public function Add_Vent()
    {
        if(isset($_POST['save_vente']))
        {
            extract($_POST);
            $add_vente = $this->vent_enmagasin->insert_vente($Namemed , $quantity , $date);
            if($add_vente){
                header('location: VenteEnmagasin');
            }
        }
        
    }
    public function update_vente()
    {
        if(isset($_POST['update_vente']))
        {
            extract($_POST);
            $update = $this->vent_enmagasin->Update_vente($Namemed , $quantity , $date , $id_vente);
            if($update)
            {
               
                header('location: VenteEnmagasin');
            }

        }
    }
}