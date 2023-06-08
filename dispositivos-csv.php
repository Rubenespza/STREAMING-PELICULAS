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
d.ubicacion,
d.fecha
FROM
dispositivo d
JOIN usuario u ON
d.idUsuario = u.idUsuario
WHERE
d.estatus = 1 AND u.correo = '".$user."'";
$datos = $conn->query($consulta);

header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="Dispositivos.csv"');

$output = fopen('php://output', 'w');

// Escribir la línea de encabezado
fputcsv($output, array('Ubicacion', 'Fecha'));

// Escribir los datos de los empleados
while ($rows = $datos->fetch_assoc()) {
    fputcsv($output, array(
        $rows['ubicacion'],
        $rows['fecha']
    ));
}

fclose($output);
exit;

    ?>