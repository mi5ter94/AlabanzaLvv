<?php

require_once 'autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
$html2pdf->writeHTML('<h1>Hola mundo</h1>');
$html2pdf->output();
