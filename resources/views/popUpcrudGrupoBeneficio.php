<?php // http://localhost/sebad/resources/views/popUpcrudGrupoBeneficio.php ?>
<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PopUp Grupo Beneficio</title>
    <?php include("../component/reloj.php"); //Invoca el reloj;?>
</head>
<center><body>
    <main>
        <h1>GRUPO <?php error_reporting(0); echo $grupBeneficio; ?></h1>
        <?php 
            echo nl2br("ID del grupo: ".$grupBeneficio."\nTipo de Beneficio: ".$unk1."\nBloque desayuno: ".$unk2."\nBloque Desayuno: ".$unk3."\nBloque Once: ".$unk4);
        ?>
    </main>
    <form action="" method="post">
        <br><br><br>
        <label for="ordenGrupo" class="grupo1">Ordenar por:</label><br>
        <select name="gruBeneficio" class="grupo1">
            <option value="<?php echo null;?>"><?php echo null;?></option>
            <option value="<?php echo null;?>">--------</option>
            <option value="Regular">Regular</option>
            <option value="Preferente">Preferente</option>
            <option value="Prioritario">Prioritario</option>
        </select><br><br><br><br>
        <label for="cantFuncionarios" class="etiquetasCantidad">Cantidad de funcionarios:&nbsp;<?php echo "1";?></label><br>
        <p>Funcionarios:&nbsp;</p>
        <select name="cantFuncionarios">
            <option value="<?php echo null;?>"><?echo null; ?></option>
            <option value="<?php echo null;?>">--------------------------</option>
        </select><br><br>
        <label for="beneficiarios" class="etiquetasCantidad">Cantidad de beneficiarios:&nbsp;<?php echo "1";?></label><br>
        <p>Beneficiarios:&nbsp;</p>
        <select name="beneficiarios">
            <option value="<?php echo null;?>"><?php echo null;?></option>
            <option value="<?php echo null;?>">--------------------------</option>
        </select>
    </form>
</body></center>
</html>