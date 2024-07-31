<?php

// Include the configuration file for database connection
include('../app/config.php');

// Retrieve the parameters from the URL query string
$cantidad = $_GET['cantidad'];
$detalle = $_GET['detalle'];
$precio = $_GET['precio'];

// Set the default timezone
date_default_timezone_set("America/Santo_Domingo");
// Get the current date and time
$fechaHora = date("Y-m-d h:i:s");

// Prepare an SQL statement for inserting a new record into the tb_precios table
$sentencia = $pdo->prepare('INSERT INTO tb_precios
(cantidad,detalle,precio, fyh_creacion, estado)
VALUES ( :cantidad,:detalle,:precio,:fyh_creacion,:estado)');

// Bind parameters to the SQL query
$sentencia->bindParam(':cantidad', $cantidad);
$sentencia->bindParam(':detalle', $detalle);
$sentencia->bindParam(':precio', $precio);
$sentencia->bindParam(':fyh_creacion', $fechaHora);
// Assuming $estado_del_registro is defined elsewhere in your script; it's used to set the state of the record
$sentencia->bindParam(':estado', $estado_del_registro);

// Execute the SQL statement
if($sentencia->execute()){
    // If execution is successful, output 'success'
    echo 'success';
    // Redirect to 'index.php'
    ?>
    <script>location.href = "index.php";</script>
    <?php
}else{
    // If there's an error, output an error message
    echo 'error al registrar a la base de datos';
}
?>