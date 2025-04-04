<?php
$mysql = new mysqli("localhost", "root", "", "cinfsa_proyecto") or die("error de conexion");

$id_pelicula = $_POST['id'];
$titulo = $_POST['titulo_pelicula'];
$sinopsis = $_POST['sinopsis_pelicula'];
$anyo = $_POST['anyo_pelicula'];
$duracion = $_POST['duracion_pelicula'];
$estado_pelicula = $_POST['rela_estado_pelicula'];
$clasificacion = $_POST['rela_tipo_clasificacion'];
$idioma = $_POST['rela_idioma_pelicula'];
$generos = $_POST['generos']; // Suponiendo que los g�neros se env�an como un array de IDs

// Iniciar la transacci�n
$mysql->begin_transaction();

try {
    // Actualizar los campos de la tabla peliculas
    $sqlUpdatePelicula = "
    UPDATE peliculas
    SET
        titulo_pelicula = '$titulo',
        sinopsis_pelicula = '$sinopsis',
        anyo_pelicula = '$anyo',
        duracion_pelicula = '$duracion',
        rela_estado_pelicula = '$estado_pelicula',
        rela_tipo_clasificacion = '$clasificacion',
        rela_idioma_pelicula = '$idioma'
    WHERE id_pelicula = '$id_pelicula'";

    $mysql->query($sqlUpdatePelicula) or die("error en sql de pelicula");

    // Obtener los g�neros actuales de la pel�cula
    $sqlCurrentGeneros = "SELECT rela_genero_pelicula FROM generos_x_peliculas WHERE rela_pelicula = '$id_pelicula'";
    $result = $mysql->query($sqlCurrentGeneros);

    $currentGeneros = [];
    while ($row = $result->fetch_assoc()) {
        $currentGeneros[] = $row['rela_genero_pelicula'];
    }

    // Determinar los g�neros que deben insertarse
    $generosToInsert = array_diff($generos, $currentGeneros);

    // Determinar los g�neros que deben eliminarse
    $generosToDelete = array_diff($currentGeneros, $generos);

    // Insertar los g�neros que faltan
    foreach ($generosToInsert as $genero) {
        $sqlInsertGenero = "INSERT INTO generos_x_peliculas (rela_genero_pelicula, rela_pelicula) VALUES ('$genero', '$id_pelicula')";
        $mysql->query($sqlInsertGenero) or die("error en sql de insercion de generos");
    }

    // Eliminar los g�neros que ya no deber�an estar asignados
    foreach ($generosToDelete as $genero) {
        $sqlDeleteGenero = "DELETE FROM generos_x_peliculas WHERE rela_genero_pelicula = '$genero' AND rela_pelicula = '$id_pelicula'";
        $mysql->query($sqlDeleteGenero) or die("error en sql de eliminacion de generos");
    }

    // Confirmar transacci�n
    $mysql->commit();

    // Redireccionar despu�s de la actualizaci�n
    echo header('location: listado_peliculas.php');
} catch (Exception $e) {
    // En caso de error, deshacer cambios
    $mysql->rollback();
    echo "Error en la actualizaci�n: " . $e->getMessage();
}

// Cerrar conexi�n
$mysql->close();
?>