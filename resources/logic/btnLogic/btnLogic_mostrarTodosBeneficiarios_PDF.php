<?php
error_reporting(0);
include("auxFunctions.php");
include("nexus.php");

$strContadorResultado = 0;

if(isset($_POST["btnBuscarTodo"])){
    $cnn = Conectar();
    $sql = "SELECT * FROM `BENEFICIARIO`;";

    $sqlTableVault = array(); // Declaración del array que pasaré por GET;
    
    $get = mysqli_query($cnn, $sql);
    echo 
    "
    <table border='2'>
    <tr>
        <td><center><b>RUT</b></center></td>
        <td><center><b>NOMBRE</b></center></td>
        <td><center><b>APELLIDO</b></center></td>
        <td><center><b>FNAC</b></center></td>
        <td><center><b>EDO. BENEFICIO</b></center></td>
        <td><center><b>REGION/DIRECCIÓN</b></center></td>
        <td><center><b>EMAIL</b></center></td>
        <td><center><b>GRUPO BENEFICIO</b></center></td>
    </tr>
    ";
    while($row = mysqli_fetch_array($get)){
        $strContadorResultado++;

        $tempRow = array();
        for($i = 0; $i < count($row);){
            array_push($tempRow, $row[$i]);
            $i++;
        };

        array_push($sqlTableVault, $tempRow);

        echo 
        "
        <tr>
            <td>$row[0]</td>
            <td>$row[1]</td>
            <td>$row[2]</td>
            <td>$row[3]</td>
            <td>$row[4]</td>
            <td>$row[5]</td>
            <td>$row[6]</td>
            <td>$row[7]</td>
        </tr>
        ";
    };
    $sqlTableVault = serialize($sqlTableVault);
    $sqlTableVault = urlencode($sqlTableVault);

    echo 
    "
        <center><br><caption>
            <b>|| LISTADO COMPLETO ||</b><br><br>
            <b>Resultados Encontrados: $strContadorResultado</b>
            <br><br><br>
        </caption></center>
        </table>
    ";
    // echo "<div align='center' id='pdflink'><a href='http://localhost/sebad/resources/prints_PDF/PDF_mostrarTodosBeneficiarios.php?sqlTableVault=$sqlTableVault' id='' target='blank'><img src='http://localhost/sebad/resources/css/pdf_icon.png' alt='Imagen Enlace PDF' width='100px' height='125px'></a></div>";
};

if(isset($_POST["btnBuscarTodo"])){
    echo 
    "
    <br><br><div align='center' id='linea1'>_________________________________________________</div>
        <input type='hidden' name='querySQL' value='$sqlTableVault'>
        <br><button type='submit' name='go'><img src='http://localhost/sebad/resources/css/pdf_icon.png' alt='Imagen Enlace PDF' width='70px' height='70px'></button>  
    <div align='center' id='linea1'>_________________________________________________</div>
    ";
};

?>