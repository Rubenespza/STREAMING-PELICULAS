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

$consulta="SELECT
h.nombrePelicula,
h.fechaVisualizacion,
h.duracionVisualizacion 
FROM
usuariohistorialvisualizacion v
JOIN usuario u ON
v.idUsuario = u.idUsuario
JOIN historialvisualizacion h ON
v.idHistorialVisualizacion = h.idHistorialVisualizacion
WHERE
v.estatus = 1 AND u.correo = '".$user."'";

$resultado = $conn->query($consulta);

// Obtener los datos de la consulta como un array
$cliente = array();
while ($row = $resultado->fetch_assoc()) {
    $cliente[] = $row;
}

// Generar el archivo JSON
$jsonData = json_encode($cliente, JSON_PRETTY_PRINT);

// Establecer los encabezados de la respuesta HTTP
header('Content-Type: application/json');
header('Content-Disposition: attachment; filename="Historial.json"');

// Imprimir el contenido JSON
echo $jsonData;

// Cerrar la conexión a la base de datos
$conn->close();
?>