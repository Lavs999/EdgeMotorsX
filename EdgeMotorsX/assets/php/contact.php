<?php

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$tema = $_POST['tema'];
$telefono = $_POST['telefono'];
$mensaje = $_POST['mensaje'];


$destinatatio = "lvirgen7@ucol.mx";
$asunto = "Este mensaje viene de la LandingPage edgeMotorsX";

$info = "De: $nombre \n";
$info .= "Correo: $correo \n";
$info .= "Telefono: $telefono \n";
$info .= "Tema: $tema \n";
$info .= "Mensaje: $mensaje";

mail($destinatatio, $asunto, $info);
header('Location:../../index.html#mensaje');

?>