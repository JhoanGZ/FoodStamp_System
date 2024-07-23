<?php
    error_reporting(0);
    include("../logic/btnLogic//btnLogic_crudFuncionarios.php");
?>

<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud || Funcionario</title>
    <link rel="stylesheet" href="../css/styleSheet.css">
    <?php include("../component/reloj.php");include("../component/verificacionSesion.php"); include("../component/validarLetrasNumeros.php"); //Invoca el reloj;?>
</head>
<body><center>
    <h1>Gestor de Funcionarios</h1>
    
    <br>
    <form action="" method="post">
        <table border="0">
            <tbody>
                <tr>
                    <td><b>Rut</b></td>
                    <td><input type="text" name="rut" value="<?php if(isset($rutNoDV)){echo $rutNoDV;}; ?>" onkeypress="ValidaSoloNumeros()" placeholder="Su Rut sin dígito verificador"></td>
                    <td><input type="text" name="dv" value="<?php if(isset($dv)){echo $dv;}; ?>" size="1" placeholder="DV"></td>
                    <td>&nbsp;&nbsp;&nbsp;<button type="submit" name="btnBuscar" value="Buscar">Buscar</button></td>
                </tr>
                <tr>
                    <td><b>Nombre</b></td>
                    <td><input type="text" name="nombre1" value="<?php if(isset($vaNom)){echo $vaNom;}; ?>" onkeypress="ValidaSoloLetras()"></td>
                </tr>
                
                <tr>
                    <td><b>Apellido</b></td>
                    <td><input type="text" name="apellido1" value="<?php if(isset($vaApe)){echo $vaApe;}; ?>" onkeypress="ValidaSoloLetras()"></td>
                </tr>
                <tr>
                    <td><b>Email</b></td>
                    <td><input type="email" name="email" value="<?php if(isset($vaEmail)){echo $vaEmail;}; ?>"></td>
                </tr>
                <tr>
                    <td><b>Dirección</b></td>
                    <td><input type="text" name="direc" value="<?php if(isset($vaDir)){echo $vaDir;}; ?>"></td>
                </tr>
                <tr>
                    <td><b>Cargo</b></td>
                    <td>
                        <select name="cargo" id="">
                            <option value="<?php if(isset($vaCargo)){echo $vaCargo;}; ?>"><?php if(isset($vaCargo) && $vaCargo == 1){echo "ADMINISTRADOR";}elseif(isset($vaCargo) && $vaCargo == 2){echo "FUNCIONARIO";}; ?></option>
                            <option value="<?php if(isset($vaCargo)){echo $vaCargo;}; ?>">------</option>
                            <option value="1">ADMINISTRADOR</option>
                            <option value="2">FUNCIONARIO</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><b>Estado</b></td> 
                    <td><input type="text" name="estado" value="<?php if(isset($vaEstado) && $vaEstado == 0){echo "Activo";} elseif(isset($vaEstado) && $vaEstado == 1){echo "Inactivo";} ?>" readonly></td>
                </tr>
            
            </tbody>
        </table><br>
        <button type="submit" name="btnRegistrar" value="Registrar">Registrar</button>&nbsp;&nbsp;
        <button type="submit" name="btnActualizar" value="Actualizar">Actualizar</button>&nbsp;&nbsp;
        <button type="submit" name="btnEliminar" value="Eliminar">Eliminar</button>&nbsp;&nbsp;
        <br><br><br><br>
        <p><button type="submit" name="btnVolver" value="Volver">Volver</button></p>
    </form>
</body></center>
</html>