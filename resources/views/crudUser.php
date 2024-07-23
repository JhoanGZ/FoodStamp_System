<?php // http://localhost/sebad/resources/views/crudUser.php
    error_reporting(0);
    include("../logic/btnLogic/btnLogic_crudUser.php");
?>

<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Totem Beneficiario</title>
    <link rel="stylesheet" href="../css/styleSheetTotem.css">
    <?php include("../component/reloj.php"); include("../component/validarLetrasNumeros.php");?>
</head>
<body>
    <form class="totem" action="crudVoucher.php" method="POST">
        <center>
            <div id="headerTable">
                <h1><p>¡BIENVENIDO!</p></h1>
                <h2><p>Porfavor, identifíquese.</p></h2>
            </div>
            <div id="bodyTable">
                <table border="0">
                    <div class="theader">
                        <tr>
                            <td><b><em>Si tiene problemas con su huella digite su RUT</em></b></td>
                        </tr>
                    </div>
                    <br><br>
                    <div>
                        <td><input type="text" name="rut" value="" size="9" onkeypress="ValidaSoloNumeros()" placeholder="Su Rut sin DV">
                        <input type="text" name="dv" value="" size="1" placeholder="DV"></td>
                        
                    </div>
                    <div>
                        <td><button type="submit" name="btnBuscar" value="Buscar">Buscar</button></td>
                    </div>
                </table>
            </div>
            <br><br>
            <div class="huella">
                <img src="../css/huella2.png" width="110px" >
            </div>
        </form>
<body>
<footer>
    <br><br>
    <div id="boton">
        <button type="submit" name="volver" value="Volver">Volver</button>
    </div>
</footer>
</html>