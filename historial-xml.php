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

// Consulta SQL con JOIN
$consulta="SELECT
v.idUHV,
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

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Historial.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('ID', $row['idUHV']);
    $xml->writeElement('Nombre', $row['nombrePelicula']);
    $xml->writeElement('Fecha_de_Visualizacion', $row['fechaVisualizacion']);
    $xml->writeElement('Duracion_de_Visualizacion', $row['duracionVisualizacion']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();



// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Historial.xml"');
readfile('Historial.xml');
?>