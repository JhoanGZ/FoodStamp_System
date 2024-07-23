<?php
require('../logic/btnLogic/fpdf.php'); //libería requerida;

// Declaración de consultas;
// $vaArray = $_GET['sqlTableVault'];
if(isset($_POST['querySQL'])){
    $vaArray = $_POST['querySQL'];
    $vaArray = urldecode($vaArray);
    $vaArray = unserialize($vaArray);
    $contadorResultado = count($vaArray);
}else{
    $vaArray = [["null", "null", "null", "null", "null", "null", "null", "null"]];
    $contadorResultado = 0;
};

// Variables de control del pdf;
$generarBorde = 1; // 1 = genera bordes || 0 = no genera bordes;
$fontSizeNormal = 7; // al invocarla define el tamañod e la fuente igual a 7;
$fontSizeMedio = 5; // define el tamaño de fuentes reducidas por longitud de cadenas largas;
$fontSizeSmall = 4; // define el tamaño de fuentes reducidas por longitud de cadenas muy largas;
$anchoCelda = 22; // a mayor valor más ancho se imprime cada celda;
$altoCelda = 8; // A mayor valor mayor longitud vertical tiene la celda;
$margenIzqToDer = 50; // Corrige el margen de izquierda a derecha, a mayor valor más se desplaza a la derecha. OJO SKYNET IS WORKING
$longitudArray = (count($vaArray[0]) / 2); // debe ser igual a la cantidad de columnas que mostrará, partiendo desde el '0' por índice 0.
$newPageCount = 17; // Define la cantidad de filas que se imprimirá por cada hoja antes de generar una hoja nueva.
$pageCount = ceil(floatval($contadorResultado / $newPageCount)); // calcula el total de hojas que serán generadas.


// Hora;
date_default_timezone_set('America/Santiago');
$time = date('d-m-y h:i:s');

// Creando el objeto pdf;
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

// Encabezado;
$pdf->SetFont('Arial','B',16);
$pdf->Cell(5);
$pdf->Cell(65) ;$pdf->Cell(50,10,"DATOS DE TODOS LOS USUARIOS", 0, 0, 'C', 0); // Imprime la hora.
$pdf->Cell(65,30, " ", 0, 1);
// Fin del encabezado;




// Cuerpo del PDF;
$pdf->SetFont('Arial','B',11);
$pdf->Cell(80);
$pdf->Cell($anchoCelda, $altoCelda, "|| Resultados de la busqueda: ($contadorResultado) ||", 0, 1, 'C', 0);

$pdf->SetFont('Arial','B',8);
$pdf->Cell($anchoCelda, $altoCelda, "RUT", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda,  "NOMBRE", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "APELLIDO", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "FNAC", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "EDO. BENEF.", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "REGION/DIR", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "EMAIL", 1, 0, 'C', 0);
$pdf->Cell($anchoCelda, $altoCelda, "GRUPO BENEF.", 1, 1, 'C', 0);

//
for($i = 0; $i < count($vaArray);){
    if($i > $newPageCount){ $newPageCount*= 2; $pdf->AddPage();};
    for($ii = 0; $ii < $longitudArray;){

        $showData = $vaArray[$i][$ii];
        if(strlen($showData) >12){ $pdf->SetFont('Arial','B',$fontSizeMedio);}else{$pdf->SetFont('Arial','B',$fontSizeNormal);};
        if(strlen($showData) >14){ $showData = substr($showData, 0, 16).".."; $pdf->SetFont('Arial','B',$fontSizeSmall);}else{$pdf->SetFont('Arial','B',$fontSizeNormal);};
        if($ii == ($longitudArray - 1)){ $saltoDeLinea = 1;}else{$saltoDeLinea = 0;};
        $pdf->Cell($anchoCelda, $altoCelda, "$showData", $generarBorde, $saltoDeLinea, 'C', 0);
        $ii++;
    };
    $i++;
    
    if($i > $newPageCount || $i == count($vaArray)){
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(65,25, " ", 0, 1);
        $pdf->Cell(5) ;$pdf->Cell(65) ;$pdf->Cell(50,10,"$time", 0, 1, 'C', 0); // Imprime la hora.
        $pdf->Cell(0,5,'Pag '.$pdf->PageNo().'/'.$pageCount,0,0,'C');
    };
};

if ($vaArray[0][0] == "null"){
    $pdf->SetFont('Arial','B',15);
    $pdf->Cell(80,20);
    $pdf->Cell($anchoCelda, $altoCelda, "||DATOS NO OBTENIDOS||", 0, 1, 'C', 0);
};

$pdf->Output();
?>