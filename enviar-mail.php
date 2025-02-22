<?php 

$nombre = $_POST["name"];
$correo = $_POST["email"];
$mensaje = $_POST["message"];

// Habilitar errores para depuración
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Configurar el correo
$from = "info@fundacionandamiaje.com"; // Debe ser un correo autorizado por Hostinger
$to = "info@fundacionandamiaje.com";
$subject = "Consulta Web";

// Corrección: Asegurar que el mensaje incluya el contenido del usuario
$body = "Nombre: ".$nombre."\n";
$body .= "Correo: ".$correo."\n";
$body .= "Mensaje:\n".$mensaje."\n";

$headers = "From: $from\r\n";
$headers .= "Reply-To: $correo\r\n"; // Para que puedas responder al usuario directamente
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Enviar correo
if (mail($to, $subject, $body, $headers)) {
    echo "El correo fue enviado.";
} else {
    echo "Error al enviar el correo.";
}

// Redirigir al usuario
header("Location: contacto.html");
exit();

?>