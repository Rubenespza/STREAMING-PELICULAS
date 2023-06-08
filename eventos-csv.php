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
require('cn.php');
require('vendor/autoload.php');
 
$consulta="SELECT
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
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Eventos.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Titulo', 'Fecha', 'Hora'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['titulo'],
        $rows['fecha'],
        $rows['hora']
    ));
}

fclose($output);
exit;

    ?>