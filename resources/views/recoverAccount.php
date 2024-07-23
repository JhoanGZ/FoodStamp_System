<?php // http://localhost/sebad/resources/views/recoverAccount.php
error_reporting(0);
include("../logic/btnLogic/btnLogic_recoverAccount.php");
include("nexus.php");
?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Recuperación de usuario | SEBAD</title>
        <link rel="stylesheet" href="../css/styleNeoLogin.css">
        <?php if (include("../component/reloj.php")){}else{ echo "ERROR INCLUYENDO RELOJ";}; //Invoca el reloj;?>
    </head>
    <center><body>
        <form method="post">
            <caption><h1>Recuperación de usuario</h1></caption>
            <br><br>
            <label class="setModificado">
                <input type="email" name="txtUser" placeholder="Correo" style="text-align:center">
                <span class="sobreSalto">Ingrese su</span>
            </label> 
            <br><br>
            <p><button type="submit" name="btnRecuperar" value="Recuperar">Recuperar</button></p>   

            <?php 
            error_reporting(0);
            if(isset($_POST['btnRecuperar']))
            {
                echo "holas";
                session_start();
                $_SESSION['recover'] = $_POST['txtUser']; 
                $email = $_POST['txtUser'];
                $sql = "SELECT * FROM funcionarios WHERE DirEmail = '$email'";
                $cnn = Conectar();
                $res = mysqli_query($cnn,$sql);
                if(mysqli_fetch_array($res)){
                    $mensaje = "Click en el siguiente enlace para cambiar tu contraseña ---> http://localhost/SEBAD/resources/views/viewCambiarContrasena.php";
                    if(!(mail($email,"Recuperacion de contraseña SEBAD",$mensaje)))
                    {echo "Mensaje enviado<br><br>";}
                    
                }else{printAlert("Correo no valido o inexistente");}
            };
            
            ?>
            <br><br>
            <p><em>Recibirá un mensaje con un enlace en su bandeja de correo electrónico.</em></p>
            <br><br>
            <button type="button" onclick="location.href='http://localhost/sebad/index.php';">Volver al LogIn</button>

        </form>
    </body></center>
</html>