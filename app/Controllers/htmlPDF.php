<?php

namespace App\Controllers;

class htmlPDF
{
    // HTML pdf tout les medicament 
    public function html_pdf($All_medicament , $countMed)
    {
        $html = "<h1>Admin Anass!</h1>
                    <h2>MediExpress</h2>
                    <h2>Les medicaments</h2>
                    <table style='width:100% ; border-collapse:collapse;'>
                        <tr>
                            <th style='border:1px solid #ddd; padding:8px; text-align:left;'> Name</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Description</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Price</th>
                            <th style='border:1px solid #ddd; padding: 8px; text-align:left;'>Quantity</th>
                        </tr>";

        foreach ($All_medicament as $data) {
            $html .= "<tr>
                        <td style='border:1px solid #ddd; padding:8px; text-align:left;'>" . $data->name . "</td>
                        <td style='border:1px solid #ddd; padding: 8px; text-align:left;'>" . $data->description . "</td>
                        <td style= 'border:1px solid #ddd; padding:8px; text-align:left;'>" . $data->price . "</td>
                        <td style= 'border:1px solid #ddd; padding:8px; text-align:left;'>" . $data->quantity_in_stock . "</td>
                    </tr>";
        }

        $html .= "</table>";
        $html .= "
        <div style='display: flex; width: 100%'>
        <h2 style='font-size: 1.5em; margin-bottom: 10px;'>Total Medicaments: " . $countMed . "</h2>
        
        </div>
        ";


        return $html;
    }
    // HTML pdf chaque vente en magasin
    public function htmlVENTE_pdf($id_vente,$username,$name, $quantity,$price, $sale_type,$date)
    {
        $html = "
        <div style='font-family: Arial, sans-serif; padding: 20px; text-align: start;'>
        <h1 style='font-size: 36px; margin-bottom: 10px;'>Hello My Admin!</h1>
        <h2 style='font-size: 24px; margin: 10px 0;'>MediExpress</h2>
        <h2 style='font-size: 24px; margin: 10px 0;'>Vente En Magasin</h2>
        <h2 style='font-size: 24px; margin: 10px 0;'>ID Vente : " . $id_vente . "</h2>
        <h3 style='font-size: 20px; margin: 7px 0;'>Name Patient : " . $username. "</h3>
        <h3 style='font-size: 20px; margin: 7px 0;'>Name Medicament : " . $name . "</h3>
        <h3 style='font-size: 20px; margin: 7px 0;'>Quantity : " . $quantity . "</h3>
        <h3 style='font-size: 20px; margin: 7px 0;'>Price Medicament : " . $price . "</h3>
        <h3 style='font-size: 20px; margin: 7px 0;'>Vente Type : " . $sale_type . "</h3>
        <h3 style='font-size: 20px; margin: 7px 0;'>Date de Vente : " . $date . "</h3>
        </div>
            ";
return $html;
    }
}
