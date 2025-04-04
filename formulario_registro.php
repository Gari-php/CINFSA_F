<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
</head>
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

<body>
    <h2>Registro de Usuario</h2>
    <form action="Registro.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" required>
        <br>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" required>
        <br>
        <label for="username">Nombre Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contrase�a:</label>
        <input type="password" name="password" required>
        <br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>