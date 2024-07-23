<?php //http://localhost/sebad/
error_reporting(0);
include("resources/logic/btnLogic/auxFunctions.php");
include("resources/logic/formVars/formDataCatcher.php");
include("resources/session/index.php");
//include("resources/logic/btnLogic/btnLogic_logIn.php");
?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ingreso Sistema SEBAD</title>
        <link rel="stylesheet" href="../SEBAD/resources/css/styleNeoLogin.css">
        <?php include("resources/component/reloj.php");
        include("resources/component/validarLetrasNumeros.php");?>
    </head>
    <body>
        <div><img id="sebadLogo" src="../SEBAD/resources/css/SEBAD Logo.jpg" alt="Logo Sistema"></div>
        <div><img id="aiepLogo" src="../SEBAD/resources/css/AIEP.png" alt="Logo Institucion"></div>
        </center></div>
        <div id="login"><center>

            <form action="resources/logic/btnLogic/btnLogic_logIn.php" method="POST">
                
                <caption><h1>LogIn SEBAD</h1></caption>
                <br>
                <caption><p><b><em>Ingrese sus datos para acceder</em></b></p></caption>
                <br><br><br>
                
                <label class="setModificado">
                    <input type="text" name="email" placeholder="Correo">
                    <span class="sobreSalto">Ingrese su</span>
                </label>
                <br><br><br><br>
                <label class="setModificado">
                    <input type="password" name="txtPass" placeholder="Contraseña">
                    <span class="sobreSalto">Ingrese su</span>
                </label>
                <br><br><br>
                <button type="submit" name="btnIngresar" value="Ingresar" formmethod="post">Ingresar</button>
                <br><br><br><br>
                <button type="submit" name="btnRegistrarse" value="Registrarse">Registrarse</button>
                <br><br><br>              

                <button type="button"><a href="http://localhost/sebad/resources/views/recoverAccount.php"><em>Recuperar contraseña</em></a></button>&nbsp;&nbsp;
                <button type="button"><a href="http://localhost/sebad/resources/views/crudUser.php"><em>TOTEM BENEFICIARIO</em></a></button>                
            </form>
            <footer>
                <br><br>
                <p><em>Equipo de desarrollo</em></p>
                <p>| Luigui Nuñez | Jhoan Gutierrez | Francisco Soto |</p>            
                <a href="resources\views\crudEquipodesarrollo.php"><img src="../SEBAD/resources/css/iconodesarrolladoreslogin.png" width="5%" height="5%" alt="Imagen Referencial Equipo Programadores"></a><br><br>
                <b><a href="resources/views/contactanos.php">| Contáctanos |</a></b>
            </footer>
            
    </body>
</html>