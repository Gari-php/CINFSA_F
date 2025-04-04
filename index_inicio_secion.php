<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
</head>
<center>
   <h2>Iniciar Sesión</h2>
<style>
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #F98E1B;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .form-container {
            background: #F98E1B;
            padding: 30px 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #444;
        }

        label {
            display: block;
            margin-top: 10px;
            text-align: left;
            font-weight: bold;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #1e90ff;
            box-shadow: 0 0 5px rgba(30, 144, 255, 0.5);
        }

        button {
            margin-top: 20px;
            padding: 10px 15px;
            width: 100%;
            background: red;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background-color: darkred; 
    		text-decoration: underline; 
        }

        p {
            margin-top: 15px;
            font-size: 14px;
            color: #555;
        }

        p a {
            color: #1e90ff;
            text-decoration: none;
            font-weight: bold;
        }

        p a:hover {
            text-decoration: underline;
        }
		.form-logo {
        width: 300px; 
        display: block;
        margin: 0 auto 20px; 
    }
	.boton {
    	color: white; 
    	text-decoration: none; 
    	background-color: red; 
    	padding: 10px 20px; 
    	border-radius: 5px; 
    	font-size: 1.1em; 
    	font-weight: bold; 
    	display: inline-block; 
    	transition: background-color 0.3s ease; 
}
    </style>
<body>

 	<img src="Logo_cinfsa.jpeg" alt="Logo del cine" class="form-logo">
	
    <form action="validarLogin.php" method="POST">
        <label for="username">Usuario:</label>
        <input type="text" name="username" required>
        <br>
        <label for="password">Contraseña:</label>
        <input type="password" name="password" required>
        <br>
        <a href="Pagina_principal.php" class="boton">Inicior Secion</a>
    </form>
    <p>No tienes cuenta? <a href="formulario_registro.php">Regístrate aquí</a></p>
</body></center>	

</html>