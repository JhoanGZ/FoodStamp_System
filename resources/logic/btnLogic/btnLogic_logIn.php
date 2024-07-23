<?php
error_reporting(0);
include ('nexus.php');
include("auxFunctions.php");
//include("sesion.php");
    // BUTTON TRIGGER ::: "Ejecuta el proceso de validación de inicio de sesión".
    // Consiste en una pseudo-validación de usuario basada en condiones.
session_start();
if(isset($_POST["btnIngresar"])){
    $email = $_POST['email'];
    $contrasena = $_POST['txtPass'];
    $sql = "SELECT * FROM funcionario WHERE DirEmail = '$email'";
    $cnn = Conectar();
    $res = mysqli_query($cnn,$sql);

    if($row = mysqli_fetch_array($res)){
        if($row[6]==$contrasena){
            if($row[7] == "1"){
                echo "<html><center><br><br><br><b><h1>USUARIO INHABILITADO</h1></b><br><br><a href='http://localhost/SEBAD/index.php'>| Volver |</a></center></html>";
            } else{
                if(($row[5]==1)){
                    $_SESSION['username'] = $row[1];
                    $_SESSION['cargo'] = "ADMINISTRADOR";
                    header("location: http://localhost/SEBAD/resources/views/userFeedAdmin.php");
                }elseif(($row[5]==2)){
                    $_SESSION['username'] = $row[1];
                    $_SESSION['cargo'] = "FUNCIONARIO";
                    header("location: http://localhost/SEBAD/resources/views/userFeed.php");
                }else{echo "<html><center><br><br><br><b><h1>ACCESO NO AUTORIZADO</h1></b><br><br><a href='http://localhost/SEBAD/index.php'>| Volver |</a></center></html>";}
            }
        } else{echo "<html><center><br><br><br><b><h1>¡CONTRASEÑA INCORRECTA!</h1></b><br><br><a href='http://localhost/SEBAD/index.php'>| Volver |</a></center></html>";}
    } else{echo "<html><center><br><br><br><b><h1>¡DATOS INCORRECTOS!</h1></b><br><br><a href='http://localhost/SEBAD/index.php'>| Volver |</a></center></html>";}
};

if(isset($_POST["btnRegistrarse"])){
    header("location: http://localhost/SEBAD/resources/views/registrarse.php");
}
//if(isset($_POST['btnRegistrarse'])){
//    header("location: http://localhost/SEBAD/resources/views/viewRegistrarse.php");
//}
?>