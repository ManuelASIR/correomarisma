<?php
// INICIA LA SESION
session_start();

// "REQUIRE" AÑADE LAS LINEAS DEL ARCHIVO DE CONEXION
// ASI NO HAY QUE ESCRIBIR CONSTANTEMENTE LAS LINEAS DE CONEXION
require '../bdmail/conexion.php';

// SE RECOGEN LAS VARIABLES DE FORMULARIO 
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$_SESSION['usuario'] = $usuario;

// VERIFICAR QUE USUARIO Y CLAVE(ECRIPTADA) ESTA EN LA BASE DE DATOS
$consulta="SELECT usuario FROM usuarios WHERE usuario = '$usuario' and clave = MD5('$clave')";
$resultado = mysqli_query($conexion, $consulta);

// SI EXISTEN LOS DATOS EL RESULTADO ES = 1
// SI NO EXISTEN LOS DATOS EL RESULTADO ES = 0
$filas=mysqli_num_rows($resultado); 

// SI EL RESULTADO ES MAYOR QUE 0 ENTONCES HACE LOGIN Y VA A LA SIGUIENTE PAGINA
if($filas>0){
    header ("location:../inicio/index.php");
}

// EN CASO CONTRARIO MUESTRA MENSAJE DE ERROR Y VUELVE AL LOGIN
else {
 echo '<script>
            alert("Usuario o clave incorrectas");
            window.history.go(-1);
        </script>';
    exit;
}

// COMANDO PARA LIBERAR MEMORIA
mysqli_free_result($resultado);

// COMANDO PARA CERRAR LA CONEXION
mysqli_close($conexion);

?>