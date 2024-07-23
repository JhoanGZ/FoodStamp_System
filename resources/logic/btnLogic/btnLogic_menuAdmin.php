<?php
    error_reporting(0);
    include("auxFunctions.php");
    include("sesion.php");
    // BUTTON TRIGGER ::: "Desde el SU abre el mantenedor de funcionarios".
    if($_POST["btnAdmFuncionarios"] == ">>"){
        header( 'Location: http://localhost/sebad/resources/views/crudFuncionarios.php' );
    };

    // BUTTON TRIGGER ::: "Abre el administrador de beneficiarios".
    if($_POST["btnAdnBeneficiarios"] == ">>"){
        header( 'Location: http://localhost/sebad/resources/views/crudBeneficiarios.php' );
    };

    // BUTTON TRIGGER ::: "Abre el administrador de grupo de beneficiarios".
    if($_POST["btnAdmGrupoBeneficiarios"] == ">>"){
        header( 'Location: http://localhost/sebad/resources/views/crudGrupoBeneficio.php' );
    };

    // BUTTON TRIGGER ::: "Abre el administrador de bloques horarios".
    if($_POST["btnAdmBloqueHorario"] == ">>"){
        header('Location: http://localhost/sebad/resources/views/crudBloqueHorario.php');
        
    };

    // BUTTON TRIGGER ::: "Vuelve a la pantalla anterior".
    if(isset($_POST['btnVolver'])){
        session_start();
        if($_SESSION['cargo']=="ADMINISTRADOR"){
            header("location: http://localhost/sebad/resources/views/userFeedAdmin.php");
        }elseif($_SESSION['cargo']=="FUNCIONARIO"){
            header("location: http://localhost/sebad/resources/views/userFeed.php");
        }
    }
?>