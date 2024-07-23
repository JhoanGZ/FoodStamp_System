<!DOCTYPE html>
<?php include("../logic/btnLogic/auxFunctions.php");include("nexus.php");?>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro de usuario | SEBAD</title>
    </head>
    <body>
        <center>
        <form action="" method="post">
            <br>
            <h2>Ingrese sus datos</h2>
            <br>
            <table>
            <tr>
                <td>Correo</td>
                <td><input type="text" name="txtCorreo" size="20" placeholder="Usuario No Permitido" value="<?php session_start(); if(isset($_SESSION['recover'])){echo $_SESSION['recover'];}; ?>" style="background-color:white; border-color:transparent; text-align:center;" readonly></td>
            </tr>
            <tr>
                <td>Nueva Contraseña</td>
                <td><input type="password" name="txtContrasena" size="20"placeholder="************" style="text-align:center;"></td>
            </tr>
            <tr>
                <td>Repita Nueva Contraseña&nbsp;</td>
                <td><input type="password" name="txtRepeat" size="20"placeholder="************" style="text-align:center;"></td>
            </tr>
            </table>
            <br><br>
            <input type="submit" name="btnGuardar" value="Guardar">
            <?php 
            error_reporting(0);
            if(isset($_POST['btnGuardar'])){

                $correo = $_POST['txtCorreo'];
                $clave = $_POST['txtContrasena'];
                $Rclave = $_POST['txtRepeat'];
                if($clave == $Rclave){
                    $cnn = Conectar();
                    $sql = "SELECT * FROM funcionario WHERE DirEmail = '$correo'";
                    $resu = mysqli_query($cnn,$sql);
                    if($row = mysqli_fetch_array($resu)){
                        $sql2 = "UPDATE funcionario SET ClaveAcceso = '$clave' WHERE DirEmail = '$row[4]'";
                        if(mysqli_query($cnn,$sql2)){
                            printAlert('CLAVE ACTUALIZADA');
                        }
                    }else{printAlert('Operación no Valida');}
                }else{printAlert('Contraseñas no coinciden');}
                session_destroy();
            }
            ?>
        </form>
        </center>
    </body>
</html>