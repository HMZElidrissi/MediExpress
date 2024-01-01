<?php

namespace App\Controllers;

class htmlPDF
{
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
}
