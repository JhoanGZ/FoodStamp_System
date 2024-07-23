<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario de Contacto</title>
        <link rel="stylesheet" href="../css/styleSheetContact.css">
        <?php error_reporting(0);
        include("../component/validarLetrasNumeros.php");
        ?>
    </head>
    <body>
        <center>
            <p>Ingrese toda la información solicitada para podernos comunicar con usted</p>
            <form id="formulario" name="formulario" method="post">
                <p> 
                    Nombre<br>
                    <input name="nombre" type="text" required onkeypress="ValidarSoloLetras()"><br>
                    Telefono<br>
                    <input name="fono" type="text" required onkeypress="ValidarSoloNumeros()"><br>
                    Email<br>
                    <input name="email" type="text" required ><br>
                    Mensaje<br>
                    <textarea name="mensaje" rows="10" cols="20" placeholder="Déjenos su mensaje acá"></textarea><br><br><br>
                    <button type="submit" name="envio" value="envio">Enviar</button>
                </p>
            </form>
            <?php
            
                error_reporting(0);

                $mail = 'equipoprogramacion69@gmail.com';

                $nombre = $_POST['nombre'];
                $telefono = $_POST['fono'];
                $email = $_POST['email'];
                $mensaje = $_POST['mensaje'];

                $gracias = "gracias.html";

                $envio = "
                Nombre: ".$nombre."
                Teléfono: ".$fono."
                Email: ".$email."
                Mensaje: ".$mensaje."";

                if (mail($mail,"formulario",$envio))
                {header("Location: $gracias");}

            ?>

        </center>
    </body>
</html>

