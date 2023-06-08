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
            margin: top 40px;
            padding: 50px 100px;
        }
        .navbar-container{
            width: 100%;
        }
        .panel-heading div{
            margin: top -10px;
            margin-buttom: 10px;
            font-size: 60px;
            color: white;
            font-family: "Sen", sans-serif;
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
    <div class="sidebar">
        <a href="bienvenido.php" class="left-menu-icon" ><i class="bi bi-house-fill"></i></a>
        <a href="suscripcion.php" class="left-menu-icon" ><i class="bi bi-credit-card-fill"></i></a>
        <a href="#" class="left-menu-icon" ><i class="bi bi-pc-display"></i></a>
        <a href="eventos.php" class="left-menu-icon" ><i class="bi bi-calendar2-event"></i></a>
        <a href="historial.php" class="left-menu-icon" ><i class="bi bi-clock-history"></i></a>
        <a href="reportes.php" class="left-menu-icon" ><i class="bi bi-clipboard2-data-fill"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="coll-md-11" >
                <div class="panel">
                    <div class="panel-heading">
                        <h2>Historial de Conexiones</h2>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Direccion IP</th>
                            <th>Fecha de Conexion</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'php/config.php';
                    $query = "SELECT
                    d.ubicacion,
                    d.fecha
                    FROM
                    dispositivo d
                    JOIN usuario u ON
                    d.idUsuario = u.idUsuario
                    WHERE
                    d.estatus = 1 AND u.correo = '".$user."'";
                    $result = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr class='larger-row'>
                            <td>".$row['ubicacion']."</td>
                            <td>".$row['fecha']."</td>
                        </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="dispositivos-pdf.php">Exportar PDF</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="dispositivos-excel.php">Exportar EXCEL</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="dispositivos-csv.php">Exportar CSV</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="dispositivos-json.php">Exportar JSON</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="dispositivos-xml.php">Exportar XML</a>
            </div>
        </div>
    </div>
    <script src="js/bienvenido.js"></script>
</body>
</html>