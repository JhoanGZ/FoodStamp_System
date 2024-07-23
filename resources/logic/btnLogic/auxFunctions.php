<?php

    error_reporting(0);

        //Envía un mensaje por caja de alerta.
    function printAlert($message){
        echo '<script>alert("'.$message.'")</script>';
    };

    function goToPage($URL_Location){ // al ejecutarse redirecciona a una url.
        // el argumento $URL_Location se llena con una cadena.
        //ejemplo goToPage('http://localhost/sebad/');
        echo "<script type='text/javascript'>window.location='$URL_Location'</script>";
    };

    function goBackPage($numOfBack){ // vuelve a la pagina anterior.
        // Requiere en el argumento la cantidad de regresos en el historial en forma de número (unidad) negativo.
        // Debe combinarser con un autoincremental para realmente volver a la pagina anterior.
        // que resultará en la cantidad de retrocesos que ejecutará la función.
        if($numOfBack == 0){
            $numOfBack = -2;
            echo "<script>window.history.go($numOfBack)</script>";
        }else{
            $numOfBack = ($numOfBack - $numOfBack - $numOfBack - 3);
            echo "<script>window.history.go($numOfBack)</script>";
        };
    };

        //
    function flagTestEcho($submitName, $submitValue, $postTarget){
        //Captura una variable post  a partir de su botón y lo imprime en pantalla.
        if($_POST[$submitName] == $submitValue){ $flagTest = $_POST[$postTarget];}
        if(isset($flagTest)){ echo $flagTest;};
    };

    function verificarRut($rut){

        $rutinvertido = strrev($rut);
        $count = 0;

        while($count < strlen($rutinvertido)){

            $concatenado[$count] = substr($rutinvertido,$count,1);
            $count++;
        }

        $multiplicador = 2;
        $countDos = 0;
        $suma = 0;

        while ($countDos < count($concatenado)){
            $suma = $suma + ($concatenado[$countDos] * $multiplicador);
            if($multiplicador == 7){
                $multiplicador = 2;
            }
            else
            {
                $multiplicador++;
            }
            $countDos++;
        }

        $restante = $suma % 11;
        $digito = 11 - $restante;

        //Entrega

        if($digito == 10){
            return "K";
        } elseif ($digito == 11){
            return "0";
        } else {return $digito;}
    }
?>

