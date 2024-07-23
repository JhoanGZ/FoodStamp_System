<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php include("../component/reloj.php"); include("../component/validarLetrasNumeros.php");include("../logic/btnLogic/btnLogic_registrarse.php"); //Invoca el reloj;?>
</head>

<body>
    <form method="POST">
    <center>
        <h1>Registro de usuario</h1>
        <br><br><br>
        <table>
        <tr>
            <td>RUT&nbsp;</td>
            <td><input type="text" onkeypress="ValidaSoloNumeros()" placeholder="Su Rut" name="txtRut" size="16">&nbsp;-&nbsp;
            <input type="text" name="txtDV" size="1" placeholder="DV"></td>
        </tr>
        <tr>
            <td>Nombre&nbsp;</td>
            <td><input type="text" onkeypress="ValidaSoloLetras()" placeholder="Nombre" name="txtNombre" size="25"></td>
        </tr>
        <tr>
            <td>Apellido&nbsp;</td>
            <td><input type="text" onkeypress="ValidaSoloLetras()" placeholder="Apellido" name="txtApellido" size="25"></td>
        </tr>
        <tr>
            <td>Correo electronico&nbsp;</td>
            <td><input type="email" placeholder="Correo@electronico.com" name="txtCorreo" size="25"></td>
        </tr>
        <tr>
            <td>Contraseña&nbsp;</td>
            <td><input type="password" placeholder="***************" name="txtContraseña" size="25"></td>
        </tr>
        <tr>
            <td>Repetir contraseña&nbsp;</td>
            <td><input type="password" placeholder="***************" name="txtRContraseña" size="25"></td>
        </tr>
        <tr>
            <td>Ciudad&nbsp;</td>
            <td><input type="text"onkeypress="ValidaSoloLetras()" placeholder="Ciudad" name="txtCiudad" size="25"></td>
        </tr>
        </table>
        <br><br>
        <button type="submit" value="Guardar" name="btnGuardar">Guardar</button>
        <br><br><br><br>
        <button type="submit" value="Volver" name="btnVolver">Volver</button>
        
    </center>
    </form>
</body>
</html>