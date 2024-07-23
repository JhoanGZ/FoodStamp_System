<?php // http://localhost/sebad/resources/views/crudVoucher.php
    error_reporting(0);
    include("../logic/btnLogic/btnLogic_crudUser.php");
?>

<!DOCTYPE html>
<html lang="es_la">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link ref="stylesheet" href="../css/styleSheet.css">
    <title>Voucher Beneficiario</title>
</head>
<?php include("../component/reloj.php"); //Invoca el reloj;?>
<body>
    <form action="" method="POST">
        <center><img src="../css//SEBAD Logo.jpg" width="150" height="150"></center>  
        <br><br> 
        <center>
        <table border='1' id="tablaVoucher" style="text-align: center">
            <tr>
                <td><b>Codigo de Entrada</b></td>
                <td><?php echo $vaCodVoucher ?></td>
            </tr>
            <tr>
                <td><b>Rut&nbsp;</b></td>
                <td><?php echo $rut;?></td>
            </tr>
            <tr>
                <td><b>Nombre&nbsp;</b></td>
                <td><?php echo $vaNom;?></td>
            </tr>
            <tr>
                <td><b>Apellido&nbsp;</b></td>
                <td><?php echo $vaApe;?></td>
            </tr>
            <tr>
                <td><b>Hora Inici:&nbsp;</b></td>
                <td><?php echo $vaHorIn;?></td>
            </tr>
            <tr>
                <td><b>Hora Final&nbsp;</b></td>
                <td><?php echo $vaHorFi;?></td>
            </tr>
        </table>
        </center>
    </form><br><br>
    <center>
    <form action="../prints_PDF/PDF_voucherBeneficiario.php" method="post" target="_blank">
        <br><button type='submit' name='go'><img src='http://localhost/sebad/resources/css/pdf_icon.png' alt='Imagen Enlace PDF' width='70px' height='70px'></button>  
        <input type="hidden" name="cod" value="<?php echo $vaCodVoucher; ?>">
        <input type="hidden" name="rut" value="<?php echo $rut; ?>">
        <input type="hidden" name="nom" value="<?php echo $vaNom; ?>">
        <input type="hidden" name="ape" value="<?php echo $vaApe; ?>">
        <input type="hidden" name="hin" value="<?php echo $vaHorIn; ?>">
        <input type="hidden" name="hfi" value="<?php echo $vaHorFi; ?>">
    </form>
    </center>
    <center>
    <p><input type="button" onclick="history.back()" name="volver atrás" value="volver atrás"></p>
    </center>
    
</body>
</html>