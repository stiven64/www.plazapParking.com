<?php
// Incluye la configuración de la base de datos
include('../app/config.php');

// Recoge los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

// Establece la zona horaria y obtiene la fecha y hora actual
date_default_timezone_set("America/Caracas");
$fechaHora = date("Y-m-d H:i:s");

// Prepara la sentencia SQL para insertar los datos en la tabla de sugerencias
$sentencia = $pdo->prepare("INSERT INTO tb_sugerencias (nombre, email, mensaje, fecha) VALUES (:nombre, :email, :mensaje, :fecha)");

// Vincula los parámetros a las variables
$sentencia->bindParam(':nombre', $nombre);
$sentencia->bindParam(':email', $email);
$sentencia->bindParam(':mensaje', $mensaje);
$sentencia->bindParam(':fecha', $fechaHora);

// Ejecuta la sentencia y verifica si fue exitosa
if($sentencia->execute()){
    echo "Mensaje enviado con éxito.";
    ?>
    <script>location.href = "../index.php";</script>
    <?php
}else{
    echo "Error al enviar el mensaje.";
}
?>
