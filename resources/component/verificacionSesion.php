<?php 
    error_reporting(0);
    session_start();
    if(isset($_SESSION['cargo'])&&(isset($_SESSION['username']))){
        echo $_SESSION['cargo']." ".$_SESSION['username'];
    } else {header("Location: http://localhost/sebad/index.php");}
?>