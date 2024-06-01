<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Hoteles :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="funciones.js"></script>
</head>
<style>
    body{
        background-image: url(img/fondo5.jpg);
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Reservacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="clientes.php">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="hoteles.php">Hoteles</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h1>Hoteles</h1>
    <button class='btn btn-success open-modal' id="a2" data-bs-toggle='modal' data-bs-target='#registroModal'>Agregar Hotel</button></td>

    <!-- Modal para agregar-->
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Nueva Residencia</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="myForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="action" id="action" value="add">
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
                                <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicacion" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="telefono" id="telefono" class="form-control" placeholder="Telefono" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="valoracion" id="valoracion" class="form-control" placeholder="Valoracion" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="p-2">
                            <button type="submit" class="btn btn-success boton">Reservar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Fin Modal-->

    <?php
    include 'db/db.php';

    $sql = "SELECT * FROM Hoteles";
    $result = mysqli_query($db, $sql);

    ?>
    <table id="dataTable" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Ubicacion</th>
                <th>Telefono</th>
                <th>Valoracion</th>
                <th colspan="2">Accion</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[ubicacion]</td>
                        <td>$row[telefono]</td>
                        <td>$row[valoracion]</td>
                        <td><button class='btn btn-warning edit-record' data-id='$row[id]' data-nombre='$row[name]' data-ubicacion='$row[ubicacion]' data-telefono='$row[telefono]' data-valoracion='$row[valoracion]' data-bs-toggle='modal' data-bs-target='#editarModal'><img src='icons/pencil-solid.svg'></button></td>
                        <td><button class='btn btn-danger delete-record' data-id='$row[id]' data-bs-toggle='modal' data-bs-target='#eliminarModal'><img src='icons/trash-solid.svg'></button></td>
                    </tr>
                    ";
            }
            ?>
        </tbody>
    </table>
    <div id="response"></div>
    <!--Modal para editar-->
    <div class="modal fade" id="editarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar datos de Hotel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editForm">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="action" id="editAction" value="edit">
                                <input type="hidden" name="edit_id" id="edit_id">
                                <input type="text" name="edit_name" id="edit_name" class="form-control" placeholder="Nombre" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_ubicacion" id="edit_ubicacion" class="form-control" placeholder="Ubicacion" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_telefono" id="edit_telefono" class="form-control" placeholder="Telefono" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_valoracion" id="edit_valoracion" class="form-control" placeholder="Valoracion" required>
                            </div>
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="p-2">
                            <button type="submit" class="btn btn-success">Guardar Cambios</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal-->

    <!--Modal para eliminar-->
    <div class="modal fade" id="eliminarModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Eliminar Reservación</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="deleteForm">
                    <div class="modal-body">
                        <p>¿Está seguro de que desea eliminar esta reservación?</p>
                        <input type="hidden" name="action" id="deleteAction" value="delete">
                        <input type="hidden" name="delete_id" id="delete_id">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <div class="p-2">
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Fin Modal-->

    <script>
        $(document).ready(function() {
            $('#myForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'r_hotel.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#registroModal').modal('hide');
                        $('#response').html(response);
                        location.reload();
                    }
                });
            });

            $('.edit-record').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('nombre');
                var ubicacion = $(this).data('ubicacion');
                var telefono = $(this).data('telefono');
                var valoracion = $(this).data('valoracion');

                $('#edit_id').val(id);
                $('#edit_name').val(name);
                $('#edit_ubicacion').val(ubicacion);
                $('#edit_telefono').val(telefono);
                $('#edit_valoracion').val(valoracion);
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'r_hotel.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#editarModal').modal('hide');
                        $('#response').html(response);
                        location.reload();
                    }
                });
            });

            $('.delete-record').click(function() {
                var id = $(this).data('id');
                $('#delete_id').val(id);
            });

            $('#deleteForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'r_hotel.php',
                    data: $(this).serialize(),
                    success: function(response) {
                        $('#eliminarModal').modal('hide');
                        $('#response').html(response);
                        location.reload();
                    }
                });
            });
        });
    </script>

</body>

</html>