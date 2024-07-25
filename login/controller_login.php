<?php

include('../app/config.php');

session_start();

// Utiliza el operador de fusión de null para asignar un valor por defecto si las claves no están definidas
$usuario_user = $_POST['usuario'] ?? '';
$password_user = $_POST['password_user'] ?? '';

// Verifica si 'form_login' está definido en $_POST y asigna 'false' como valor por defecto
$form_login = $_POST['form_login'] ?? 'false';

// Preparar la consulta SQL para evitar inyecciones SQL
$query_login = $pdo->prepare("SELECT * FROM tb_usuarios WHERE email = :email AND password_user = :password_user AND estado = '1'");
$query_login->bindParam(':email', $usuario_user);
$query_login->bindParam(':password_user', $password_user);

// Ejecutar la consulta
$query_login->execute();

// Obtener los resultados
$usuarios = $query_login->fetchAll(PDO::FETCH_ASSOC);

// Verificar si se encontró el usuario
if ($usuarios) {
    foreach($usuarios as $usuario){
        $email_tabla = $usuario['email'];
        $password_tabla = $usuario['password_user'];
    }

    // Verificar si las credenciales coinciden
    if(($usuario_user == $email_tabla)&&($password_user == $password_tabla)){
        // Establecer la sesión del usuario
        $_SESSION['usuario_sesion'] = $email_tabla;

        // Redirigir al usuario a la página principal
        if($form_login == 'false'){
            echo '<div class="alert alert-success" role="alert">Usuario Correcto</div>';
            echo '<script>location.href = "principal.php";</script>';
        }else{
            echo '<div class="alert alert-success" role="alert">Usuario Correcto</div>';
            echo '<script>location.href = "../principal.php";</script>';
        }
    } else {
        // Mostrar mensaje de error
        echo '<div class="alert alert-danger" role="alert">Error al introducir sus datos</div>';
        echo '<script>$("#password").val(""); $("#password").focus();</script>';
    }
} else {
    // Mostrar mensaje de error
    echo '<div class="alert alert-danger" role="alert">Error al introducir sus datos</div>';
    echo '<script>$("#password").val(""); $("#password").focus();</script>';
}

?>
