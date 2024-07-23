<?php // http://localhost/sebad/resources/views/metrics.php
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Informes | SEBAD</title>
        <link rel="stylesheet" href="../css/styleSheet.css">
        <?php include("../component/reloj.php");include("../component/verificacionSesion.php"); //Invoca el reloj;?>
    </head>    
    <center>
        <form method="POST">
            <body>
                <h1>Generador de Informes</h1>
                <br><br>
                <button type="button" onclick="location.href='../views/view_consultarBeneficiario_PDF.php';">Beneficiario</button>
                <br><br><br><br>        
                <button type="button" onclick="location.href='../views/view_mostrarTodosBeneficiarios_PDF.php';">General de Beneficiarios</button>
                <br><br><br><br>        
                <button type="button" onclick="location.href='../views/view_mostrarInformeBeneficiario.php';">Beneficios Entregados</button>
                <br><br><br><br>      
                <br><br><button type="submit" name="btnVolver" value="Volver">Volver</button>
                <?php 
                    if(isset($_POST['btnVolver'])){
                        session_start();
                        if($_SESSION['cargo']=="ADMINISTRADOR"){
                            header("location: http://localhost/SEBAD/resources/views/userFeedAdmin.php");
                        }elseif($_SESSION['cargo']=="FUNCIONARIO"){
                            header("location: http://localhost/SEBAD/resources/views/userFeed.php");
                        }
                    }
                ?>
            </body>
        </form>
    </center>
</html>