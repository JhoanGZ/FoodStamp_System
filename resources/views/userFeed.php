<?php // http://localhost/sebad/resources/views/userFeed.php
    include("../logic/btnLogic/btnLogic_userFeed.php");
?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Feed | SEBAD</title>
        <link rel="stylesheet" href="../css/styleSheet.css">
        <?php include("../component/reloj.php");include("../component/verificacionSesion.php"); //Invoca el reloj;?>
    </head>
    <body>
        <center>
            <br><br>
            <p><b><em>Seleccione a donde desea ingresar</em></b></p>
            <br><br>
            <form action="" method="post">
                <button type="submit" name="btnMetricas" value=">>">INFORMES SEBAD</button>
                <br><br><br>
                <button type="submit" name="btnUserMenu" value=">>">ADMINISTRAR</button>
                <br><br><br><br>
                <p><button type="submit" name="btnCerrarSesion" value="Cerrar sesión">Cerrar</button></p>
            </form>
        </center>    
    </body>
</html>