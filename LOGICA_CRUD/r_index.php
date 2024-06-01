<?php
include "db/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $ubicacion = $_POST['ubicacion'];
        $entrada = $_POST['entrada'];
        $salida = $_POST['salida'];
        $huespedes = $_POST['huespedes'];
        $habitaciones = $_POST['habitaciones'];
        $nro_habitacion = $_POST['nro_habitacion'];
        $tipo_hospedaje = $_POST['tipo_hospedaje'];
        $precio = $_POST['precio'];

        $sql = "INSERT INTO Reservaciones (id, name, lastname, ubicacion, entrada, salida, huespedes, habitaciones, nro_habitacion, tipo_hospedaje, precio) VALUES ('$id', '$name', '$lastname', '$ubicacion', '$entrada', '$salida', '$huespedes', '$habitaciones', '$nro_habitacion', '$tipo_hospedaje', '$precio')";
        mysqli_query($db, $sql);

        echo "Reservación agregada exitosamente!";
    } elseif ($action == 'edit') {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $lastname = $_POST['edit_lastname'];
        $ubicacion = $_POST['edit_ubicacion'];
        $entrada = $_POST['edit_entrada'];
        $salida = $_POST['edit_salida'];
        $huespedes = $_POST['edit_huespedes'];
        $habitaciones = $_POST['edit_habitaciones'];
        $nro_habitacion = $_POST['edit_nro_habitacion'];
        $tipo_hospedaje = $_POST['edit_tipo_hospedaje'];
        $precio = $_POST['edit_precio'];

        $sql = "UPDATE Reservaciones SET name='$name', lastname='$lastname', ubicacion='$ubicacion', entrada='$entrada', salida='$salida', huespedes='$huespedes', habitaciones='$habitaciones', nro_habitacion='$nro_habitacion', tipo_hospedaje='$tipo_hospedaje', precio='$precio' WHERE id='$id'";
        mysqli_query($db, $sql);

        echo "Reservación actualizada exitosamente!";
    } elseif ($action == 'delete') {
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM Reservaciones WHERE id='$id'";
        mysqli_query($db, $sql);

        echo "Reservación eliminada exitosamente!";
    }
} else {
    // Code to fetch and display data
    $sql = "SELECT * FROM Reservaciones";
    $result = mysqli_query($db, $sql);
    // Output your table rows
}
?>
