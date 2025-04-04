<?php

$mysql = new mysqli("localhost", "root", "", "cinfsa_proyecto") or die("Error de conexi�n");



function exportarReporte($query, $nombreArchivo, $mysql) {
    
    header("Content-Type: application/vnd.ms-excel");// tipo excel
    header("Content-Disposition: attachment; filename=$nombreArchivo.xls");
    header("Pragma: no-cache");
    header("Expires: 0");

    $resultado = $mysql->query($query) or die("Error en la consulta");
    //información sobre las columnas
    $columnas = $resultado->fetch_fields();
    //para extraer el nombre de cada columna 
    echo implode("\t", array_map(fn($col) => $col->name, $columnas)) . "\n";
    
    //Recupera cada fila del resultado como un arreglo asociativo.
    while ($fila = $resultado->fetch_assoc()) {
        //Obtiene solo los valores (sin las claves) del arreglo asociativo.
        echo implode("\t", array_values($fila)) . "\n";
    }
    exit;
}

//Se verifica si el parámetro reporte fue enviado por el usuario a través de la URL
//Si el parámetro está definido, se almacena en $reporte.
if (isset($_GET['reporte'])) {
    $reporte = $_GET['reporte'];

    
    $reportes = [
        'capacidad_salas' => [
            'query' => "SELECT 
                        salas.id_sala, 
                        salas.capacidad_sala AS max_butacas 
                    FROM salas
                    ORDER BY salas.capacidad_sala DESC
                    LIMIT 3;",
			'nombre' => 'Reporte_capacidad_Salas'
        ],
        'peliculas_clasificacion' => [
            'query' => "SELECT 
                            peliculas.titulo_pelicula AS 'T�tulo',
                            tipos_clasificaciones.nombre_tipo_clasificacion AS 'Clasificaci�n',
                            peliculas.anyo_pelicula AS 'A�o',
                            peliculas.duracion_pelicula AS 'Duraci�n (mins)'
                        FROM peliculas
                        INNER JOIN tipos_clasificaciones ON peliculas.rela_tipo_clasificacion = tipos_clasificaciones.id_tipo_clasificacion
                        ORDER BY peliculas.titulo_pelicula;",
            'nombre' => 'Reporte_Peliculas_Por_Clasificacion'
        ],
		'peliculas_x_generos' => [
			'query'  =>  "SELECT
		 generos_peliculas.genero_pelicula, COUNT(generos_x_peliculas.id_genero_x_pelicula) 
AS total_peliculas FROM generos_x_peliculas JOIN generos_peliculas ON generos_x_peliculas.rela_genero_pelicula = generos_peliculas.id_genero_pelicula
GROUP BY generos_peliculas.genero_pelicula
HAVING total_peliculas >= 3;",

 			'nombre' => 'Reporte_peliculas_x_generos'
 		],
		'butacas_X_peliculas' => [
		'query' => "SELECT 
    						p.titulo_pelicula,
    		SUM(dfc.cantidad) AS total_butacas_reservadas FROM peliculas p
		JOIN funciones f ON p.id_pelicula = f.rela_peliculas
		JOIN detalle_fact_cine dfc ON f.id_funcion = dfc.rela_funcion
					WHERE p.titulo_pelicula = 'guason 2';",
			'nombre' => 'butacas_X_peliculas'
		]

];
    //para comprobar si el reporte solicitado ($reporte) existe en el arreglo $reportes.
    if (array_key_exists($reporte, $reportes)) {
        exportarReporte($reportes[$reporte]['query'], $reportes[$reporte]['nombre'], $mysql);
    } else {
        die("Reporte no válido.");
    }
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Módulo de Reportes</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background: linear-gradient(135deg, #FF7F50, #FF4500); 
        text-align: center;
        color: white;
        margin: 0;
        padding: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    h1 {
        margin-top: 20px;
        font-size: 2.5em;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); 
    }

    p {
        font-size: 1.2em;
        margin-bottom: 20px;
    }

    .boton {
        color: white;
        background: linear-gradient(135deg, #FF6347, #FF0000); 
        padding: 15px 30px;
        text-decoration: none;
        border-radius: 25px; 
        font-weight: bold;
        font-size: 1.1em;
        margin: 10px;
        display: inline-block;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); 
        transition: all 0.3s ease; 
    }

    .boton:hover {
        background: linear-gradient(135deg, #FF4500, #FF6347); /* Cambiar gradiente al pasar el ratón */
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.5); /* Intensificar la sombra */
        transform: scale(1.05); /* Aumentar ligeramente el tamaño */
    }

    .boton:active {
        background: linear-gradient(135deg, #FF6347, #FF4500); /* Cambiar gradiente al presionar */
        transform: scale(0.98); /* Reducir ligeramente el tamaño */
    }

   
    .container {
        text-align: center;
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background: rgba(255, 255, 255, 0.1); /* Fondo semitransparente */
        border-radius: 15px;
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3); /* Sombra del contenedor */
    }
</style>
</head>
<body>
    <h1>Módulo de Reportes</h1>
    <p>Seleccione un reporte para exportar a Excel:</p>
    <a href="modulo_reportes.php?reporte=capacidad_salas" class="boton">Reporte:Capasidad Salas</a>
    <a href="modulo_reportes.php?reporte=peliculas_clasificacion" class="boton">Reporte:Películas por Clasificacin</a>
	<a href="modulo_reportes.php?reporte=peliculas_x_generos" class="boton">Reporte:Generos con 3 o Mas peliculas</a>
	<a href="modulo_reportes.php?reporte=butacas_X_peliculas" class="boton">Reporte:Butacas reservadas para X pelicula</a>
	
</body>
</body>
</html>
