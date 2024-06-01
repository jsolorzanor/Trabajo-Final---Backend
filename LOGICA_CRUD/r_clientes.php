<?php
include "db/db.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];

    if ($action == 'add') {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];
        $pago = $_POST['pago'];

        $sql = "INSERT INTO Clientes (id, name, lastname, correo_electronico, telefono, forma_pago) VALUES ('$id', '$name', '$lastname', '$correo', '$telefono', '$pago')";
        mysqli_query($db, $sql);

        echo "Reservación agregada exitosamente!";
    } elseif ($action == 'edit') {
        $id = $_POST['edit_id'];
        $name = $_POST['edit_name'];
        $lastname = $_POST['edit_lastname'];
        $correo = $_POST['edit_correo'];
        $telefono = $_POST['edit_telefono'];
        $pago = $_POST['edit_pago'];


        $sql ="UPDATE Clientes SET name='$name', lastname='$lastname', correo_electronico='$correo', telefono='$telefono', forma_pago='$pago' WHERE id='$id' ";
        mysqli_query($db, $sql);

        echo "Reservación actualizada exitosamente!";
    } elseif ($action == 'delete') {
        $id = $_POST['delete_id'];
        
        $sql = "DELETE FROM Clientes WHERE id='$id'";
        mysqli_query($db, $sql);

        echo "Reservación eliminada exitosamente!";
    }
} else {
    // Code to fetch and display data
    $sql = "SELECT * FROM Clientes";
    $result = mysqli_query($db, $sql);
    // Output your table rows
}
?>
