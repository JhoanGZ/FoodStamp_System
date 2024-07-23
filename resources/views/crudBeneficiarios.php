<?php
include("../logic/btnLogic/btnLogic_crudBenef.php");

?>

<!DOCTYPE html>
<html lang="es_la">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>CRUD Beneficiarios</title>
        <link rel="stylesheet" href="../css/styleSheet.css">
        <?php include("../component/reloj.php");
        include("../component/verificacionSesion.php"); 
        include("../component/validarLetrasNumeros.php");?>
    </head>
    <body><center>
        <h1>Gestor de beneficiarios</h1>
        <form action="" method="post">
            <table border="0">
                <tbody>
                    <tr>
                        <td><b>Rut</b></td>
                        <td><input type="text" name="rut" size="20" value="<?php if(isset($rutNoDV)){echo $rutNoDV;}?>"onkeypress="ValidaSoloNumeros()" placeholder="Su Rut sin DV"></td>
                        <td><input type="text" name="dv" value="<?php if(isset($dv)){echo $dv;}?>" size="1" placeholder="DV" style="text-align: center; font-style: inherit"></td>
                        <td>&nbsp;&nbsp;<button type="submit" name="btnBuscar" value="Buscar">Buscar</button></td>
                    </tr>
                    <tr>
                        <td><b>Nombre</b></td>
                        <td><input type="text" name="nombre1" value="<?php echo $vaNom ;?>"onkeypress="ValidaSoloLetras()" placeholder="Ingrese su nombre"></td>
                    </tr>
                    <tr>
                        <td><b>Apellido</b></td>
                        <td><input type="text" name="apellido1" value="<?php echo $vaApe ;?>"onkeypress="ValidaSoloLetras()" placeholder="Ingrese su apellido"></td>
                    </tr>
                    <tr> 
                        <td><b>Fecha de nacimiento</b></td>
                        <td><input type="date" name="fnac" value="<?php echo $vaFnac ;?>"></td>
                    </tr>
                    <tr>
                        <td><b>Email</b></td>
                        <td><input type="email" name="email" value="<?php echo $vaEmail ;?>" placeholder="Ingrese su Email"></td>
                    </tr>
                    <tr>
                        <td><b>Dirección:</b></td>
                        <td><input type="text" name="direc" value="<?php echo $vaDir ;?>" placeholder="Ingrese su dirección"></td>
                    </tr>
                    <tr>
                        <td><b>Estado beneficio:</b></td>
                        <td><select name="estadobeneficio">
                            <option value="<?php if(isset($vaIdbn)){echo $vaIdbn;}; ?>"><?php if(isset($vaIdbn) && $vaIdbn == 1){echo "Activo";}elseif(isset($vaIdbn) && $vaIdbn == 0){echo "Inactivo";}; ?></option>
                            <option value="<?php if(isset($vaIdbn)){echo $vaIdbn;}; ?>">------</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select></td>
                    </tr>
                    <tr>
                        <td><b>Grupo beneficio:</b></td>
                        <td><select name="gruBeneficio">
                                <option value="<?php echo $vaGben; ?>"><?php echo $vaGben; ?></option>
                                <option value="<?php echo $vaGben; ?>">------</option>
                                <?php 
                                    $cnn = Conectar();
                                    $sql5 = "SELECT IdGrupo FROM grupobeneficio GROUP BY IdGrupo;";
                                    $res5 = mysqli_query($cnn,$sql5);
                                    while ($row5 = mysqli_fetch_array($res5))
                                    {echo "<option value='$row5[0]'>$row5[0]</option>";} //Funcionó porque se quitó la conexión a DB
                                ?>
                                
                            </select></td>
                    </tr>
                </tbody>
            </table><br>
            <button type="submit" name="btnRegistrar" value="Registrar">Registrar</button>
            <button type="submit" name="btnActualizar" value="Actualizar">Actualizar</button>
            <button type="submit" name="btnEliminar" value="Eliminar">Eliminar</button>
            <br><br><br><br>
            <p><button type="submit" name="btnVolver" value="Volver">Volver</button></p>
        </form>
    </body></center>
</html>