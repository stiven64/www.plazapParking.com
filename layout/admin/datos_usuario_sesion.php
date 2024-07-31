<?php

// Inicia la sesión
session_start();

// Verifica si hay una sesión de usuario activa
if(isset($_SESSION['usuario_sesion'])) {
    // Obtiene el usuario de la sesión
    $usuario_sesion = $_SESSION['usuario_sesion'];

    // Prepara y ejecuta la consulta para obtener los datos del usuario
    $query_usuario_sesion = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = '$usuario_sesion' AND estado = '1' ");
    $query_usuario_sesion->execute();
    $usuarios_sesions = $query_usuario_sesion->fetchAll(PDO::FETCH_ASSOC);

    // Itera sobre los resultados y asigna los datos del usuario a variables
    foreach($usuarios_sesions as $usuarios_sesion){
        $id_user_sesion = $usuarios_sesion['id'];
        $nombres_sesion = $usuarios_sesion['nombres'];
        $email_sesion = $usuarios_sesion['email'];
        $rol_sesion = $usuarios_sesion['rol'];

    }
}else{
    // Si no hay una sesión activa, muestra un mensaje y redirige al login
    echo "para ingresar a esta plataforma debe de iniciar sesión";
    header('Location: '.$URL.'/login');
}

//echo "Bienvenido Administrador";

?>