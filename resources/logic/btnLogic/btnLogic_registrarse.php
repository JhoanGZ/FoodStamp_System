<?php 
include("auxFunctions.php");
include("nexus.php");
if(isset($_POST["btnVolver"])){
    header("location: http://localhost/sebad");
}
if (isset($_POST["btnGuardar"])){

    if(!(empty($_POST['txtNombre'])) && !(empty($_POST['txtApellido'])) && !(empty($_POST['txtCorreo'])) && !(empty($_POST['txtContraseña'])) && !(empty($_POST['txtRContraseña'])) && !(empty($_POST['txtCiudad']) && !(empty($_POST['txtRut'])) && !(empty($_POST['txtDV'])))){

        
        $Nombre = $_POST['txtNombre'];
        $Apellido = $_POST['txtApellido'];
        $Correo = $_POST['txtCorreo'];
        $Contraseña = $_POST['txtContraseña'];
        $RepeatContraseña = $_POST['txtRContraseña'];
        $Direccion = $_POST['txtCiudad'];
        $rutNoDV = $_POST['txtRut'];
        $dv = strtoupper($_POST['txtDV']);

        $digitoProcesado = verificarRut($rutNoDV); 

        $rut = $rutNoDV."-".$dv;
        
        if(!((strpos($Nombre," ")) || (strpos($Apellido," ")) || (strpos($Correo," ")) || (strpos($Direccion," ")) || (strpos($rut," ")))){
            
            switch($Contraseña){
                
                case ($Contraseña != $RepeatContraseña);
                    printAlert('Las contraseñas no coinciden');
                    break;

                case (!preg_match('`[a-z]`',$Contraseña));
                    printAlert('La clave debe tener al menos una letra minúscula');
                    break;

                case (!preg_match('`[A-Z]`',$Contraseña));
                    printAlert('La clave debe tener al menos una letra mayúscula');
                    break;

                case (strlen($Contraseña) < 6);
                    printAlert('La clave debe tener al menos 6 caracteres');
                    break;

                case (strlen($Contraseña) > 16);
                    printAlert('La clave debe tener menos de 16 caracteres');
                    break;
                    
                case (strpos($Contraseña," "));
                    printAlert('La clave no puede contener espacios en blanco');
                    break;

                case (!preg_match('`[°,",#,$,%,&,/,(,),=,?,¡,¨,*,+,-,.,<,>,;,!,|]`', $Contraseña));
                    printAlert('La clave debe contener un caracter especial');
                    break;


                default;
                    if(($dv == $digitoProcesado) && strlen($rut) >= 9){
                        
                        if((strlen($Nombre) < 50) && (strlen($Apellido) < 50 )){

                            $cnn=Conectar();
                            $sql2="SELECT * FROM funcionario WHERE (RutFuncionario = '$rut') OR (DirEmail ='$Correo');";
                            $get = mysqli_query($cnn,$sql2);
                            $row = mysqli_num_rows($get);
                        
                            if( $row == 0){
                            
                                $sql="INSERT INTO funcionario VALUES('$rut','$Nombre','$Apellido','$Direccion','$Correo','2','$Contraseña')";
                                mysqli_query($cnn,$sql);
                                printAlert('Registrado con exito');

                            }else{

                                printAlert('Error: Usuario está registrado ya sea con RUT o Email');
                                echo "<center>¿Olvidó su contraseña? <a href='http://localhost/sebad/resources/views/recoverAccount.php'>Click aquí</a></center>";
                            }

                        }else{printAlert('El nombre y el apellido no debe exceder los 50 caracteres');}

                    }else{printAlert('Rut no valido');}
            
            }
        }else{printAlert("Ningun campo puede contener espacios vacios");}
    }else{ printAlert('Debe llenar todos los campos');}
    }
?>