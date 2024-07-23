<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe Beneficiario</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php 
        include("../component/reloj.php"); 
        include("../component/verificacionSesion.php");
        include("../component/validarLetrasNumeros.php");
    ?>
</head>

<body>
    <form method="POST">
        
        <center>
        <br>
        <h1>Informe de Beneficiario</h1>
        
        <table border="0">
        <tr>
            <td>Ingrese el Rut</td>
            <td><input type="text" name="txtRut" size="18" value="" placeholder="Ingrese su Rut" onkeypress="ValidaSoloNumeros()"></td>
            <td><input type="text" name="txtDigito" value="" size="1" placeholder="DV"></td>
            <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="btnBuscar" value="Buscar">Buscar</button></td>
            <?php include("../logic/btnLogic/btnLogic_consultarBeneficiario_PDF.php"); ?>
        </tr>
        </table>
        <br>
        <button type="submit" name="btnVolver" value="Volver">Volver</button>
        <?php 
            if(isset($_POST['btnVolver'])){
                session_start();
                if($_SESSION['cargo']=="ADMINISTRADOR"){
                    header("location: http://localhost/sebad/resources/views/metrics.php");
                }elseif($_SESSION['cargo']=="FUNCIONARIO"){
                    header("location: http://localhost/sebad/resources/views/metrics.php");
                }
            }
        ?>
        </center>

    </form>
</body>
</html>