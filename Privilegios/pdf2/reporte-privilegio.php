<?php

include '../../Include/db_connect.php';

require_once 'autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

// meto todo el php de fac_internaiconal en la variable $html
ob_start();
require_once 'formatoPDF.php';
$html = ob_get_clean();

$html2pdf = new Html2Pdf('L',array(350,315), 'es', 'true', 'UTF-8');
$html2pdf->writeHTML($html);
$html2pdf->output('cuadros.pdf');