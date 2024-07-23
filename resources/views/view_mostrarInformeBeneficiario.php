<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informe Diario de Entrega</title>
        <link rel="stylesheet" href="../css/styleSheet.css">
        <?php include("../component/reloj.php"); include("../component/verificacionSesion.php");?>
    </head>
    <body>
        <center>
            <form action="" method="post">
                <table border="0">
                        <br><br>
                        <h1>Informe de Entregas a Beneficiarios</h1>
                        <br>
                        <p><em><strong>Seleccione los rangos de su busqueda</strong></em></p>
                        <br>
                        <tr style="text-align:center">
                            <td>Fecha Inicio</td>
                            <td>Fecha Final</td>
                            <td>Hora Inicio</td> 
                            <td>Hora Final</td>
                        </tr>
                        <tr>
                            <td><input type="date" name="fechaIni"></td>
                            <td><input type="date" name="fechaFin"></td>
                            <td><input type="time" name="horaIni"></td> 
                            <td><input type="time" name="horaFin"></td>
                        </tr>
                        <tr>
                            <td>Orden del Apellido</td>
                            <td style="text-align:center"><label >Ascendente</label><input type="radio" name="ordenBusqueda" value="ASC" checked></td>
                            <td style="text-align:center"><label>Descendente</label><input type="radio" name="ordenBusqueda" value="DESC"></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Estado Beneficiario</td>
                            <td style="text-align:center"><label>Activo</label><input type="radio" name="estadoBeneficio" value="ACTIVO" checked></td>
                            <td style="text-align:center"><label>Inactivo</label><input type="radio" name="estadoBeneficio" value="INACTIVO"></td>
                            <td></td>
                        </tr>
                </table>
                <br><br>
                <button type="submit" name="btnBuscar" value="Buscar">Buscar</button>
            </form>
            <br>
            <form method="POST">
                <?php 
                    include("../logic/btnLogic/bntLogic_MostrarInformeBeneficiario.php"); 
                    ?>
            </form>
            <form method="POST" action="http://localhost/sebad/resources/views/metrics.php">
                <br><br><br>
                <button type="submit" name="btnVolver" value="Volver">Volver</button>
            </form>

        </center>
    </body>
</html>