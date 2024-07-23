<?php
    error_reporting(0);

    // BUTTON TRIGGER ::: "Accede a las métricas del sistema.".
    if($_POST["btnMetricas"] == ">>"){
        header( 'Location: http://localhost/sebad/resources/views/metrics.php' );
    };

        // BUTTON TRIGGER ::: "Accede al menú super user validando credenciales del SU".
    if($_POST["btnUserMenu"] == ">>"){
        header( 'Location: http://localhost/sebad/resources/views/userMenuAdmin.php' );
    };
        // BUTTON TRIGGER ::: "Ejecuta desconexión con el servidor y cierra la sesión".
    if($_POST["btnCerrarSesion"] == "Cerrar sesión"){
        session_start();
        session_destroy();
        header( 'Location: http://localhost/sebad/index.php' );
        //cerrarSesion();
    };
?>