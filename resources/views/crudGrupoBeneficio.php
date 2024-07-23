<?php
include("../logic/btnLogic/btnLogic_crudGrupoBenef.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud || Grupo beneficio</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php include("../component/reloj.php");
    include("../component/verificacionSesion.php");
    include("../component/validarLetrasNumeros.php");?>
</head>
<body>
    <form action="" method="post">
        <CENTER>
        <h2>Mantenedor de GRUPO-BENEFICIO</h2>
        <br><br>
        Ingrese el ID del grupo
        <br><br>
        <table border="0">
            <tr>
                <td><h3><b>ID</b></h3></td>
                <td><input type="text" name="txtidgroup" size="14" value="<?php if(isset($vaIdGroup)){echo $vaIdGroup;} ?>"></td>
                <td>&nbsp;&nbsp;&nbsp;<button type="submit" name="btnbuscar" value="Buscar">Buscar</button></td>
            </tr>
        </table>
        <table border="0">
        <br>
        <tr>
            <td><b>Rut Funcionario </b>&nbsp;</td>

            <!-- caja de texto para el rut funcionario-->
            <td><input type="text" name="rut" size="14" placeholder="Su Rut sin DV" value="<?php if(isset($vaRut)){ $rut1 = substr($vaRut,0,8); echo  $rut1;} ?>" onkeypress="ValidaSoloNumeros()">
            <input type="text" name="dv" size="1" value="<?php if(isset($vaRut)){$dv1 = substr($vaRut,-1);
                echo($dv1);}?>" placeholder="DV" style="text-align:center;"></td>
        </tr>
        <tr>
            <td><b>Tipo de beneficio </b></td>

            <!--combobox para el tipo de beneficio-->
            <td>
                <select name="beneficio" value="">
                    <?php if($vaBeneficio == 1){echo "<option value='1'> Desayuno/Colacion/Merienda </option>";}?>
                    <?php if($vaBeneficio == 2){echo "<option value='2'> Desayuno </option>";}?>
                    <?php if($vaBeneficio == 3){echo "<option value='3'> Desayuno/Colacion </option>";}?>
                    <?php echo "<option value='$vaBeneficio'> ------</option>";?>
                    <option value="1">Desayuno/Colacion/Merienda</option>
                    <option value="2">Desayuno</option>
                    <option value="3">Desayuno/Colacion</option></select>
            </td>
        </tr>
        <tr>
            <td><b>Bloque horario</b></td>
            <!--COMBOBOX PARA EL BLOQUE HORARIO-->
            <td>
                <select name="bloquehorario" value="">
                    <?php if($vaBloqueHorario == 1){echo "<option value='1'> 1</option>";}?>
                    <?php if($vaBloqueHorario == 2){echo "<option value='2'> 2 </option>";}?>
                    <?php if($vaBloqueHorario == 3){echo "<option value='3'> 3</option>";}?>
                    <?php echo "<option value='$vaBloqueHorario'> ------</option>";?>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option></select>
            </td>
        </tr>    
        </table>
        <table border="0">
        <br>
            <tr>
                <!--Botones AGREGAR MODIFICAR ELIMINAR-->
                <td><button type="submit" name=btnagregar value="Agregar">Agregar</button></td>
                <td><button type="submit" name="btnmodificar" value="Modificar">Modificar</button></td>
                <td><button type="submit" name="btneliminar" value="Eliminar">Eliminar</button></td>
            </tr>
        </table>
        <br><br>
        <p><button type="submit" name="btnVolver" value="Volver">Volver</button></p>
        </CENTER>
    </form>
</body>
</html>