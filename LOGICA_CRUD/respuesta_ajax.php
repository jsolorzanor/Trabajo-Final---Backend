<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura los datos del formulario
    $id = $_POST["id"];
    $nombre = $_POST["name"];
    $apellido = $_POST["lastname"];
    $job = $_POST["job"];
    $enable = isset($_POST["enable"]) ? 1 : 0;

    // Prepara la consulta SQL para insertar los datos en la tabla
    include "db/db.php";

    $sql = "INSERT INTO Profesor (id, name, lastname, job, enable) 
            VALUES ($id, '$nombre', '$apellido', '$job', $enable)";

    // Ejecuta la consulta SQL
    if ($db->query($sql) === TRUE) {
        // Si la inserción fue exitosa, crea la respuesta JSON con éxito
        $response = array(
            'status' => 'success',
            'message' => "",
            'data' => array(
                'id' => $id,
                'name' => $nombre,
                'lastname' => $apellido,
                'job' => $job,
                'enable' => $enable
            )
        );
    } else {
        // Si hubo un error en la inserción, crea la respuesta JSON con error
        $response = array(
            'status' => 'error',
            'message' => "" . $db->error
        );
    }

    // Cierra la conexión a la base de datos
    $db->close();

    // Devuelve la respuesta JSON
    echo json_encode($response);
} else {
    // Si la solicitud no es de tipo POST, crea la respuesta JSON con error
    $response = array(
        'status' => 'error',
        'message' => 'Solicitud no válida.'
    );

    echo json_encode($response);
}
?>
