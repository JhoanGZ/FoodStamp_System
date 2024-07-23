<?php
require('../logic/btnLogic/fpdf.php');

// Declaración de consultas;
$vaRut = $_GET['vaRut'];
$vaNom = $_GET['nom'];
$vaApe = $_GET['ape'];
$vaFna = $_GET['fna'];
$vaEbe = $_GET['ebe'];
$vaReg = $_GET['reg'];
$vaEma = $_GET['ema'];
$vaGbe = $_GET['gbe'];

// Hora;
date_default_timezone_set('America/Santiago');
$time = date('d-m-y h:i:s');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


// Encabezado;
$pdf->SetFont('Arial','B',16);
$pdf->Cell(5);
$pdf->Cell(65) ;$pdf->Cell(50,10,"DATOS DEL BENFICIARIO", 0, 0, 'C', 0); // Imprime la hora.
$pdf->Cell(65,30, " ", 0, 1);


// Cuerpo del PDF;
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25); $pdf->Cell(50,10,"RUT:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaRut", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"NOMBRE:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaNom", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"APELLIDO:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaApe", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"FNAC:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaFna", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"Edo. Benficio:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaEbe", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"REGION:", 1, 0, 'C', 0); $pdf->SetFont('Arial','B',10); $pdf->Cell(90,10, "$vaReg", 1, 1, 'C', 0); $pdf->SetFont('Arial','B',12);
$pdf->Cell(25); $pdf->Cell(50,10,"EMAIL:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaEma", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"GRUPO BENEFICIO:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaGbe", 1, 1, 'C', 0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(65,40, " ", 0, 1);
$pdf->Cell(65) ;$pdf->Cell(50,10,"$time", 0, 0, 'C', 0); // Imprime la hora.


// Ejecuta la generación del pdf;
$pdf->Output();
?>