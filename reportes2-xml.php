<?php
require('cn.php');

// Consulta SQL con JOIN
$consulta="SELECT * FROM reporte WHERE fechaVisualizacion BETWEEN '2023-01-01' AND '2023-12-31'";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Reporte2.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('ID', $row['idHistorialVisualizacion']);
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
header('Content-Disposition: attachment; filename="Reporte2.xml"');
readfile('Reporte2.xml');
?>