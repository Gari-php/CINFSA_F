<?php
// Conexi�n a la base de datos
$conn = new mysqli('localhost', 'root', '', 'cinfsa_proyecto');

if ($conn->connect_error) {
    die("Error de conexi�n: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $dni = $_POST['dni'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Insertar en la tabla personas
    $sql_persona = "INSERT INTO personas (nombre_persona, apellido_persona, dni) VALUES (?, ?, ?)";
    $stmt_persona = $conn->prepare($sql_persona);
    $stmt_persona->bind_param("sss", $nombre, $apellido, $dni);
    $stmt_persona->execute();
    $persona_id = $stmt_persona->insert_id;
    $stmt_persona->close();

    // Insertar en la tabla usuarios
    $sql_usuario = "INSERT INTO usuarios (nombre_usuario, clave_acceso, rela_persona) VALUES (?, ?, ?)";
    $stmt_usuario = $conn->prepare($sql_usuario);
    $stmt_usuario->bind_param("ssi", $username, $password, $persona_id);
    $stmt_usuario->execute();
    $stmt_usuario->close();

    echo "Registro exitoso. Ahora puedes <a href='index.html'>iniciar sesi�n</a>.";
}
$conn->close();
?>