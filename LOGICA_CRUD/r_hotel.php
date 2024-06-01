<?php
include "db/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $ubicacion = $_POST['ubicacion'];
        $telefono = $_POST['telefono'];
        $valoracion = $_POST['valoracion'];

        $sql = "INSERT INTO Hoteles (id, name, ubicacion, telefono, valoracion) VALUES ('$id', '$name', '$ubicacion', '$telefono', '$valoracion')";
        mysqli_query($db, $sql);

        echo "Reservación agregada exitosamente!";
    } elseif ($action == 'edit') {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $ubicacion = $_POST['edit_ubicacion'];
        $telefono = $_POST['edit_telefono'];
        $valoracion = $_POST['edit_valoracion'];

        $sql = "UPDATE Hoteles SET name='$name', ubicacion='$ubicacion', telefono='$telefono', valoracion='$valoracion' WHERE id='$id'";
        mysqli_query($db, $sql);

        echo "Reservación actualizada exitosamente!";

    } elseif ($action == 'delete') {
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM Hoteles WHERE id='$id'";
        mysqli_query($db, $sql);

        echo "Reservación eliminada exitosamente!";
    }
} else {
    $sql = "SELECT * FROM Hoteles";
    $result = mysqli_query($db, $sql);
}
?>
