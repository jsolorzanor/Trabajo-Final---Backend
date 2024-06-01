<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.: Reservaciones :.</title>
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="funciones.js"></script>
</head>
<style>
    body {
    background-image: url(img/fondoprueba3.jpg);
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    height: 100vh;
    margin: 0;
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
    <style>
    h1{
    margin-top: 10px;
    width: 500px;
    border-radius: 5px;
    margin-left: 36%;
    background-color: white;
    }
</style>
    <h1>Reservaciones</h1>
    <button class='btn btn-success open-modal' id="a2" data-bs-toggle='modal' data-bs-target='#registroModal'>Reservar</button></td>

    <!-- Modal para agregar-->
    <style>
        .modal-content {
    background-image: url(img/fondo5.jpg);
    border: none;
    border-radius: 10px;
    }
    </style>
    <div class="modal fade" id="registroModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aqui hara su reservacion</h5>
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
                                <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Apellido" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="ubicacion" id="ubicacion" class="form-control" placeholder="Ubicacion" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="date" name="entrada" id="entrada" class="form-control" placeholder="Entrada" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="date" name="salida" id="salida" class="form-control" placeholder="Salida" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="huespedes" id="huespedes" class="form-control" placeholder="Huespedes" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="habitaciones" id="habitaciones" class="form-control" placeholder="Habitaciones" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="nro_habitacion" id="nro_habitacion" class="form-control" placeholder="Numero de habitaciones" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="tipo_hospedaje" id="tipo_hospedaje" class="form-control" placeholder="Tipo de hospedaje" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="precio" id="precio" class="form-control" placeholder="Precio" required>
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
    include "db/db.php";
    $sql = "SELECT * FROM Reservaciones";
    $result = mysqli_query($db, $sql);
    ?>
    <table id="dataTable" border="1">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Ubicacion</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Huespedes</th>
                <th>Habitaciones</th>
                <th>Numero de habitacion</th>
                <th>Tipo de hospedaje</th>
                <th>Precio</th>
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
                        <td>$row[lastname]</td>
                        <td>$row[ubicacion]</td>
                        <td>$row[entrada]</td>
                        <td>$row[salida]</td>
                        <td>$row[huespedes]</td>
                        <td>$row[habitaciones]</td>
                        <td>$row[nro_habitacion]</td>
                        <td>$row[tipo_hospedaje]</td>
                        <td>$row[precio]</td>
                        <td><button class='btn btn-warning edit-record' data-id='$row[id]' data-nombre='$row[name]' data-apellido='$row[lastname]' data-ubicacion='$row[ubicacion]' data-entrada='$row[entrada]' data-salida='$row[salida]' data-huespedes='$row[huespedes]' data-habitaciones='$row[habitaciones]' data-nro_habitacion='$row[nro_habitacion]' data-tipo_hospedaje='$row[tipo_hospedaje]' data-precio='$row[precio]' data-bs-toggle='modal' data-bs-target='#editarModal'><img src='icons/pencil-solid.svg'></button></td>
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
                    <h5 class="modal-title">Editar Reservación</h5>
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
                                <input type="text" name="edit_lastname" id="edit_lastname" class="form-control" placeholder="Apellido" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_ubicacion" id="edit_ubicacion" class="form-control" placeholder="Ubicacion" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="date" name="edit_entrada" id="edit_entrada" class="form-control" placeholder="Entrada" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="date" name="edit_salida" id="edit_salida" class="form-control" placeholder="Salida" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_huespedes" id="edit_huespedes" class="form-control" placeholder="Huespedes" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_habitaciones" id="edit_habitaciones" class="form-control" placeholder="Habitaciones" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_nro_habitacion" id="edit_nro_habitacion" class="form-control" placeholder="Numero de habitaciones" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_tipo_hospedaje" id="edit_tipo_hospedaje" class="form-control" placeholder="Tipo de hospedaje" required>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <input type="text" name="edit_precio" id="edit_precio" class="form-control" placeholder="Precio" required>
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
                    url: 'r_index.php',
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
                var lastname = $(this).data('apellido');
                var ubicacion = $(this).data('ubicacion');
                var entrada = $(this).data('entrada');
                var salida = $(this).data('salida');
                var huespedes = $(this).data('huespedes');
                var habitaciones = $(this).data('habitaciones');
                var nro_habitacion = $(this).data('nro_habitacion');
                var tipo_hospedaje = $(this).data('tipo_hospedaje');
                var precio = $(this).data('precio');

                $('#edit_id').val(id);
                $('#edit_name').val(name);
                $('#edit_lastname').val(lastname);
                $('#edit_ubicacion').val(ubicacion);
                $('#edit_entrada').val(entrada);
                $('#edit_salida').val(salida);
                $('#edit_huespedes').val(huespedes);
                $('#edit_habitaciones').val(habitaciones);
                $('#edit_nro_habitacion').val(nro_habitacion);
                $('#edit_tipo_hospedaje').val(tipo_hospedaje);
                $('#edit_precio').val(precio);
            });

            $('#editForm').submit(function(e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: 'r_index.php',
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
                    url: 'r_index.php',
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