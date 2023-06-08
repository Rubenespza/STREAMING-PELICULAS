<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo'
    <script>
    alert("Por favor debe iniciar sesion");
    window.location = "index.php";
    </script>
    ';
    session_destroy();
    die();   
}
else {
    $user = $_SESSION['usuario'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Watch Movies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="bienvenido.css">
    <style>
        .row{
            padding: 85px 300px;
        }
        .navbar-container{
            width: 100%;
        }
        #back{
            margin-top: 100px;
            margin-bottom: -80px;
            margin-left: 180px;
        }
    </style>
</head>
<body style="background-color: #454545;">
    <div class="navbar">
        <div class="navbar-container">
            <div class="logo-container">
                <h1 class="logo">Watch Movies</h1>
            </div>
            <div class="menu-container">
            </div>
            <div class="profile-container">
                <div class="toggle">
                    <i class="fas fa-moon toggle-icon"></i>
                    <i class="fas fa-sun toggle-icon"></i>
                    <div class="toggle-ball"></div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="container">
        <button id="back" type="button" class="btn btn-outline-danger pull-left" onclick="window.location= 'eventos.php'"><i class="bi bi-arrow-left"></i></button>   
        <div class="row">
            <center>
                <form action="evento.php" method="post">
                    <input type="hidden" name="tipo" id="tipo" value="ins">
                    <label for="txt" class="form-control-lg" aria-label=".form-control-lg example">Titulo:</label>
                    <input class="form-control form-control-lg text-info text-center bg-transparent border-info" name="titulo" id="titulo" type="text" placeholder="Describa su evento" aria-label=".form-control-lg example"><br>
                    <label for="txt" class="form-control-lg" aria-label=".form-control-lg example">Fecha:</label>
                    <input type="date" class="form-control form-control-lg text-info text-center bg-transparent border-info" name="fecha" id="fecha"><br>
                    <label for="txt" class="form-control-lg" aria-label=".form-control-lg example">Hora:</label>
                    <input type="time" class="form-control form-control-lg text-info text-center bg-transparent border-info"  name="hora" id="hora"><br>
                    <input type="submit" class="btn btn-lg btn-outline-success" value="Agregar">
                </form>
            </center>
        </div>
    </div>
    <script src="js/bienvenido.js"></script>
</body>
</html>