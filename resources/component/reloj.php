<?php
date_default_timezone_set('America/Santiago');
$vaFecha=date('d-M-Y');
?>

<script>
    var RelojID24 = null
    var RelojEjecutandose24 = false
    function DetenerReloj24(){
        
        if(RelojEjecutandose24)
            clearTimeout(RelojID24)
            RelojEjecutandose24 = false
    }
    function MostrarHora24 () {
        var ahora = new Date()
        var horas = ahora.getHours()
        var minutos = ahora.getMinutes()
        var segundos = ahora.getSeconds()
        var ValorHora

        //establece las horas
        if (horas < 10)
            ValorHora = "0" + horas
        else
            ValorHora = "" + horas
            
        //establece los minutos
        if (minutos < 10)
            ValorHora += ":0" + minutos
        else
            ValorHora += ":" + minutos
            
        //establece los segundos
        if (segundos < 10)
            ValorHora += ":0" + segundos
        else
            ValorHora += ":" + segundos
            document.reloj24.txtDigitos.value = ValorHora
            
        //si se desea tener el reloj en la barra de estado, reemplazar la anterior por esta
        //window.status = ValorHora
        
            RelojID24 = setTimeout("MostrarHora24()",1000)
            RelojEjecutandose24 = true
    }

    function IniciarReloj24() {
        
            DetenerReloj24()
            MostrarHora24()
    }
            
</script>

<body onload="IniciarReloj24()">
    <form name="reloj24">
        
        <table border=0>
            <tr>
                <?php date_default_timezone_set('America/Santiago');
                $vaFecha=date('d-M-Y');
                ?>
                <td><input type="text" size="8" name="txtDigitos" value=" " style="background-color:#eee; border-color:transparent;"></td>
                <td><input type="text" name="caja_fecha" value="<?php echo $vaFecha; ?>" style="background-color:#eee; border-color:transparent;" readonly></td>
            </tr>
        </table>
    </form>
</body>