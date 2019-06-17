<?php
// SE INICIA LA SESION 

session_start();
// CREO VARIABLE PARA GUARDAR SESION DE USUARIO
$varsesion = $_SESSION['usuario'];

// SI LA SESION ES NULA O ESTA VACIA DEVUELVE A PAGINA DE LOGIN
// PORQUE NO HAS INICIADO SESION
if ($varsesion == null || $varsesion == ''){
	sleep (1);
	header("location:../login/login.html");
	die;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="../estilos/estilos.css">
    <title>WebMail - AñadeCorreo @</title>
	<link rel="icon" type="image/png" href="../icono.png">
	<script src="validar.js"></script>
</head>
<body>
	<form action="registro_correo.php" method="POST" class="form-register" onsubmit="return validar();">
		<h2 class="form-titulo"><?php echo "Bienvenid@  " . $_SESSION['usuario'] . '<br>' . "Introduzca su correo y contraseña" ;
		'<br>'?></h2>
		
		<div class="contenedor-inputs">
		<br>
		    
			<input type="text" name="username" id="username"  placeholder="Correo electronico" class="input-48">
			<input type="password" name="password" id="password" placeholder="Contraseña Correo" class="input-48">
			<input type="submit" value="Enviar" class="btn-enviar">
			<p class="form-link">Inicie sesion en su correo <a href="login_correo.html">Ingrese aquí</a></p>
		</div>
	</form>
</body>
</html>