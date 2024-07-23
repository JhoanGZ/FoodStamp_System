<?php 
    error_reporting(0);
    include("auxFunctions.php"); include("nexus.php");

    $idGroup = $_POST['idGroup'];
    $hrInicioDy = $_POST['hrInicioDy'];
    $hrTerminoDy = $_POST['hrTerminoDy'];
    $hrInicioAl = $_POST['hrInicioAl'];
    $hrTerminoAl = $_POST['hrTerminoAl'];
    $hrInicioMer = $_POST['hrInicioMer'];
    $hrTerminoMer = $_POST['hrTerminoMer'];
    
    if(isset($_POST["btnbuscar"])) {
        if(strlen($idGroup) > 0){
            $cnn = Conectar();
            $sql = "SELECT * FROM bloquehorario WHERE Id = '$idGroup';";

            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $vaIdGroup= $row[0];
                $vaInicioDy = $row[1];
                $vaTerminoDy = $row[2];
                $vaInicioAl = $row[3];
                $vaTerminoAl = $row[4];
                $vaInicioMer = $row[5];
                $vaTerminoMer = $row[6]; // ver time =/= sqltime
                
            }else{$row = null; return printAlert("El Grupo solicitado no está registrado!!");};
        }else{return printAlert("ERROR: Debe llenar el campo ID.");};  
    };


    if(isset($_POST["btnRegistrar"])){
        if(strlen($idGroup) > 0 ){
            $cnn = Conectar();

            $sql = 
            "SELECT *
            FROM bloquehorario
            WHERE Id = '$idGroup';";

            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){
                $queryIdGrupo = $row[0];
                };
            if($querIdGroup == $idGroup){
                return printAlert("El número de bloque horario ya existe en el sistema!!");
            }else{
                $sql =
                "INSERT INTO bloquehorario
                VALUES ('$idGroup', '$hrInicioDy', '$hrTerminoDy', '$hrInicioAl', '$hrTerminoAl', '$hrInicioMer', '$hrTerminoMer');";

                mysqli_query($cnn, $sql);
                return printAlert("Bloque horario registrado con éxito!!");
            };
        }else{return printAlert("ERROR: No pueden quedar campos vacíos");};
    };


    if(isset($_POST["btnActualizar"])){
        if(strlen($idGroup) > 0 ){
            $cnn = Conectar();

            $sql = 
            "SELECT *
            FROM bloquehorario
            WHERE Id = '$idGroup';";
            
            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){};
            $querIdGroup = $row[0];
            if($querIdGroup != $idGroup){
                return printAlert("El GRUPO que intenta actualizar no existe en el sistema!!");
            }else{
                $sql =
                "UPDATE  bloquehorario
                SET HoraInicioDesayuno = '$hrInicioDy', HoraFinDesayuno = '$hrTerminoDy', 
                    HoraInicioColacion = '$hrInicioAl', HoraFinColacion = '$hrTerminoAl',
                    HoraInicioMerienda = '$hrInicioMer', HoraFinMerienda = '$hrTerminoMer'
                WHERE Id = '$idGroup';";

                mysqli_query($cnn, $sql);
                return printAlert("Grupo Actualizado con éxito!!");
            };
        }else{return printAlert("ERROR: Debe llenar todos los campos.");};
    };


    if(isset($_POST["btnEliminar"])){
        //
        if(strlen($idGroup) > 0){
            $cnn = Conectar();

            $sql = 
            "SELECT *
            FROM bloquehorario
            WHERE Id = '$idGroup';";

            $get = mysqli_query($cnn, $sql);
            if($row = mysqli_fetch_array($get)){};
            $querIdGroup = $row[0];
            if($querIdGroup != $idGroup){
                return printAlert("El GRUPO indicado no existe!!");
            }else{
                $sql =
                "DELETE
                FROM bloquehorario
                WHERE Id = '$idGroup';";

                mysqli_query($cnn, $sql);
                return printAlert("Grupo eliminado con éxito!!");
            };
        }else{return printAlert("ERROR: Debe llenar el campo ID.");};
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