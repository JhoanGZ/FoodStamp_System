<?php
    error_reporting(0);
    include("../logic/btnLogic/btnLogic_crudBloqueHorario.php");
?>

<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php include("../component/reloj.php");include("../component/verificacionSesion.php"); //Invoca el reloj;?>
</head>
<body>
    <center>
        <br>
        <h1><b>Bloque Horario</b></h1>
        <br>
        <form action="" method="post">
            <table>
                <tr>
                    <td><label for="idGroup">Id Bloque Horario&nbsp;</label></td>
                    <td><input type="text" name="idGroup" value="<?php if(isset($vaIdGroup)){echo $vaIdGroup;}?>"></td>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" name="btnbuscar" value="Buscar">Buscar</button></td>
                </tr>  
            </table>
            <br><br>
            <p><em><b>A continuación ingrese modifique el(los) bloque(s) horario(s)</b></em></p>
            <br>
            <table>
                
                <tr>
                    <td><label for="hrInD">Inicio Desayuno&nbsp;</label>
                    <td><input type="time" name="hrInicioDy" value="<?php if(isset($vaInicioDy)){echo $vaInicioDy;}?>"></td>
                </tr>
                
                <tr>
                    <td><label for="hrSaD">Termino Desayuno&nbsp;</label></td>
                    <td><input type="time" name="hrTerminoDy" value="<?php if(isset($vaTerminoDy)){echo $vaTerminoDy;} ?>"></td>
                </tr>
                <tr>
                    <td><label for="hrInAl">Inicio Almuerzo&nbsp;</label></td>
                    <td><input type="time" name="hrInicioAl" value="<?php if(isset($vaInicioAl)){echo $vaInicioAl;} ?>"></td>
                </tr>
                <tr>
                    <td><label for="hrSaAl">Termino Almuerzo&nbsp;</label></td>
                    <td><input type="time" name="hrTerminoAl" value="<?php if(isset($vaTerminoAl)){echo $vaTerminoAl;}?>"></td>
                </tr>
                <tr>
                    <td><label for="hrInMe">Inicio Merienda&nbsp;</label></td>
                    <td><input type="time" name="hrInicioMer" value="<?php if(isset($vaInicioMer)){echo $vaInicioMer;}?>"></td>
                </tr>
                <tr>
                    <td><label for="hrSaMe">Termino Merienda&nbsp;</label></td>
                    <td><input type="time" name="hrTerminoMer" value="<?php if(isset($vaTerminoMer)){echo $vaTerminoMer;}?>"></td>
                </tr>
            </table>
            <br><br><br>
            <button type="submit" name="btnRegistrar" value="Registrar">Registrar</button>
            <button type="submit" name="btnActualizar" value="Actualizar">Actualizar</button>
            <button type="submit" name="btnEliminar" value="Eliminar">Eliminar</button>
            <br><br>
            <p><button type="submit" name="btnVolver" value="Volver">Volver</button></p>
            
        </form>
    </center>    
</body>
</html>