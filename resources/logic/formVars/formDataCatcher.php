<?php
    error_reporting(0);

    $rut = $_POST["rut"];
    $nombre1 = ucfirst(strtolower($_POST["nombre1"])) . " " . ucfirst(strtolower($_POST["nombre2"]));
    $apellido1 = ucfirst(strtolower($_POST["apellido1"])) . " " . ucfirst(strtolower($_POST["apellido2"]));
    $fechaNac = $_POST["fnac"];
    $emailLog = $_POST["email"];
    $cargo = (int) $_POST["cargo"];
    $claveAcceso = $_POST["txtPass"];
    $direccion = $_POST["direc"];
    $estadoBeneficio = $_POST["edoBeneficio"];
    $grupoBeneficio = $_POST["gruBeneficio"];

    $dataBlockFuncionario = [$rut, $nombre, $apellido1, $direccion, $email, $cargo];
?>