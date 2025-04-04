<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal - CINFSA</title>
    <!--  framework  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f5a623;
            color: #fff;
        }
        .navbar {
            background-color: #000066;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .card {
            border: none;
        }
        .card img {
            height: 200px;
            object-fit: cover;
        }
      	.form-logo {
        width: 300px; 
        display: block;
        margin: 0 auto 20px; 
    }
       
    </style>
</head>
<body>

    
        <center>
		<img src="Logo_cinfsa.jpeg" alt="Logo del cine" class="form-logo">
        <h1>CINFSA</h1>
		</center>


  
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">@cinfsa</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sala de Juegos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cine</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Cantina</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Mapa</a>
                    </li>
                </ul>
            </div>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                <button class="btn btn-outline-light" type="submit">Buscar</button>
            </form>
        </div>
    </nav>

    
    <div class="container my-5">
        <div class="row">
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-dark">
                    <img src="sala_juegos.jpeg" class="card-img-top" alt="Sala de Juegos">
                    <div class="card-body">
                        <h5 class="card-title">Sala de Juegos</h5>
                        <p class="card-text">Disfruta de juegos arcade y más.</p>
                        <a href="#" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-dark">
                    <img src="funciones.jpeg" class="card-img-top" alt="Cine">
                    <div class="card-body">
                        <h5 class="card-title">Cine</h5>
                        <p class="card-text">Consulta las funciones disponibles.</p>
                        <a href="#" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
           
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-dark">
                    <img src="cantina.jpeg" class="card-img-top" alt="Cantina">
                    <div class="card-body">
                        <h5 class="card-title">Cantina</h5>
                        <p class="card-text">Explora nuestro menú de snacks y bebidas.</p>
                        <a href="#" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card text-dark">
                    <img src="mapa.jpeg" class="card-img-top" alt="Mapa del Complejo">
                    <div class="card-body">
                        <h5 class="card-title">Mapa del Complejo</h5>
                        <p class="card-text">Ubica tus áreas favoritas.</p>
                        <a href="#" class="btn btn-primary">Entrar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- biblioteca de JavaScript -- Bootstrap  -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>