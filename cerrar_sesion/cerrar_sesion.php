<?php
    session_start();
    session_destroy();
    header("location:../login/index.html");
?>






$variablesesion = $_SESION['usuario'];

if ($variablesesion == null || $variablesesion
 = '') {
     header("location:../login/index.html");
     die();
    }