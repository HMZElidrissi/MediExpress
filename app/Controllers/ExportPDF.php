<?php
namespace App\Controllers;

use App\Models\Medicament;
use Dompdf\Dompdf;
require_once __DIR__ . '/../../vendor/autoload.php';
class ExportPDF
{
    public function export_medicament($html)
    {
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','landscape');
        $dompdf->render();
        $dompdf->stream('codexworld',array('Attachment'=>0));
 
}
}