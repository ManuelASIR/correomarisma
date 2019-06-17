<html>
<head>
	<link rel="stylesheet" href="../estilos/estilos.css">
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="icon" type="image/png" href="../icono.png">
	<title>WebMail - Bandeja de Entrada</title>
</head>
<body>
<form action="../enviar/index.html"  method="POST">
		<input type="submit" value="Enviar mensajes" class="btn-enviar">
	</form>
	
<form action="../cerrar_sesion/cerrar.php"  method="POST">
	<input type="submit" value="Cerrar Sesión" class="btn-enviar">
</form>
<h1>Bandeja de Entrada</h1>
</body>
</html>
<?php
// "REQUIRE" AÑADE LAS LINEAS DEL ARCHIVO DE CONEXION
// ASI NO HAY QUE ESCRIBIR CONSTANTEMENTE LAS LINEAS DE CONEXION
require '../bdmail/conexion.php';

// INICIA LA SESION
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

// LA SESION LA CONTROLA LA VARIABLE "USUARIO"
$_SESSION['username'] = $username;
// VERIFICAR QUE USUARIO Y CLAVE(ECRIPTADA) ESTA EN LA BASE DE DATOS
$consulta="SELECT * FROM cuentas WHERE username = '$username' and password = MD5('$password')";
$resultado = mysqli_query($conexion, $consulta);

// SI EXISTEN LOS DATOS EL RESULTADO ES = 1
// SI NO EXISTEN LOS DATOS EL RESULTADO ES = 0
$filas=mysqli_num_rows($resultado); 

// SI EL RESULTADO ES MAYOR QUE 0 ENTONCES HACE LOGIN Y VA A LA SIGUIENTE PAGINA
if($filas>0){
	$_SESSION['username'] = $username;
	$_SESSION['password'] = $password;
	set_time_limit(4000); 
	$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
	$inbox = imap_open($hostname,$username,$password) or die('Ha sido imposible establecer conexion: ' . imap_last_error());


'<br>';
$search = 'SINCE "' . date("j F Y", strtotime("-30 days")) . '"';
$emails = imap_search($inbox,$search);

if($emails) {
    $output = '';
    rsort($emails);
    $i=0;

    foreach($emails as $email_number) {
        $overview = imap_fetch_overview($inbox,$email_number,0);
        $text_message = imap_fetchbody($inbox,$email_number,1);
		$file_message = imap_fetchbody($inbox,$email_number,2);
		$type_message = imap_fetchstructure($inbox, $email_number);
		//$header_message = imap_fetchbody($inbox,$email_number,0);
		
        $output.= '<li>';
		$output.= '<span class="from"><pre>'.'<b>- ENVIADO POR: </b>'.$overview[0]->from.'</pre></span>';	
		$output.= '<span class="to "><pre>'.'<b>- PARA: </b>'.$overview[0]->to .'</pre></span>';	
		$output.= '<span class="date"><pre>'.'<b>- FECHA: </b>'.$overview[0]->date.'</pre></span>';												
		$output.= '<span class="subject"><pre>'.'<b>- ASUNTO: </b>'.$overview[0]->subject.'</pre></span> ';
		'<br>';
		'<br>';
		// Sacar bien el texto del mensaje (independientemente de si tiene o no adjuntos)
		if($file_message==null){
			$output.= '<div class="message" id="msg_'.$i.'"><pre>'.'<b>- MENSAJE: <br><br> </b>'.$text_message.'</pre> <br> <br></div>';	
		}
		else{
			$output.= '<div class="message" id="msg_'.$i.'"><pre>'.'<b>- MENSAJE: <br><br> </b>'.$file_message.'</pre> <br> <br></div>';	
		}
        
		'<br>';
        $output.= '</li>';
        $i++;
    }

    echo '<ol class="emails">'.$output.'</ol>';
	
} 

imap_close($inbox);
}

// EN CASO CONTRARIO MUESTRA MENSAJE DE ERROR Y VUELVE AL LOGIN
else {
 echo '<script>
            alert("EL CORREO NO SE ENCUENTRA EN LA BASE DE DATOS");
            window.history.go(-1);
        </script>';
    exit;
}

// COMANDO PARA LIBERAR MEMORIA
mysqli_free_result($resultado);

// COMANDO PARA CERRAR LA CONEXION
mysqli_close($conexion);