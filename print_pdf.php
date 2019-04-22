<?php

require './vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;


//Recoge el contenido de otro fichero

ob_start();
require_once('prueba3.php');

$html =ob_get_clean();
$html2pdf = new Html2Pdf('P','A4','es','true','UTF-8');
$html2pdf->pdf->SetTitle('My Pdf Visit');
$html2pdf->writeHTML($html);


	
$html2pdf->output('Visit.pdf');






?>