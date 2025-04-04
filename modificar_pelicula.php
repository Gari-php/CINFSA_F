<?php
// Conexión a la base de datos
$id_pelicula = $_GET['id'];
$mysql = new mysqli("localhost", "root", "", "cinfsa_proyecto") or die("Error de conexión");

// Obtener los datos de la película seleccionada por su ID
$listapelicula = $mysql->query("SELECT 
    peliculas.id_pelicula,
    peliculas.titulo_pelicula,
    peliculas.sinopsis_pelicula,
    peliculas.anyo_pelicula,
    peliculas.duracion_pelicula,
    estados_peliculas.nombre_estado_pelicula AS estado,
    tipos_clasificaciones.nombre_tipo_clasificacion AS clasificacion,
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
    peliculas.id_pelicula = $id_pelicula
GROUP BY 
    peliculas.id_pelicula;") or die("Error de SQL");

// Obtener los datos de la película
foreach ($listapelicula as $peli) {

$titulo = $peli['titulo_pelicula'];
$sinopsis = $peli['sinopsis_pelicula'];
$anyo = $peli['anyo_pelicula'];
$duracion = $peli['duracion_pelicula'];
$estado_pelicula = $peli['estado']; // Aquí usas el valor 'estado' ya que lo seleccionas en la consulta SQL
$clasificacion = $peli['clasificacion']; // Lo mismo para clasificación
$idioma = $peli['idioma']; // Y lo mismo para idioma
$generos = $peli['generos'];
}

?>

<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"> <!-- Codificación UTF-8 -->
    <title>Editar Película</title>
    <style>
    body {
        background-color: #F98E1B; 
        color: #333;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    
    .form-title {
        color: #FF4500;
        font-size: 2em;
        margin-top: 0;
        text-align: center;
    }

    
    .cancel-button {
        color: white;
        background-color: #FF4500;
        padding: 8px 15px;
        text-decoration: none;
        font-weight: bold;
        border-radius: 5px;
        display: inline-block;
        margin-top: 10px;
        transition: background-color 0.3s;
    }

    .cancel-button:hover {
        background-color: #cc3700;
    }

    
    form {
        background-color: white;
        border: solid 3px #FF4500;
        width: 800%;
        max-width: 500px;
        margin: 20px;
        padding: 20px;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        font-size: 1.1em;
        color: #333;
        margin-top: 15px;
        text-align: left;
    }

    input[type="text"],
    input[type="number"],
    select,
    textarea {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f5f5f5;
        color: #333;
        font-size: 1em;
    }

    textarea {
        resize: vertical;
    }

    input[type="text"]:focus,
    input[type="number"]:focus,
    select:focus,
    textarea:focus {
        border-color: #FF4500;
        outline: none;
    }

    
    input[type="submit"] {
        background-color: #FF4500;
        color: white;
        border: none;
        padding: 12px;
        font-size: 1.1em;
        width: 100%;
        border-radius: 5px;
        cursor: pointer;
        font-weight: bold;
        margin-top: 20px;
    }

    input[type="submit"]:hover {
        background-color: #cc3700;
    }

    select {
        background-color: #f5f5f5;
        color: #333;
    }

    select option {
        background-color: #f5f5f5;
        color: #333;
    }

    
    .form-logo {
        width: 300px; /* Ajusta el tama�o seg�n lo necesites */
        display: block;
        margin: 0 auto 20px; /* Centra la imagen y a�ade espacio debajo */
    }
</style>
</head>
    <script>
        // Función para mostrar un cuadro de confirmación
        function confirmarEnvio() {
            return confirm("¿Estás seguro de que quieres modificar los datos de esta película?");
        }
    </script>
<body>
<center>
	<h1 class="form-title">Modificar Película</h1>
	<img src="Logo_cinfsa.jpeg" alt="Logo del cine" class="form-logo">
    <a href="listado_peliculas.php">Cancelar</a>
	
    <form method="post" action="update.php" onsubmit="return confirmarEnvio()">
        <input type="hidden" name="id" value="<?php echo $id_pelicula; ?>" readonly>

         <p>Ingresar título</p>
         <input type="text" name="titulo_pelicula" required value="<?php echo $titulo; ?>">
			
		 <p>Ingresar sinopsis</p>
         <input type="text" name="sinopsis_pelicula" required value="<?php echo $sinopsis; ?>">
			
	     <p>Ingresar año</p>
         <input type="number" name="anyo_pelicula" required value="<?php echo $anyo; ?>">
			
			
         <p>Ingresar duración (minutos)</p>
        <input type="number" name="duracion_pelicula" required value="<?php echo $duracion; ?>">

           
        <p> Ingresar Estado de la Pelicula:
        <select name="rela_estado_pelicula" required> 
            <option value="1">Emisión</option>
            <option value="2">Próximamente</option>
            <option value="3">Finalizada</option>
        
        </select><br><br>
		</p>
        <p> Ingresar Clasificacion:
        <select name="rela_tipo_clasificacion" required>
            <option value="1">ATP (Apto para todo público)</option>
            <option value="2">+13 (Apto para mayores de 13)</option>
            <option value="3">+16 (Apto para mayores de 16)</option>
            <option value="4">+18 (Apto para mayores de 18)</option>
          
        </select><br><br>
		</p>
        <p> Ingresar idioma:
        <select name="rela_idioma_pelicula" required>
            <option value="1">Castellano</option>
            <option value="2">Inglés Subtitulado</option>
           
        </select><br><br>
		</p>
       <p> Ingresar Generos:
        <select name="generos[]" multiple required>
			
            <option value="1">Acción</option>
			<option value="2">Comedia</option>
			<option value="3">Drama</option>
            <option value="4">Ciencia ficcion</option>
            <option value="5">Fantasia</option>
            <option value="6">Terror</option>
		    <option value="7">Romance</option>
			<option value="8">Animacion</option>
			<option value="9">Mucical</option>
			<option value="10">Documental</option>
			<option value="11">Policial</option>
			<option value="12">Thriller</option>
			<option value="13">Aventura</option>
			<option value="15">Crimen</option>
			<option value="16">Sustenso</option>
           
        </select>
		</p>
        <p style="font-size: 0.9em; color: gray;">Manten presionada la tecla Ctrl (Cmd en Mac) para seleccionar múltiples géneros.</p>
            <p>
                <input type="submit" name="Submit" value="Enviar">
            </p>
        </form>
	</center>
   
</body>
</html>