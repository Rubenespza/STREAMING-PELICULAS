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
//<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link rel="stylesheet" href="bienvenido.css">
    <link rel="stylesheet" href="sus.css">
    <style> 
        .container{
            margin-top: 0px;
            margin-bottom: -60px;
        }
        .row{
            padding: 40 90px;
            display: flex; 
            justify-content: space-between;
            margin-bottom: 60px;
        } 
    </style>
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
        <a href="bienvenido.php" class="left-menu-icon" ><i class="bi bi-house-fill"></i></a>
        <a href="#" class="left-menu-icon" ><i class="bi bi-credit-card-fill"></i></a>
        <a href="dispositivos.php" class="left-menu-icon" ><i class="bi bi-pc-display"></i></a>
        <a href="eventos.php" class="left-menu-icon" ><i class="bi bi-calendar2-event"></i></a>
        <a href="historial.php" class="left-menu-icon" ><i class="bi bi-clock-history"></i></a>
        <a href="reportes.php" class="left-menu-icon" ><i class="bi bi-clipboard2-data-fill"></i></a>
    </div>
    <div class="demo11">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable11" style="width: 250px;">
                            <div class="pricingTable-header">
                                <i class="fa fa-adjust"></i>
                                <div class="price-value"> $10 <span class="month">per month</span> </div>
                            </div>
                            <h3 class="heading">Basica</h3>
                            <div class="pricing-content">
                                <ul>
                                    <li>Películas en calidad estándar (SD).</li>
                                    <li>Sin anuncios durante la reproducción.</li>
                                    <li>Acceso a un dispositivo por vez</li>
                                </ul>
                            </div>
                            <div class="pricingTable-signup">
                                <a href="validacion.php?pago=1">Adquirir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable11 green" style="width: 280px; margin-top: -10px">
                            <div class="pricingTable-header">
                                <i class="fa fa-briefcase"></i>
                                <div class="price-value"> $20 <span class="month">per month</span> </div>
                            </div>
                            <h3 class="heading">Premium</h3>
                            <div class="pricing-content">
                                <ul>
                                    <li>Películas en calidad HD.</li>
                                    <li>Sin anuncios durante la reproducción.</li>
                                    <li>Acceso a dos dispositivos simultáneamente.</li>
                                    <li>Descarga de películas para ver sin conexión.</li>
                                </ul>
                            </div>
                            <div class="pricingTable-signup">
                                <a href="validacion.php?pago=2">Adquirir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable11 blue" style="width: 300px; margin-top: -20px">
                            <div class="pricingTable-header">
                                <i class="bi-gem"></i>
                                <div class="price-value"> $25 <span class="month">per month</span> </div>
                            </div>
                            <h3 class="heading">Familiar</h3>
                            <div class="pricing-content">
                                <ul>
                                    <li>Películas en calidad HD.</li>
                                    <li>Sin anuncios durante la reproducción.</li>
                                    <li>Acceso a cuatro dispositivos simultáneamente.</li>
                                    <li>Perfiles de usuario individuales para cada miembro de la familia.</li>
                                    <li>Descarga de películas para ver sin conexión.</li>
                                </ul>
                            </div>
                            <div class="pricingTable-signup">
                                <a href="validacion.php?pago=3">Adquirir</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="pricingTable11 red" style="width: 350px; margin-right: -50px">
                            <div class="pricingTable-header">
                                <i class="fa fa-cube"></i>
                                <div class="price-value"> $30 <span class="month">per month</span> </div>
                            </div>
                            <h3 class="heading">Premium Plus</h3>
                            <div class="pricing-content">
                                <ul>
                                    <li>Películas en calidad 4K Ultra HD.</li>
                                    <li>Sin anuncios durante la reproducción.</li>
                                    <li>Acceso a cuatro dispositivos simultáneamente.</li>
                                    <li>Perfiles de usuario individuales.</li>
                                    <li>Descarga de películas para ver sin conexión.</li>
                                    <li>Acceso a contenido exclusivo y estrenos anticipados.</li>
                                </ul>
                            </div>
                            <div class="pricingTable-signup">
                                <a href="validacion.php?pago=4">Adquirir</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <script src="js/bienvenido.js"></script>
</body>
</html>