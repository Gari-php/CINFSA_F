<?php

$mysql = new mysqli("localhost", "root","", "cinfsa_proyecto") or die("Error de conexion: " . $mysql->connect_error);

$busqueda = '';

if (isset($_POST['busqueda'])) {
    $busqueda = $mysql->real_escape_string($_POST['busqueda']);
}

$listaproducto = $mysql->query("SELECT
    pc.id_producto_cantina,
    pc.nombre_producto_cantina,
    pc.precio_producto,
    ep.nombre_estado_producto AS estado
FROM
    productos_cantina pc
INNER JOIN
    estados_productos ep ON pc.rela_estado_producto = ep.id_estado_producto
WHERE
    pc.nombre_producto_cantina LIKE '%$busqueda%'
ORDER BY
    pc.nombre_producto_cantina;") or die("Error de SQL: " . $mysql->error);
?>
<html lang="es">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>Lista de productos de cantina</title>
    <style>
        body {
            background-color: #F98E1B;
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
            width: 300px; /* Ajusta el tamaño según lo necesites */
            display: block;
            margin: 0 auto 20px; /* Centra la imagen y añade espacio debajo */
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

        .boton:hover {
            background-color: darkred;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h1>Lista de productos de cantina</h1>
    <img src="Logo_cinfsa.jpeg" alt="Logo del cine" class="form-logo">
    <form method="POST" action="">
    <input type="text" name="busqueda" placeholder="Buscar por nombre..." value="<?php echo htmlspecialchars($busqueda); ?>" />
    <input type="submit" value="Buscar" class="boton" />
</form>

    <center>
    <a href=modulo_producto.php" class="boton">Agregar producto</a>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($productos = $listaproducto->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo ($productos['id_producto_cantina']); ?></td>
                            <td><?php echo ($productos['nombre_producto_cantina']); ?></td>
                            <td><?php echo ($productos['precio_producto']); ?></td>
                            <td><?php echo ($productos['estado']); ?></td>
                        </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</body>
</html>
<?php
$mysql->close();
?>