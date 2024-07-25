<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<body style="background-image: url('public/imagenes/piso.jpg');
    background-repeat: no-repeat;
    z-index: -3;
    background-size: 100vw 100vh">


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">
        <img src="../public/imagenes/auto1.png" width="20" height="30" alt="" loading="lazy">
        Plaza Parking
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="../index.php">INICIO <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="./nosotros.php">SOBRE NOSOTROS</a>
            </li>
        </ul>
        
        <!-- Button trigger modal -->
        
    </div>
</nav>
        <!-- Contenido principal -->
        <div class="container mt-4">
        <h2> 
            <div class="alert alert-primary" role="alert">
            Contactos del Parqueo
            </div>    
            </h2>
        
        <div class="row">
            <div class="col-md-6">
                <h3>Información de Contacto</h3>
                <p><strong>Dirección:</strong> Calle Principal, La Vega, Republica Dominicana</p>
                <p><strong>Teléfono:</strong> 809-888-8888</p>
                <p><strong>Email:</strong> contacto@parqueoseguro.com</p>
                <p><strong>Horario:</strong> Lunes a Domingo - 7:00AM A 12:00PM</p>
            </div>
            <div class="col-md-6">
                <!-- Formulario de contacto -->
                <h3>Envíanos un Mensaje</h3>
                <form action="procesar_contacto.php" method="post">

                    <form action="procesar_contacto.php" method="post">
    <div class="form-group">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
    </div>
    <div class="form-group">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="mensaje">Mensaje</label>
        <textarea class="form-control" id="mensaje" name="mensaje" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
</form>


<!-- Pie de página -->
<footer class="text-center text-lg-start bg-light text-muted mt-5">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
        <!-- Enlaces de redes sociales -->
        <div class="me-5 d-none d-lg-block">
       
            <div class="alert alert-primary" role="alert">
            <span>Síguenos en nuestras redes sociales:</span>
            </div>    
           
            
        </div>
        
    </section>
</footer>
<div>
            <!-- Iconos de redes sociales más grandes con FontAwesome -->
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-facebook-f fa-2x"></i>
            </a>
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-twitter fa-2x"></i>
            </a>
            <a href="#" class="me-4 text-reset">
                <i class="fab fa-instagram fa-2x"></i>
            </a>
            <!-- Agrega aquí más enlaces si es necesario -->
        </div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

 
</body>

</html>
