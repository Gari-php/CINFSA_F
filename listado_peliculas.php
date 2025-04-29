<?php

$mysql = new mysqli("localhost", "root", "", "cinfsa_proyecto") or die("Error de conexi�n");

$busqueda = '';


if (isset($_POST['busqueda'])) {
    $busqueda = $mysql->real_escape_string($_POST['busqueda']);
}

$listapelicula = $mysql->query("SELECT 
    peliculas.id_pelicula,
    peliculas.titulo_pelicula,
    peliculas.sinopsis_pelicula,
    peliculas.anyo_pelicula,
    peliculas.duracion_pelicula,
    estados_peliculas.nombre_estado_pelicula AS estado,
    tipos_clasificaciones.nombre_tipo_clasificacion AS tipo_clasificacion,
    idiomas_peliculas.nombre_idioma_pelicula AS idioma,
    GROUP_CONCAT(generos_peliculas.genero_pelicula SEPARATOR ', ') AS generos
FROM 
    peliculas
INNER JOIN 
    estados_peliculas ON peliculas.rela_estado_pelicula = estados_peliculas.id_estado_pelicula
INNER JOIN 
    tipos_clasificaciones ON peliculas.rela_tipo_clasificacion = tipos_clasificaciones.id_tipo_clasificacion
INNER JOIN 
    idiomas_peliculas ON peliculas.rela_idioma_pelicula = idiomas_peliculas.id_idioma_pelicula
INNER JOIN 
    generos_x_peliculas ON peliculas.id_pelicula = generos_x_peliculas.rela_pelicula
INNER JOIN 
    generos_peliculas ON generos_x_peliculas.rela_genero_pelicula = generos_peliculas.id_genero_pelicula
WHERE 
    peliculas.titulo_pelicula LIKE '%$busqueda%'
GROUP BY 
    peliculas.id_pelicula
ORDER BY 
    peliculas.titulo_pelicula;") or die("Error de SQL");
?>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Lista de Películas</title>
    <style>
       
        body {
            background-color: #dc2209;
            color: #FFFFFF;
            font-family: Arial, sans-serif;
            text-align: center;
        }
        h1 {
            color: #000000 ;
            font-size: 2.5em;
            margin-top: 30px;
        }
        a {
            color: red;
            text-decoration: none;
            font-weight: bold;
            margin-top: 20px;
            display: inline-block;
        }
        a:hover {
            text-decoration: underline;
        }
        /* Estilo de la tabla */
        table {
            width: 70%;
            margin: 20px auto;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #333;
        }
        th {
            background-color: black;
            color: white;
        }
        td {
            background-color: #444;
        }
        td a {
            color: red;
            text-decoration: none;
            font-weight: bold;
        }
        td a:hover {
            text-decoration: underline;
        }
        center {
            margin-top: 20px;
        }
		.form-logo {
        width: 300px; /* Ajusta el tama?o seg?n lo necesites */
        display: block;
        margin: 0 auto 20px; /* Centra la imagen y a?ade espacio debajo */
    }
	
	.boton {
    	color: white; 
    	text-decoration: none; 
    	background-color: #363130; 
    	padding: 10px 20px; 
    	border-radius: 5px; 
    	font-size: 1.1em; 
    	font-weight: bold; 
    	display: inline-block; 
    	transition: background-color 0.3s ease; 
}

	.boton:hover {
    	background-color: darkred; 
    	text-decoration: underline; 
}
    </style>
</head>
<body>
    <h1>Lista de Películas</h1>
	<img src="../ProyectoCINFSA_F/assets/img/LOGO.png" alt="Logo del cine" class="form-logo">
    <form method="POST" action="">
    <input type="text" name="busqueda" placeholder="Buscar por título..." value="<?php echo $busqueda; ?>" />
    <input type="submit" value="Buscar" class="boton" />
</form>
	
	<center>
        <a href="modulo_peliculas.php" class="boton">Agregar Película</a>
		<a href="modulo_reportes.php" class="boton">Formulario de Reportes</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Género</th>
                    <th>Clasificación</th>
                    <th>Idioma</th>
                    <th>Sinopsis</th>
                    <th>Año</th>
                    <th>Duración</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listapelicula as $peli) { ?>
                        <tr>
                            <td><?php echo $peli['id_pelicula']; ?></td>
                            <td><?php echo $peli['titulo_pelicula']; ?></td>
                            <td><?php echo $peli['generos']; ?></td>
                            <td><?php echo $peli['tipo_clasificacion']; ?></td>
                            <td><?php echo $peli['idioma']; ?></td>
                            <td><?php echo $peli['sinopsis_pelicula']; ?></td>
                            <td><?php echo $peli['anyo_pelicula']; ?></td>
                            <td><?php echo $peli['duracion_pelicula']; ?> mins</td>
                            <td><?php echo $peli['estado']; ?></td>
                            <td>
                                <a href="modificar_pelicula.php?id=<?php echo $peli['id_pelicula']; ?>">Actualizar</a>
                            </td>
							
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</body>
</html>