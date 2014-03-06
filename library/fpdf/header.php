<?php

function tabla($pdf, $titulo_tabla, $columna) {
 $pdf->SetFillColor(200,220,255);
    for ($i = 0; $i < count($titulo_tabla); $i++) {       
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell($columna[$i], 7, $titulo_tabla[$i] ,0,'LRTB','C',true);
    }
  $pdf->Ln();
}
function tabla_detalle($pdf, $titulo_detalle, $col) {
    for ($i = 0; $i < count($titulo_detalle); $i++) {
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell($col[$i], 7, $titulo_detalle[$i], 'LRTB', 0, 'C');
    }
    $pdf->Ln();
}

function tabla_detalle_cabecera($pdf, $titulo_detalle_cabecera, $col) {
    for ($i = 0; $i < count($titulo_detalle_cabecera); $i++) {
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell($col[$i], 7, $titulo_detalle_cabecera[$i], 'LRTB', 0, 'C');
    }
    $pdf->Ln();
}

function cabecera($pdf, $titulo) {
    $pdf->AddPage();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetY(10);
    $pdf->SetX(20);
  //  $pdf->MultiCell(0, 6, 'UNIVERSIDAD AUTONOMA JUAN MISAEL SARACHO', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, $titulo, 0, 'C', 0);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 6, "Fecha:" . date('d/m/Y'), 0, 'J', 0);
    $pdf->Ln();
    $w = array(50, 70, 70); //total sumados = 190
  
}

function cabecera2($pdf, $titulo,$nombre) {
    $pdf->AddPage();
    $pdf->SetFillColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->SetY(10);
    $pdf->SetX(20);
  //  $pdf->MultiCell(0, 6, 'UNIVERSIDAD AUTONOMA JUAN MISAEL SARACHO', 0, 'C', 0);
//    $pdf->MultiCell(0, 6, 'COLEGIO PARTICULAR MIXTO "BOLIVIA"', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, '', 0, 'C', 0);
    $pdf->MultiCell(0, 6, $titulo, 0, 'C', 0);
    $pdf->MultiCell(0, 6, $nombre, 0, 'C', 0);
    $pdf->Ln();
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->MultiCell(0, 6, "Fecha:" . date('d/m/Y'), 0, 'J', 0);
    $pdf->Ln();
    $w = array(50, 70, 70); //total sumados = 190
  
}
