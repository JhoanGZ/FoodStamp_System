<?php
    error_reporting(0);
    include("auxFunctions.php");
    include("nexus.php");

    $rutNoDV = $_POST["rut"];
    $dv = strtoupper($_POST['dv']);
    // Necesario para conseguir el dígito verificado.
    $digitoProcesado = verificarRut($rutNoDV); 
    $rut = $rutNoDV."-".$dv;
    
    $nombre1 = ucfirst(strtolower($_POST["nombre1"]));
    $apellido1 = ucfirst(strtolower($_POST["apellido1"]));
    $direccion = ucfirst(strtolower($_POST["direc"]));
    $email = strval($_POST["email"]);
    $cargo = intval($_POST["cargo"]); if($cargo != 1 || $cargo != 2){$cargo = 2;};

    $claveAcceso = "1234";

    if(isset($_POST["btnBuscar"])){
        if((!empty($rutNoDV)) && (!empty($dv))){
            $cnn = Conectar();
            $sql = "SELECT * FROM FUNCIONARIO WHERE RutFuncionario = '$rut';";
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $vaNom = $row[1];
                $vaApe = $row[2];
                $vaDir = $row[3];
                $vaEmail = $row[4];
                $vaCargo = strval($row[5]);
                $vaEstado = $row[7];
            }else{
                $row == null; 
                return printAlert("El RUT ingresado no existe!!");
            }
        }else{return printAlert("ERROR: Debe llenar el campo RUT y Dígito verificador.");} 
    };


    if(isset($_POST["btnRegistrar"])){
        if(!(empty($rutNoDV)) && !(empty($dv)) && !(empty($nombre1)) && !(empty($apellido1)) && !(empty($direccion)) && !(empty($email)) && !(empty($cargo))){
            if($dv == $digitoProcesado){
                $cnn = Conectar();
                $sql = "SELECT * FROM FUNCIONARIO WHERE RutFuncionario = '$rut';";
                $get = mysqli_query($cnn, $sql);
                if($row = mysqli_fetch_array($get)){
                    $queryRut = $row[0];
                }
                $sq2 = "SELECT * FROM FUNCIONARIO WHERE DirEmail = '$email';";
                $get1 = mysqli_query($cnn, $sq2);
                if($row1 = mysqli_fetch_array($get1)){
                    $queryMail = $row1[4];
                }                
                if($queryRut != $rut){
                    if($queryMail != $email){
                        $sql = "INSERT INTO FUNCIONARIO VALUES ('$rut', '$nombre1', '$apellido1', '$direccion', '$email', '$cargo', '$claveAcceso', 0);";
                        mysqli_query($cnn, $sql);
                        return printAlert("Funcionario registrado con éxito!!");
                        
                    } else {return printAlert("Error: El Mail ingresado ya existe, revise nuevamente y reintente");}   

                } else {return printAlert("Error: El Rut ingresado ya existe, revise nuevamente y reintente.");}

            } elseif($dv != $digitoProcesado){return printAlert("Error: El RUT fue ingresado erroneamente, favor verificar y reintente.");}

        } else {return printAlert("ERROR: Debe llenar todos los campos.");}
    }

    if(isset($_POST["btnActualizar"])){
        if(!(empty($rutNoDV)) && !(empty($dv)) && !(empty($nombre1)) && !(empty($apellido1)) && !(empty($direccion)) && !(empty($email)) && !(empty($cargo))){
            $cnn = Conectar();

            $sql = "SELECT * FROM FUNCIONARIO WHERE RutFuncionario = '$rut';";
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $queryRut = $row[0];
                };
            if($queryRut != $rut){
                return printAlert("El RUT ingresado no existe en el sistema!!");
            }else{

                $sql = "UPDATE FUNCIONARIO SET RutFuncionario = '$queryRut', Nombre = '$nombre1', Apellido = '$apellido1', Direccion = '$direccion', DirEmail = '$email', Cargo = '$cargo' WHERE RutFuncionario = '$queryRut';";
                mysqli_query($cnn, $sql);
                return printAlert("Funcionario actualizado con éxito!!");
            };
        }else {return printAlert("ERROR: Debe llenar todos los campos.");};
    };

    if(isset($_POST["btnEliminar"])){
        if((!empty($rutNoDV)) && (!empty($dv))){
            $cnn = Conectar();

            $sql = "select * from FUNCIONARIO where RutFuncionario = '$rut';";
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $queryRut = $row[0];
                };
            if($queryRut != $rut){
                return printAlert("El RUT ingresado no existe en el sistema!!");
            }else{
                $sql = "UPDATE funcionario SET Estado = 1 WHERE RutFuncionario = '$rut';";
                mysqli_query($cnn, $sql);
                return printAlert("Funcionario eliminado con éxito!!");
            };
        }else{return printAlert("ERROR: Debe llenar el campo RUT.");};
    };

    if(isset($_POST['btnVolver'])){
        session_start();
        if($_SESSION['cargo']=="ADMINISTRADOR"){
            header("location: http://localhost/sebad/resources/views/userMenuAdmin.php");
        }elseif($_SESSION['cargo']=="FUNCIONARIO"){
            header("location: http://localhost/sebad/resources/views/userMenu.php");
        }
    }
?>