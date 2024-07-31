<?php
// Include the configuration file for database connection
include('../app/config.php');
// Include the file that manages the user session data
include('../layout/admin/datos_usuario_sesion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <?php // Include the head layout file for the HTML page
    include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <?php // Include the menu layout file
    include('../layout/admin/menu.php'); ?>
    <div class="content-wrapper">
        <br>
        <div class="container">


        <div class="row">
            <div class="col-md-6">
            <div class="alert alert-secondary" role="alert">
            <center><h2>Listado de espacios</h2></center>
            </div>
            </div>
        </div>
           
           



        <br>

        <script>
            // Initialize DataTable when the document is ready
            $(document).ready(function() {
                $('#table_id').DataTable( {
                    "pageLength": 5, // Set number of rows per page
                    "language": {
                        "emptyTable": "No hay información", // Message when table is empty
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Espacios", // Info text
                        "infoEmpty": "Mostrando 0 a 0 de 0 Espacios", // Info text when table is empty
                        "infoFiltered": "(Filtrado de _MAX_ total Espacios)", // Filter info text
                        "lengthMenu": "Mostrar _MENU_ Espacios", // Length menu text
                        "loadingRecords": "Cargando...", // Loading text
                        "processing": "Procesando...", // Processing text
                        "search": "Buscador:", // Search box label
                        "zeroRecords": "Sin resultados encontrados", // No records found text
                        "paginate": {
                            "first": "Primero", // First page button text
                            "last": "Ultimo", // Last page button text
                            "next": "Siguiente", // Next page button text
                            "previous": "Anterior" // Previous page button text
                        }
                    }
                });
            });
        </script>

        <div class="row">
            <div class="col-md-6">
                <table id="table_id" class="table table-bordered table-sm table-striped">
                   <thead>
                   <th><center>Nro</center></th>
                   <th>Nro espacio</th>
                   <th><center>Acción</center></th>
                   </thead>
                    <tbody>
                    <?php
                    $contador = 0;
                    // Prepare and execute the query to get all active spaces
                    $query_mapeos = $pdo->prepare("SELECT * FROM tb_mapeos WHERE estado = '1' ");
                    $query_mapeos->execute();
                    $mapeos = $query_mapeos->fetchAll(PDO::FETCH_ASSOC);
                    foreach($mapeos as $mapeo){
                        $id_map = $mapeo['id_map'];
                        $nro_espacio = $mapeo['nro_espacio'];
                        $contador = $contador + 1; // Increment the counter
                        ?>
                        <tr>
                            <td><center><?php echo $contador; // Display the counter ?></center></td>
                            <td><?php echo $nro_espacio; // Display the space number ?></td>
                            <td>
                                <center>
                                    <a href="delete.php?id=<?php echo $id_map; ?>" class="btn btn-danger">Borrar</a> <!-- Link to delete action -->
                                </center>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </div>
        </div>

        <hr>
        <a href="generar-reporte.php" class="btn btn-primary">Generar reporte
            <i class="fa fa">
                <!-- SVG icon for the report generation button -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-bar-graph" viewBox="0 0 16 16">
                    <path d="M10 13.5a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-6a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v6zm-2.5.5a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1zm-3 0a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-1z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg>
            </i>
        </a>

    </div>

</div>
<!-- /.content-wrapper -->
<?php // Include the footer layout file
include('../layout/admin/footer.php'); ?>
</div>
<?php // Include footer link scripts
include('../layout/admin/footer_link.php'); ?>
</body>
</html>

