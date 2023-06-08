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
d.idDispositivo,
d.ubicacion,
d.fecha
FROM
dispositivo d
JOIN usuario u ON
d.idUsuario = u.idUsuario
WHERE
d.estatus = 1 AND u.correo = '".$user."'";

$resultado = $conn->query($consulta);

// Crear un objeto XMLWriter
$xml = new XMLWriter();
$xml->openURI('Dispositivos.xml');
$xml->startDocument('1.0', 'UTF-8');
$xml->setIndent(true);

// Inicio del elemento raíz
$xml->startElement('tabla');

// Recorrer los registros y generar los elementos XML
while ($row = $resultado->fetch_assoc()) {
    $xml->startElement('registro');

    $xml->writeElement('ID', $row['idDispositivo']);
    $xml->writeElement('Ubicacion', $row['ubicacion']);
    $xml->writeElement('Fecha', $row['fecha']);

    $xml->endElement(); // Fin del elemento registro
}

// Fin del elemento raíz
$xml->endElement();

$xml->endDocument();
$xml->flush();



// Cerrar la conexión a la base de datos
$conn->close();

header('Content-type: text/xml');
header('Content-Disposition: attachment; filename="Dispositivos.xml"');
readfile('Dispositivos.xml');
?>