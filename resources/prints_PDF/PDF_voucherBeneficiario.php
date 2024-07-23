<?php
require('../logic/btnLogic/fpdf.php');

//Declaración de consultas;
if (isset($_POST['cod'])) {
    $vaCod = $_POST['cod'];
    $vaRut = $_POST['rut'];
    $vaNom = $_POST['nom'];
    $vaApe = $_POST['ape'];
    $vaHin = $_POST['hin'];
    $vaHfi = $_POST['hfi'];
}else{
    $vaCod = "NULL";
    $vaRut = "NULL";
    $vaNom = "NULL";
    $vaApe = "NULL";
    $vaHin = "NULL";
    $vaHfi = "NULL";
};

// Hora;
date_default_timezone_set('America/Santiago');
$time = date('d-m-y h:i:s');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);


// Encabezado;
$pdf->SetFont('Arial','B',16);
$pdf->Cell(5);
$pdf->Cell(65) ;$pdf->Cell(40,10,"VOUCHER DE INGRESO", 0, 0, 'C', 0); // Imprime la hora.
$pdf->Cell(65,30, " ", 0, 1);


// Cuerpo del PDF;
$pdf->SetFont('Arial','B',12);
$pdf->Cell(25); $pdf->Cell(50,10,"COD. ENTRADA:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaCod", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"RUT:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaRut", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"NOMBRE:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaNom", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"APELLIDO:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaApe", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"HORA INICIO:", 1, 0, 'C', 0); $pdf->Cell(90,10, "$vaHin", 1, 1, 'C', 0);
$pdf->Cell(25); $pdf->Cell(50,10,"HORA FIN:", 1, 0, 'C', 0); $pdf->SetFont('Arial','B',12); $pdf->Cell(90,10, "$vaHfi", 1, 1, 'C', 0); $pdf->SetFont('Arial','B',12);

if ($vaCod == "NULL"){
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(0, 20, "", 0, 1);
    $pdf->Cell(180, 10, "||DATOS NO OBTENIDOS||", 0, 1, 'C', 0);
};

$pdf->SetFont('Arial','B',10);
$pdf->Cell(65,40, " ", 0, 1);
$pdf->Cell(65) ;$pdf->Cell(50,10,"$time", 0, 0, 'C', 0); // Imprime la hora.


// Ejecuta la generación del pdf;
$pdf->Output();
?>