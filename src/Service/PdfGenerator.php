<?php

namespace App\Service;

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfGenerator
{
    public function generatePdf($html)
    {
        // Configure Dompdf 
        $options = new Options();
        $options->set('defaultFont', 'Arial');

        // Instancie Dompdf avec les options
        $dompdf = new Dompdf($options);

        // Charge du HTML dans Dompdf
        $dompdf->loadHtml($html);

        // Rendre le PDF (cela génère également le PDF)
        $dompdf->render();

        // Retourne le PDF généré comme une chaîne
        return $dompdf->output();
    }
}
