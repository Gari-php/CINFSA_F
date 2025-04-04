<!DOCTYPE HTML>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Formulario de Carga de Películas</title>
<style>
    body {
        background-color: #F98E1B; /* Fondo naranja */
        color: #333;
        font-family: Arial, sans-serif;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        margin: 0;
    }

    /* Estilo para el t�tulo */
    .form-title {
        color: #FF4500; /* Rojo similar al logo de cine */
        font-size: 2em;
        margin-top: 0;
        text-align: center;
    }

    /* Estilo para el bot�n "Cancelar" */
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

    /* Contenedor del formulario */
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

    /* Estilo para etiquetas y campos de entrada */
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

    /* Estilo para el bot�n de enviar */
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

    /* Ajustes para los selectores de opciones */
    select {
        background-color: #f5f5f5;
        color: #333;
    }

    select option {
        background-color: #f5f5f5;
        color: #333;
    }

    /* Estilo para la imagen del logo */
    .form-logo {
        width: 300px; /* Ajusta el tama�o seg�n lo necesites */
        display: block;
        margin: 0 auto 20px; /* Centra la imagen y a�ade espacio debajo */
    }
</style>
</head>

<body>
<div>
	
    
    <h1 class="form-title">Agregar Nueva Película</h1>
	<center>
    <a href="listado_peliculas.php" class="cancel-button">Cancelar</a>
	</center>
	<img src="Logo_cinfsa.jpeg" alt="Logo del cine" class="form-logo">
    <form method="post" action="insert_pelicula.php">
        <label for="titulo_pelicula">Título de la película:</label>
        <input type="text" name="titulo_pelicula" required>

        <label for="sinopsis_pelicula">Sinopsis:</label>
        <textarea name="sinopsis_pelicula" required></textarea>

        <label for="anyo_pelicula">Año:</label>
        <input type="number" name="anyo_pelicula" required>

        <label for="duracion_pelicula">Duración (minutos):</label>
        <input type="number" name="duracion_pelicula" required>

        <label for="rela_estado_pelicula">Estado:</label>
        <select name="rela_estado_pelicula" required>
            <option value="1">Emisión</option>
            <option value="2">Próximamente</option>
            <option value="3">Finalizada</option>
        </select>

        <label for="rela_tipo_clasificacion">Clasificación:</label>
        <select name="rela_tipo_clasificacion" required>
            <option value="1">ATP (Apto para todo público)</option>
            <option value="2">+13 (Apto para mayores de 13)</option>
            <option value="3">+16 (Apto para mayores de 16)</option>
            <option value="4">+18 (Apto para mayores de 18)</option>
        </select>

        <label for="rela_idioma_pelicula">Idioma:</label>
        <select name="rela_idioma_pelicula" required>
            <option value="1">Castellano</option>
            <option value="2">Inglés Subtitulado</option>
        </select>

        <label for="generos">Géneros:</label>
        <select name="generos[]" multiple required>
			
            <option value="1">Acción</option>
            <option value="2">Comedia</option>
            <option value="3">Drama</option>
            <option value="4">Ciencia ficción</option>
            <option value="5">Fantasía</option>
            <option value="6">Terror</option>
            <option value="7">Romance</option>
            <option value="8">Animación</option>
            <option value="9">Musical</option>
            <option value="10">Documental</option>
            <option value="11">Policial</option>
            <option value="12">Thriller</option>
            <option value="13">Aventura</option>
            <option value="15">Crimen</option>
            <option value="16">Suspenso</option>
        </select>
        <p style="font-size: 0.9em; color: gray;">Mantén presionada la tecla Ctrl (Cmd en Mac) para seleccionar múltiples géneros.</p>

        <p> 
            <input type="submit" value="Agregar">
        </p>
    </form>
</div>
</body>
</html>