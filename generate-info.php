<?php

require __DIR__ ."/vendor/autoload.php";

use Fpdf\Fpdf;

$pdf = new FPDF('P','mm','A4');

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf ->SetFont('Arial','B',12);
$pdf->Cell(60,20,'Name: Arnold Nicholas P. Lim');
$pdf->Ln();
$pdf->Cell(60,0,'Program: BSIT');
$pdf->Ln();
$pdf->Cell(60,20,'Email: lim.arnoldnicholas@auf.edu.ph');
$pdf->Ln();
$pdf->Cell(60,0,'Address: Mexico Pampanga');
$pdf->Ln();
$pdf->Cell(60,20,'Student Number: 20-0813-704');

$pdf->Output();




