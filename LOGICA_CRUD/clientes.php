<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Formulario :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="funciones.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <img src="https://i.pinimg.com/736x/ab/fd/b5/abfdb5401c83ab54941bc454a04652e6.jpg" alt="" id="img2" width="30" height="24">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Reservacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="hoteles.php">Hoteles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Clientes</h1>
    <button class='btn btn-success open-modal' id="a2" data-bs-toggle='modal' data-bs-target='#registroModal' onclick="deleteModal()" >Agregar Nuevo</button></td>
    <!--Inicio Modal-->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Reservacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="text" name="id" id="id" class="form-control" placeholder="Id" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="name" id="name" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellido" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="correo_electronico" id="correo_electronico" class="form-control" placeholder="Correo Electronico" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="forma_pago" id="forma_pago" class="form-control" placeholder="Forma de Pago" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="p-2">
                            <button type="submit" class="btn btn-success boton" data-bs-dismiss="modal">Reservar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal-->

    <?php
    include 'db/db.php';

    $sql = "SELECT * FROM Reservaciones";
    $result = mysqli_query($db, $sql);

    ?>
    <table id="dataTable" border="1">
        <thead>
            <tr>
            <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo Electronico</th>
                <th>Telefono</th>
                <th>Forma de pago</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                #<td><a href='views/eliminar.php'><img src='icons/trash-solid.svg'></a></td>
                echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[lastname]</td>
                        <td>$row[correo_electronico]</td>
                        <td>$row[telefono]</td>
                        <td>$row[forma_pago]</td>
                        <td><a href='views/editar.php?id=$row[id]' class='btn btn-warning'><img src='icons/pencil-solid.svg'></a></td>
                        <td><button class='btn btn-danger open-modal' data-id=$row[id] data-bs-toggle='modal' data-bs-target='#exampleModal'><img src='icons/trash-solid.svg'></button></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
    <div id="response"><
    <!--Consulta ajax-->
    <script>
        $(document).ready(function() {
            $('#myForm').on('submit', function(event) {
                event.preventDefault(); // Evitar que el formulario se envíe de la manera tradicional

                $.ajax({
                    url: 'respuesta_ajax.php',
                    type: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            $('#dataTable tbody').append(
                                '<tr><td>' + response.data.id + '</td><td>' + response.data.name + '</td><td>' + response.data.lastname + '</td><td>' + response.data.job + '</td><td>' + response.data.enable + '</td>'+'<td><a href="views/editar.php?id=$row[id]" class="btn btn-warning"><img src="icons/pencil-solid.svg"></a></td>'+'<td><button class="btn btn-danger open-modal" data-id=$row[id] data-bs-toggle="modal" data-bs-target="#exampleModal"><img src="icons/trash-solid.svg"></button></td></tr>');
                            $('#response').html('<p>' + response.message + '</p>');
                        } else {
                            $('#response').html('<p>' + response.message + '</p>');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                        $('#response').html('Ocurrió un error al enviar el formulario.');
                    }
                });
            });
        });
    </script>
    <!--Fin ajax-->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- <form method="post"> -->
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desear eliminar?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form enctype="multipart/form-data" method="post">
                        <input type="text" class="form-control" name="deleteId" id="deleteId" disabled>
                        <button type="submit" class="btn btn-primary" name="save" onclick="deleteRecord()">Save changes</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- <button type="submit" class="btn btn-primary" name="save">Save changes</button> -->
                </div>
                <!-- </form> -->
            </div>
        </div>
    </div>
    <!-- Modal -->
</body>

</html>