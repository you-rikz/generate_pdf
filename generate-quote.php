<?php
require __DIR__ ."/vendor/autoload.php";
use Fpdf\Fpdf;


$pdf = new FPDF();
$pdf->AddFont('Jokerman','','Jokerman.php');
$pdf->AddPage();
$pdf->SetFont('Jokerman','',25);
$pdf->Write(15,'The future belongs to those who believe in the beauty of their dreams. - Shoyo Hinata');
$pdf->Ln(20,0,0);
$pdf->AddFont('alienleague','','alienleague.php');
// $pdf->AddPage();
$pdf->SetFont('alienleague','',40);
$pdf->Write(15,'Its not your place to give up. - Yuu Nishinoya');
$pdf->Output();
?>
