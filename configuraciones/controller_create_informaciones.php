
<?php

// Incluye el archivo de configuración
include('../app/config.php');

// Obtiene los datos de los parámetros GET
$nombre_parqueo = $_GET['nombre_parqueo'];
$actividad_empresa = $_GET['actividad_empresa'];
$sucursal = $_GET['sucursal'];
$direccion = $_GET['direccion'];
$zona = $_GET['zona'];
$telefono = $_GET['telefono'];
$departamento_ciudad = $_GET['departamento_ciudad'];
$pais = $_GET['pais'];

// Establece la zona horaria predeterminada y obtiene la fecha y hora actual
date_default_timezone_set("America/Santo_Domingo");
$fechaHora = date("Y-m-d h:i:s");

// Prepara la sentencia SQL para insertar los datos en la tabla 'tb_informaciones'
$sentencia = $pdo->prepare('INSERT INTO tb_informaciones
(nombre_parqueo, actividad_empresa, sucursal, direccion, zona, telefono, departamento_ciudad, pais, fyh_creacion, estado)
VALUES (:nombre_parqueo, :actividad_empresa, :sucursal, :direccion, :zona, :telefono, :departamento_ciudad, :pais, :fyh_creacion, :estado)');

// Vincula los parámetros con los valores obtenidos de la solicitud GET
$sentencia->bindParam(':nombre_parqueo', $nombre_parqueo);
$sentencia->bindParam(':actividad_empresa', $actividad_empresa);
$sentencia->bindParam(':sucursal', $sucursal);
$sentencia->bindParam(':direccion', $direccion);
$sentencia->bindParam(':zona', $zona);
$sentencia->bindParam(':telefono', $telefono);
$sentencia->bindParam(':departamento_ciudad', $departamento_ciudad);
$sentencia->bindParam(':pais', $pais);
$sentencia->bindParam('fyh_creacion', $fechaHora);
$sentencia->bindParam('estado', $estado_del_registro);

// Ejecuta la sentencia SQL y verifica si la inserción fue exitosa
if ($sentencia->execute()) {
    echo 'success';
    // Redirige a la página 'informaciones.php' si la inserción fue exitosa
    ?>
    <script>location.href = "informaciones.php";</script>
    <?php
} else {
    // Muestra un mensaje de error si la inserción falla
    echo 'error al registrar a la base de datos';
}
?>