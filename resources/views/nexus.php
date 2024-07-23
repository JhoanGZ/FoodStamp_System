<?php
    error_reporting(0);
    
    function Conectar()
    {
        
        $cnn = mysqli_connect("localhost", "root", "","SEBAD",3306);
        if(mysqli_connect_errno())
        {
            echo "!Error en conexion a la base de datos!<br>Verifique la conexion"; 
            exit();
        }
        return $cnn;
    }
?>