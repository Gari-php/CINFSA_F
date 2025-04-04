<?php

$mysql = new mysqli("localhost", "root", "", "cinfsa_proyecto") or die("error de conexion");

// Capturar datos del formulario
$titulo = $_POST['titulo_pelicula'];
$sinopsis = $_POST['sinopsis_pelicula'];
$anyo = $_POST['anyo_pelicula'];
$duracion = $_POST['duracion_pelicula'];
$estado = $_POST['rela_estado_pelicula'];
$clasificacion = $_POST['rela_tipo_clasificacion'];
$idioma = $_POST['rela_idioma_pelicula'];
$generos = $_POST['generos'];  // Suponiendo que los géneros son enviados como un array desde el formulario

// Preparar y ejecutar la consulta de inserción en la tabla peliculas
$sql = "INSERT INTO peliculas (titulo_pelicula, sinopsis_pelicula, anyo_pelicula, duracion_pelicula, rela_estado_pelicula, rela_tipo_clasificacion, rela_idioma_pelicula) 
        VALUES ('$titulo', '$sinopsis', $anyo, $duracion, $estado, $clasificacion, $idioma)";
$result = $mysql->query($sql);

// Verificar si el primer insert fue exitoso
if ($result) {
    // Obtener el id de la película insertada
    $id_pelicula = $mysql->insert_id;

    // Preparar y ejecutar las inserciones en la tabla generos_x_peliculas
    foreach ($generos as $id_genero) {
        $sql_genero = "INSERT INTO generos_x_peliculas (rela_genero_pelicula, rela_pelicula) VALUES ($id_genero, $id_pelicula)";
        $mysql->query($sql_genero);
    }

  
}
// Redirigir a la página listado_pelicula.php
echo header ('location: listado_peliculas.php');
$mysql->close();

?>