<?php
    session_start();
	session_unset();
    session_destroy();
	sleep(1);
	echo"Cerrando Sesion";
	sleep(1);
    header("location:../login/login.html");
?>
