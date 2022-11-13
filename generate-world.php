<?php
require __DIR__ ."/vendor/autoload.php";
use Fpdf\Fpdf;

$csv_file = 'worldpopulation.csv';
$handle = fopen($csv_file, 'r');
// $row_data = fgetcsv($handle, 1000, ',');
$row_index = 0;
$headers = [];
$data = [];

// if(($handle = fopen("worldpopulation.csv", "r"))!== FALSE)
// {

while (($row_data = fgetcsv($handle, 1000, ','))!==FALSE)
{
    if ($row_index ++ <1)
    {
        foreach ($row_data as $col)
        {
            array_push($headers, $col);
        }
        continue;
    }

    $tmp = [];
    for ($index = 0; $index < count($headers); $index++)
    {
        $tmp[$headers[$index]] = $row_data[$index];
    }
    array_push($data, $tmp);
}

fclose($handle);
// }

// echo "<pre>";
// //To display array data
// var_dump($data);
// echo "</pre>";

class PDF extends FPDF
{
// Load data
function LoadData($csv_file)
{
    // Read file lines
    $lines = file($csv_file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(',',trim($line));
    return $data;
}

function BasicTable($headers, $data)
{
    // Headers
    foreach($headers as $col)
        $this->Cell(60,10,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(60,8,$col,1);
        $this->Ln();
    }

}
}
$pdf = new PDF();
// Column headings
$headers = array('#','Country', 'Population');
// Data loading
$data = $pdf->LoadData('worldpopulation.csv');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($headers,$data);
$pdf->Output();
?>