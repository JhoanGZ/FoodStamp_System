<?php
    error_reporting(0);
    include("auxFunctions.php");
    include("nexus.php");

    $rutNoDV = $_POST['rut'];
    $dv = strtoupper($_POST['dv']);
    // Necesario para conseguir el dígito verificado.
    $digitoProcesado = verificarRut($rutNoDV); 
    $rut = $rutNoDV."-".$dv;

    $nombre1 = ucfirst(strtolower($_POST["nombre1"]));
    $apellido1 = ucfirst(strtolower($_POST["apellido1"]));
    $fechanacimiento = $_POST["fnac"];
    $estadobeneficio = intval($_POST["estadobeneficio"]);
    if($estadobeneficio != 1 || $estadobeneficio != 0){$estadobeneficio = 1;}
    $direccion = ucfirst(strtolower($_POST["direc"]));
    $email = $_POST['email'];
    $grupobeneficio = $_POST['gruBeneficio'];

    if(isset($_POST["btnBuscar"])){
        if((!empty($rutNoDV)) && (!empty($dv))){
            $cnn = Conectar();
            $sql = "SELECT * FROM BENEFICIARIO WHERE Rut= '$rut';";
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $vaNom = $row[1];
                $vaApe = $row[2];
                $vaFnac =$row[3];
                $vaIdbn = $row[4];
                $vaDir = $row[5];
                $vaEmail = $row[6];
                $vaGben = $row[7];
            }else{$row == null; 
                return printAlert("El RUT ingresado no existe!!");}
        }else{return printAlert("ERROR: Debe llenar el campo RUT y Dígito verificador.");}  
    }

    if(isset($_POST["btnRegistrar"])){
        if(!(empty($rutNoDV)) && !(empty($dv)) && !(empty($nombre1)) && !(empty($apellido1)) && !(empty($fechanacimiento)) && !(empty($estadobeneficio)) && !(empty($direccion)) && !(empty($email)) && !(empty($grupobeneficio))){
            if($dv == $digitoProcesado){
                $cnn = Conectar();
                $sqlConsulta = "SELECT * FROM BENEFICIARIO WHERE Rut = '$rut';";
                $get = mysqli_query($cnn, $sqlConsulta);
                $row = mysqli_fetch_array($get);
                if($row[0] == $rut) {return printAlert("El RUT ingresado ya existe en el sistema!!");} 
                else{
                    $sql = "INSERT INTO BENEFICIARIO VALUES ('$rut', '$nombre1', '$apellido1', '$fechanacimiento', $estadobeneficio, '$direccion', '$email','$grupobeneficio');";
                    mysqli_query($cnn, $sql);
                    return printAlert("Beneficiario registrado con éxito!!");
                }
            }elseif ($dv != $digitoProcesado){return printAlert("Error: El Rut fue ingresado erroneamente, favor verificar y reintente.");} 
        }else {return printAlert("ERROR: Debe llenar todos los campos.");}
    }

    if(isset($_POST["btnActualizar"])){
        if(!(empty($rutNoDV)) && (!empty($dv)) && !(empty($nombre1)) && !(empty($apellido1)) && !(empty($fechanacimiento)) && !(empty($estadobeneficio)) && !(empty($direccion)) && !(empty($email)) && !(empty($grupobeneficio))){
            $cnn = Conectar();
            $sql = "SELECT * FROM BENEFICIARIO WHERE Rut = '$rut';";
            $get = mysqli_query($cnn, $sql);
            $row = mysqli_fetch_array($get);
            
            if($row[0] != $rut){
                return printAlert("El RUT ingresado no existe en el sistema!!");
            }else{
                $cnn=Conectar();
                $sql3 = "UPDATE BENEFICIARIO SET Rut = '$rut', Nombre = '$nombre1', Apellido = '$apellido1', FechaNacimiento = '$fechanacimiento', IdEstadoBeneficio = '$estadobeneficio', Direccion = '$direccion', DirEmail = '$email', GrupoBeneficio = '$grupobeneficio' WHERE Rut = '$rut';";
                mysqli_query($cnn, $sql3);
                printAlert("Beneficiario actualizado con éxito!!");
            }
        }else{return printAlert("ERROR: Debe llenar todos los campos.");} 
    }

    if(isset($_POST["btnEliminar"])){
        if(!empty($rutNoDV) && !empty($dv)){
            $cnn = Conectar();
            $sql = "SELECT * FROM BENEFICIARIO WHERE Rut = '$rut';";
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $queryRut = $row[0];
            }
            if($queryRut != $rut){
                return printAlert("El RUT ingresado no existe en el sistema!!");
            }else{
                $sql = "UPDATE BENEFICIARIO SET  IdEstadoBeneficio = 0 WHERE Rut = '$queryRut';";
                mysqli_query($cnn, $sql);
                return printAlert("Beneficiario inactivado con éxito!!");
            }
        }else{return printAlert("ERROR: Debe llenar el campo RUT.");}  
    }
    if(isset($_POST['btnVolver'])){
        session_start();
        if($_SESSION['cargo']=="ADMINISTRADOR"){
            header("location: http://localhost/sebad/resources/views/userMenuAdmin.php");
        }elseif($_SESSION['cargo']=="FUNCIONARIO"){
            header("location: http://localhost/sebad/resources/views/userMenu.php");
        }
    }
?>