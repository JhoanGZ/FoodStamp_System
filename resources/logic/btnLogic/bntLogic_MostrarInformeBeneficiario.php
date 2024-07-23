<?php
    error_reporting(0);
    include ("nexus.php");
    include ("auxFunctions.php");
    $fechaInicio = $_POST['fechaIni'];
    $horaInicio = $_POST['horaIni'];
    $fechaFin = $_POST['fechaFin'];
    $horaFin = $_POST['horaFin'];
    $contadorResultado = 0;
    $ordenBusqueda = $_POST['ordenBusqueda'];
    $estadoBeneficiario = $_POST['estadoBeneficio'];
    
    
    if(isset($_POST['btnBuscar'])){
        if(empty($fechaInicio)){  $fechaInicio = '1980-01-01';}
        if(empty($fechaFin)){  $fechaFin = '2100-01-01';}
        if(empty($horaInicio)){  $horaInicio = '00:00:00';}
        if(empty($horaFin)){  $horaFin ='23:59:59';}
       
        $cnn = Conectar();
        $sql = "SELECT 
                re.CodEntrega, be.Rut, be.Nombre, be.Apellido, eb.Descripcion, re.HoraDeEntrega, re.FechaDeEntrega, be.GrupoBeneficio 
                FROM registroentregacolacion re, beneficiario be, estadoBeneficio eb 
                WHERE (re.IdGrupo = be.GrupoBeneficio) AND (eb.IdEstadoBeneficio = be.IdEstadoBeneficio) AND (re.HoraDeEntrega BETWEEN '$horaInicio' AND '$horaFin') AND (re.FechaDeEntrega BETWEEN '$fechaInicio' AND '$fechaFin') AND (eb.Descripcion LIKE '$estadoBeneficiario') GROUP BY re.CodEntrega ORDER BY be.Apellido $ordenBusqueda;";
                
        $get = mysqli_query($cnn, $sql);
        
        if($row = mysqli_fetch_array($get)){
            
            echo "<table border='1'>";
            echo "<tr>";
                echo "<td><center><b>Código Entrega</b></center></td>";
                echo "<td><center><b>Rut</b></center></td>";
                echo "<td><center><b>Nombre</b></center></td>";
                echo "<td><center><b>Apellido</b></center></td>";
                echo "<td><center><b>Estado Beneficio</b></center></td>";
                echo "<td><center><b>Hora de Entrega</b></center></td>";
                echo "<td><center><b>Fecha de Entrega</b></center></td>";
                echo "<td><center><b>Grupo Beneficio</b></center></td>";
            echo "</tr>";
            
            while($row = mysqli_fetch_array($get)){
                $contadorResultado++;
                echo "<tr>";
                    echo "<td>$row[0]</td>";
                    echo "<td>$row[1]</td>";
                    echo "<td>$row[2]</td>";
                    echo "<td>$row[3]</td>";
                    echo "<td>$row[4]</td>";
                    echo "<td>$row[5]</td>";
                    echo "<td>$row[6]</td>";
                    echo "<td>$row[7]</td>";
                echo "</tr>";
            }
            echo"   <br>
                    <center><caption>
                        <b>|| $horaInicio <---> $horaFin ||</b><br>
                        <b>|| $fechaInicio <---> $fechaFin ||</b><br><br>
                        <b>Resultados: $contadorResultado</b>
                    </caption></center>
                ";
                echo "</table>";
        } else {
            echo "<br><br>";
            echo "<center><h2><em>¡No se encontraron resultados!</em></h2>";
        }
    }
    
?>
