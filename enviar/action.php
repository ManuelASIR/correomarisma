<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/PHPMailer.php';

session_start();
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$mail = new PHPMailer(true);
try {
	$mail->isSMTP();
    $mail->SMTPDebug  = 0;                                                                                   
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = $_SESSION['username'];	
    $mail->Password   = $_SESSION['password'];                             
    $mail->SMTPSecure = 'tls';                                  
    $mail->Port       = 587;                                   

    $mail->setFrom($_SESSION['username']);
    $mail->addAddress($_POST['destinatario']);
    
    $mail->isHTML(true);                                  
    $mail->Subject = $_POST['asunto'];
    $mail->Body    = $_POST['cuerpo'];

    $mail->send();
	sleep (2);
	header ("Location: ../inicio/login_correo.html");
	} 
catch (Exception $e) {
echo 'Error: ', $mail->ErrorInfo;
}
?>