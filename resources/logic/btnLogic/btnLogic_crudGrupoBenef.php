<?php
    error_reporting(0);
    include("auxFunctions.php");
    include("nexus.php");


    $rutSinPro = $_POST['rut'];
    $digito = verificarRut($_POST['rut']); //$digito = verificarRut([$rutSinPro]);
    $dv = strtoupper($_POST['dv']);
    $rut = $rutSinPro."-".$dv;
    $idGroup = ($_POST['txtidgroup']);
    $beneficio = intval($_POST['beneficio']);
    $bloqueHorario = intval($_POST['bloquehorario']);


    if(isset($_POST["btnbuscar"])){
        if(strlen($idGroup) > 0){
            $cnn = Conectar();

            $sql =
            "SELECT gb.IdGrupo, gb.RutFuncionario, gb.TipoBenficio, gb.Horarios
            FROM grupobeneficio gb, bloquehorario bh, tipodebeneficio tb, funcionario f
            WHERE ((gb.RutFuncionario = f.RutFuncionario)) and ((gb.Horarios = bh.Id)) and (( gb.TipoBenficio = tb.Id)) and (gb.IdGrupo = '$idGroup')
            GROUP BY gb.IdGrupo;";

            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $vaRut= $row[1];
                $vaIdGroup = $row[0];
                $vaBeneficio = $row[2];
                $vaBloqueHorario = $row[3];
            }else{$row = null; return printAlert("El Id ingresado no está registrado!!");};
        }else{return printAlert("ERROR: Debe llenar el campo ID.");};  
    }


    if(isset($_POST["btnagregar"])){
        if(strlen($idGroup) > 0){
            if(!empty($_POST['rut']) && !empty($_POST['dv'])){
                if($dv == $digito){
                    $cnn = Conectar();
                    $sql = "SELECT * FROM GRUPOBENEFICIO WHERE IdGrupo = '$idGroup';";
                    $get = mysqli_query($cnn, $sql);

                    if($row = mysqli_fetch_array($get)){
                        $queryIdGrupo = $row[0];
                        };
                    if($querIdGroup == $idGroup){
                        return printAlert("El GRUPO ingresado ya existe en el sistema!!");
                    }
                    else{ 
                        $sql = "INSERT INTO grupobeneficio VALUES ('$idGroup', '$rut', $beneficio, $bloqueHorario);";
                        mysqli_query($cnn, $sql);
                        return printAlert("grupo registrado con éxito!!");
                        }

                } elseif($dv != $digito){return printAlert("El Rut ingresado está errado, favor verificar y reintente.");}           
            } else {return printAlert("Error: Debe llenar los campos de Rut y DV, reintente nuevamente");}
        }else{return printAlert("ERROR: No pueden quedar campos vacíos");};
    }


    if(isset($_POST["btnmodificar"])){
        if(strlen(($rut) > 0 && strlen($idGroup) > 0)){
            if(!empty($_POST['rut']) && !empty($_POST['dv'])){
                $cnn = Conectar();
                $sql = 
                "SELECT *
                FROM GRUPOBENEFICIO
                WHERE IdGrupo = '$idGroup';";

                $get = mysqli_query($cnn, $sql);
                if($row = mysqli_fetch_array($get)){};
                $querIdGroup = $row[0];
                if($querIdGroup != $idGroup){
                    return printAlert("El GRUPO que intenta actualizar no existe en el sistema!!");
                }else{
                    $sql =
                    "UPDATE  grupobeneficio gb
                    SET gb.IdGrupo = '$querIdGroup', gb.RutFuncionario = '$rut', gb.TipoBenficio = $beneficio, gb.Horarios = $bloqueHorario
                    WHERE gb.IdGrupo = '$idGroup';";

                    mysqli_query($cnn, $sql);
                    return printAlert("Grupo Actualizado con éxito!!");
                };
            }elseif($dv != $digito){return printAlert("El Rut ingresado está errado, favor verificar y reintente.");}       
        }else{return printAlert("ERROR: Debe llenar todos los campos.");};
    };


    if(isset($_POST["btneliminar"])){
        //
        if(strlen($idGroup) > 0){
            $cnn = Conectar();

            $sql = 
            "SELECT *
            FROM GRUPOBENEFICIO
            WHERE IdGrupo = '$idGroup';";

            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){};
            $querIdGroup = $row[0];
            if($querIdGroup != $idGroup){
                return printAlert("El GRUPO indicado no existe!!");
            }else{
                $sql =
                "DELETE
                FROM grupobeneficio
                WHERE IdGrupo = '$idGroup';";

                mysqli_query($cnn, $sql);
                return printAlert("Grupo eliminado con éxito!!");
            };
        }else{return printAlert("ERROR: Debe llenar el campo ID.");};
    }

    if(isset($_POST['btnVolver'])){
        session_start();
        if($_SESSION['cargo']=="ADMINISTRADOR"){
            header("location: http://localhost/sebad/resources/views/userMenuAdmin.php");
        }elseif($_SESSION['cargo']=="FUNCIONARIO"){
            header("location: http://localhost/sebad/resources/views/userMenu.php");
        }
    }
    //ARCHIVO TERMINADO.
?>