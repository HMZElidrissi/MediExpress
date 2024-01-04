<?php
namespace App\Controllers;
use App\Models\PatientEnMagasin;
use App\Models\VenteEnLigne;
use App\Models\VenteEnMagasin;
use App\Models\Medicament;
use App\Controllers\ExportPDF;
use App\Controllers\htmlPDF;

class VenteController
{
   private $vent_enligne;
   private $vent_enmagasin;
   private $medicament;
   private $Patient_Enmagasin;
   private $PDF;
   private $htmlpdf;
   public function __construct()
   {
    $this->vent_enligne = new VenteEnLigne();
    $this->vent_enmagasin = new VenteEnMagasin();
    $this->medicament = new Medicament();
    $this->Patient_Enmagasin = new PatientEnMagasin();
    $this->PDF = new ExportPDF();
    $this->htmlpdf = new htmlPDF();
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
            $lastId = $this->Patient_Enmagasin->insertPatientEnmagain($name);
            $add_vente = $this->vent_enmagasin->insert_vente($Namemed , $quantity , $date , $lastId);

            if($add_vente && $lastId){
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
    public function export_pdf()
{
    if(isset($_POST['export_vente']))
    {
        extract($_POST);
        $html = $this->htmlpdf->htmlVENTE_pdf($id_vente,$username,$name, $quantity,$price, $sale_type,$date);
        $this->PDF->export_medicament($html);
    }
}
}