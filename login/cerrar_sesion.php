<?php

// Incluye el archivo de configuración que contiene variables y ajustes necesarios
include('../app/config.php');

// Inicia una nueva sesión o reanuda una sesión existente
session_start();

// Verifica si existe una sesión activa para el usuario
if(isset($_SESSION['usuario_sesion'])) {
    // Destruye la sesión activa, cerrando la sesión del usuario
    session_destroy();
    // Redirige al usuario a la página principal del sitio web
    header("Location: ".$URL."/");
}