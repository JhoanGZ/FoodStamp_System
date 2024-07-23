<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informe general de beneficiarios</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php include("../component/reloj.php"); include("../component/verificacionSesion.php");?>
</head>
<center><body>
    <form action="" method="post">
        <header><h1>INFORME GENERAL DE BENEFICIARIOS</h1></header>
        <p><button type="submit" name="btnBuscarTodo" value="Visualizar Listado">Visualizar Listado</button></p>
    </form><br>
    <form action="http://localhost/sebad/resources/prints_PDF/PDF_mostrarTodosBeneficiarios.php" method="post" target="_blank">
        <?php 
            include("../logic/btnLogic/btnLogic_mostrarTodosBeneficiarios_PDF.php");
        ?>

</form>
<form method="POST">
<br><br>
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
</form>
</body></center>
</html>