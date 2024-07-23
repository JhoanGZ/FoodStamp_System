<?php // http://localhost/sebad/resources/views/userMenu.php
error_reporting(0);
include("../logic/btnLogic/btnLogic_menu.php");
include("../logic/auxFunctions.php");
?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Menú | SEBAD</title>
        <link rel="stylesheet" href="../css/styleSheet.css">
        <?php include("../component/reloj.php");include("../component/verificacionSesion.php"); //Invoca el reloj;?>
    </head>
    <body>
        <center>
            <h1>Menú de Control</h1>
            <br><br>
            <form action="" method="post">
                <button type="submit" name="btnAdnBeneficiarios" value=">>">Beneficiarios</button>
                <br><br><br>
                <button type="submit" name="btnAdmGrupoBeneficiarios" value=">>">Grupos de Beneficiarios</button>
                <br><br><br>
                <button type="submit" name="btnAdmBloqueHorario" value=">>">Bloque Horarios</button>
                <br><br><br><br>
            </form>
            <form method="post">
                <p><button type="submit" name="btnVolver" value="Volver">Volver</button></p>
            </form>
        </center>
    </body>
</html>