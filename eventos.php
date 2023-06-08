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
            margin-bottom: 10px;
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
        <a href="dispositivos.php" class="left-menu-icon" ><i class="bi bi-pc-display"></i></a>
        <a href="#" class="left-menu-icon" ><i class="bi bi-calendar2-event"></i></a>
        <a href="historial.php" class="left-menu-icon" ><i class="bi bi-clock-history"></i></a>
        <a href="reportes.php" class="left-menu-icon" ><i class="bi bi-clipboard2-data-fill"></i></a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-12" >
                <div class="panel">
                    <div class="panel-heading" style="display: flex; justify-content: space-between;">
                        <h2>Calendario personal</h2>
                        <form action="eventoAdd.php" method="post">
                            <button class="featured-button">Agregar</button>
                        </form>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Fecha</th>
                            <th>hora</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    include 'php/config.php';
                    $query = "SELECT
                    ue.idUsuarioEvento,
                    e.titulo,
                    e.fecha,
                    e.hora
                    FROM
                    usuarioevento ue
                    JOIN usuario u ON
                    ue.idUsuario = u.idUsuario
                    JOIN evento e ON
                    ue.idEvento  = e.idEvento 
                    WHERE
                    ue.estatus = 1 AND u.correo = '".$user."'";
                    $result = mysqli_query($conexion, $query);
                    while($row = mysqli_fetch_assoc($result)){
                        echo "
                        <tr class='larger-row'>
                            <td>".$row['titulo']."</td>
                            <td>".$row['fecha']."</td>
                            <td>".$row['hora']."</td>
                            <td>
                                <form action='eventosEdit.php' method='post'>
                                    <input type='hidden' name='id' id='id' value='".$row['idUsuarioEvento']."'>
                                    <button class='btn btn-link' title='Editar campo'>
                                        <i class='bi bi-pencil-square icon-large'></i>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action='eventosDel.php' method='post'>
                                    <input type='hidden' name='id' id='id' value='".$row['idUsuarioEvento']."'>
                                    <button class='btn btn-link' title='Eliminar campo'>
                                        <i class='bi bi-trash icon-large text-danger'></i>
                                    </button>
                                </form>
                            </td>
                        </tr>";
                    }
                    ?>
                    </tbody>
                </table>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="eventos-pdf.php">Exportar PDF</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="eventos-excel.php">Exportar EXCEL</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="eventos-csv.php">Exportar CSV</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="eventos-json.php">Exportar JSON</a>
                <b>|</b>
                <a class="link-info link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="eventos-xml.php">Exportar XML</a>
            </div>
        </div>
    </div>
    <script src="js/bienvenido.js"></script>
</body>
</html>