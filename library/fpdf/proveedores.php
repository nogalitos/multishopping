<?php
require('fpdf.php');
////////////////proveedores/////////////////////////////
$pdf = new PDF();
$pdf->Open();
$pdf->AddPage();

//Nombre del Listado
$pdf->SetFillColor(255, 255, 255);
$pdf->SetFont('Arial', 'B', 16);
$pdf->SetY(10);
$pdf->SetX(20);
$pdf->MultiCell(0, 6, "nombre de la institucion ", 0, C, 0);
$pdf->MultiCell(0, 6, "Listado de Clientes", 0, C, 0);
/////////////////////////////
$pdf->SetX(-350);
$pdf->SetFont('Arial', 'B', 12);
$pdf->MultiCell(0, 6, "Fecha:".  date('d/m/Y'), 0, C, 0);
$pdf->SetX(-350);
//$nombre_usuario =  Zend_Auth::getInstance()->getStorage()->read()->nombre;
//$pdf->MultiCell(0, 6, "Ususrio:". $nombre_usuario, 0, C, 0);
//////////////////////////////////////////////////////////
$pdf->Ln();

//Restauraci0n de colores y fuentes
$pdf->SetFillColor(200, 200, 200);
$pdf->SetTextColor(0);
$pdf->SetFont('Arial', 'B', 7);

//////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
//Ttulos de las columnas
$header = array('Cedula', 'nombre', 'apellido');

//Cabecera
$w = array(50,70, 70); //total sumados = 190
for ($i = 0; $i < count($header); $i++)

    $pdf->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 8);