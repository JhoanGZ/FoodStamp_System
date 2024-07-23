<?php

    require("nexus.php");
    include("auxFunctions.php");
    $cnn = conectar();

    if(isset($_POST['btnBuscar'])){
        if((!empty($_POST['txtRut'])) && (!empty($_POST['txtDigito']))){
            $dv = $_POST['txtDigito'];
            $digito = verificarRut($_POST['txtRut']);
            
            if($dv == $digito){
                
                $vaRut = $_POST['txtRut']."-".$dv;                 
                $sql = "SELECT * FROM `BENEFICIARIO` WHERE `Rut` ='$vaRut'";
                $rs = mysqli_query($cnn,$sql);

                if(mysqli_num_rows($rs)==0){printAlert("Rut no registrado");}
                    
                    while($row = mysqli_fetch_array($rs)){
                        
                        if($row[4]== 0){$row[4]="Sin beneficio";} else {$row[4]="Con beneficio";}
                    
                        echo "<br><br><div align='center'>";
                        echo "<table>";
                        echo "<center><br><br>";
                        echo "<b>DATOS DE CLIENTE ENCONTRADOS</b><br><br><br>";
                        echo "<tr><td><b>Rut&nbsp;</b></td><td>$row[0]</td></tr>";
                        echo "<tr><td><b>Nombre&nbsp;</b></td><td>$row[1]</td></tr>";
                        echo "<tr><td><b>Apellido&nbsp;</b></td><td>$row[2]</td></tr>";
                        echo "<tr><td><b>Fecha de Nacimiento&nbsp;</b></td><td>$row[3]</td></tr>";
                        echo "<tr><td><b>Estado de beneficio&nbsp;</b></td><td>$row[4]</td></tr>";
                        echo "<tr><td><b>Región/Ciudad&nbsp;</b></td><td>$row[5]</td></tr>";
                        echo "<tr><td><b>Email&nbsp;</b></td><td>$row[6]</td></tr>";
                        echo "<tr><td><b>Grupo Beneficio&nbsp;</b></td><td>$row[7]</td></tr>";
                        echo "</center>";
                        echo "</table>";
                        echo "</div><br><br>";

                        echo "<div align='center' id='linea1'>_________________________________________________</div>";
                        echo "<div align='center' id='pdflink'><a href='http://localhost/sebad/resources/prints_PDF/PDF_consultarBeneficiario.php?vaRut=$vaRut&nom=$row[1]&ape=$row[2]&fna=$row[3]&ebe=$row[4]&reg=$row[5]&ema=$row[6]&gbe=$row[7]' target='blank'><img src='http://localhost/sebad/resources/css/pdf_icon.png' alt='Imagen Enlace PDF' width='100px' height='125px'></a></div>";
                        echo "<div align='center' id='linea1'>_________________________________________________</div>";
                    } 
            } elseif($dv != $digito){ return printAlert("El Rut fue ingresado erroneamente, favor verificar y reintente.");}

        }else{ return printAlert("Error: Rut no ingresado");}
    }
?>
    <a href="../../prints_PDF/"></a>