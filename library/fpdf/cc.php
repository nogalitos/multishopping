<?php
require('fpdf.php');
$pdf = new PDF();
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