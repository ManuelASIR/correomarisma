<?php
// SE INICIA LA SESION
session_start();

// LA SESION LA CONTROLA LA VARIABLE "USUARIO"


// "REQUIRE" AÑADE LAS LINEAS DEL ARCHIVO DE CONEXION
// ASI NO HAY QUE ESCRIBIR CONSTANTEMENTE LAS LINEAS DE CONEXION
require 'bdmail/conexion.php';

// RECIBIR DATOS DEL FORMULARIO Y ALMACENAR EN VARIABLES
// CON "MD5" LA STRING SE CIFRA CON CARACTERES ALEATORIOS
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$clave=md5($_POST['clave']);
$telefono = $_POST['telefono'];

$_SESSION['usuario'] = $usuario;

// COMANDO SQL PARA INSERTAR DATOS
$insertar = "INSERT INTO usuarios(nombre, usuario, clave, telefono) VALUES ('$nombre', '$usuario', '$clave', '$telefono')";

// VERIFICAR QUE EL USUARIO NO EXISTE EN LA BASE DE DATOS
// SI EL NUMERO DE FILAS ES MAYOR QUE 0 SIGNIFICA QUE HAY DATOS INSERTADOS
// SI HAY DATOS INSERTADOS DA MENSAJE DE ERROR Y VUELVE AL REGISTRO
$verificar = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario' and clave = '$clave'");
if (mysqli_num_rows($verificar) > 0){
   echo '<script>
            alert("El nombre de usuario ya se encuentra registrado");
            window.history.go(-1);
        </script>';
    exit;
}

// EN CASO CONTRARIO EL USUARIO ES NUEVO Y PUEDE CONTINUAR HACIA LA PAGINA LOGIN
else {
	header ("location:/login/login.html");
	sleep (3);
}
	
//COMANDO PARA HACER QUE INSERTE LOS DATOS EN LA BASE DE DATOS
$resultado = mysqli_query($conexion, $insertar);

// COMANDO PARA CERRAR LA CONEXION
mysqli_close ($conexion);
?>