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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Sen:wght@400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link rel="stylesheet" href="bienvenido.css">
</head>
<body>
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
    <div class="sidebar">
        <a href="#" class="left-menu-icon" ><i class="bi bi-house-fill"></i></a>
        <a href="suscripcion.php" class="left-menu-icon" ><i class="bi bi-credit-card-fill"></i></a>
        <a href="dispositivos.php" class="left-menu-icon" ><i class="bi bi-pc-display"></i></a>
        <a href="eventos.php" class="left-menu-icon" ><i class="bi bi-calendar2-event"></i></a>
        <a href="historial.php" class="left-menu-icon" ><i class="bi bi-clock-history"></i></a>
        <a href="reportes.php" class="left-menu-icon" ><i class="bi bi-clipboard2-data-fill"></i></a>
    </div>
    <div class="container">
        <div class="content-container">
            <div class="featured-content"
                style="background: linear-gradient(to bottom, rgba(0,0,0,0), #151515), url('img/f-1.jpg');">
                <img class="featured-title" src="img/f-t-1.png" alt="">
                <p class="featured-desc">Un exesclavo une fuerzas con un cazador de recompensas alemán que lo liberó y lo ayuda a buscar a los criminales más buscados del sur de los Estados Unidos, con la esperanza de reencontrarse con su esposa.</p>
                <button class="featured-button" onclick="window.location.href='php/movies.php?movie=1'">WATCH</button>
            </div>
            <div class="movie-list-container">
                <h1 class="movie-list-title">NEW RELEASES</h1>
                <div class="movie-list-wrapper">
                    <div class="movie-list">
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/1.jpeg" alt="">
                            <span class="movie-list-item-title">Her</span>
                            <p class="movie-list-item-desc">Un escritor desanimado desarrolla una relación amorosa con la IA de su computadora, una intuitiva y sensible entidad llamada Samantha.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=2'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/2.jpeg" alt="">
                            <span class="movie-list-item-title">Star Wars</span>
                            <p class="movie-list-item-desc">Finn y Poe guían a la Resistencia para detener a la Primera Orden de formar otro imperio, mientras Rey anticipa su pelea con Kylo Ren.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=3'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/3.jpg" alt="">
                            <span class="movie-list-item-title">Storm</span>
                            <p class="movie-list-item-desc">El padre de Storm es capturado por imprimir un panfleto secreto de Martín Lutero. Su hijo, con el molde de impresión, es perseguido.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=4'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/4.jpg" alt="">
                            <span class="movie-list-item-title">1917</span>
                            <p class="movie-list-item-desc">En la Primera Guerra Mundial, dos soldados británicos llevan un mensaje vital en territorio enemigo para salvar a sus compañeros.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=5'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/5.jpg" alt="">
                            <span class="movie-list-item-title">Avengers</span>
                            <p class="movie-list-item-desc">The Avengers es una película de superhéroes basada en el equipo de superhéroes de Marvel Comics del mismo nombre.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=6'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/6.jpg" alt="">
                            <span class="movie-list-item-title">Rampage</span>
                            <p class="movie-list-item-desc">Animales mutantes gigantes y violentos: un primatólogo y una experta en genética luchan por detenerlos sin dañarlos.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=7'">Watch</button>
                        </div>
                        <div class="movie-list-item">
                            <img class="movie-list-item-img" src="img/7.jpg" alt="">
                            <span class="movie-list-item-title">Ender's Game</span>
                            <p class="movie-list-item-desc">Un joven talentoso es entrenado para liderar la lucha de la Tierra contra los invasores extraterrestres llamados Formics.</p>
                            <button class="movie-list-item-button" onclick="window.location.href='php/movies.php?movie=8'">Watch</button>
                        </div>
                    </div>
                    <i class="fas fa-chevron-right arrow"></i>
                </div>
            </div>
        </div>
    </div>
    <script src="js/bienvenido.js"></script>
</body>
</html>