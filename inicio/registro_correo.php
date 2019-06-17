<?php
// SE INICIA LA SESION
session_start();

// LA SESION LA CONTROLA LA VARIABLE "USUARIO"


// "REQUIRE" AÑADE LAS LINEAS DEL ARCHIVO DE CONEXION
// ASI NO HAY QUE ESCRIBIR CONSTANTEMENTE LAS LINEAS DE CONEXION
require '../bdmail/conexion.php';

// RECIBIR DATOS DEL FORMULARIO Y ALMACENAR EN VARIABLES

$username = $_POST['username'];
$password = md5($_POST['password']);
$_SESSION['username'] = $username;
$_SESSION['username'] = $password;


// COMANDO SQL PARA INSERTAR DATOS
$insertar = "INSERT INTO cuentas(username, password) VALUES ('$username', '$password')";

// VERIFICAR QUE EL CORREO ELECTRONICO NO EXISTE EN LA BASE DE DATOS

$verificar = mysqli_query($conexion, "SELECT * FROM cuentas WHERE username = '$username' and password = '$password'");
if (mysqli_num_rows($verificar) > 0){
   echo '<script>
            alert("El correo electronico ya se encuentra registrado");
            window.history.go(-1);
        </script>';
    exit;
}

// EN CASO CONTRARIO EL USUARIO ES NUEVO Y PUEDE CONTINUAR HACIA LA PAGINA LOGIN
else {
	header ("location:login_correo.html");
	sleep (3);
}
	
//COMANDO PARA HACER QUE INSERTE LOS DATOS EN LA BASE DE DATOS
$resultado = mysqli_query($conexion, $insertar);

//ESTO ES SOLO PARA CONFIRMAR QUE TODO VA BIEN
    if (!$resultado){
    echo "HA HABIDO UN ERROR AL REGISTRARSE";
    }
    else{
    echo "LOS DATOS SE HAN INSERTADO CORRECTAMENTE";
    }


//CERRAR CONEXION
mysqli_close ($conexion);
?>