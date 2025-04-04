<?php

$conn = new mysqli('localhost', 'root', '', 'cinfsa_proyecto');

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //? son marcadores de posición que se remplazarán con valores de la tabla
    $sql = "SELECT * FROM usuarios WHERE nombre_usuario = ? AND clave_usuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    //obtener los resultados de la consulta.
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "Inicio de sesión exitoso. Bienvenido, $username.";
    } else {
        echo "Usuario o contraseña incorrectos. <a href='register.html'>Regístrate aquí</a>";
    }

    $stmt->close();
}
$conn->close();
?>