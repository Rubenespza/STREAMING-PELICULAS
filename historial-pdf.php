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
require('fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
	
    // Arial bold 15
    $this->SetFont('Arial','B',9.5);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
   $this->Cell(70,10,' ',0,0,'C');
    // Salto de línea
    $this->Ln(20);

	$this->Cell(55,10,'Nombre',1,0,'C',0);
	$this->Cell(55,10,'Fecha de Visualizacion',1,0,'C',0);
	$this->Cell(55,10,'Duracion de Visualizacion',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página') .$this->PageNo().'/{nb}',0,0,'C');
}
}

require ("cn.php");
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
$resultado = mysqli_query($conn, $consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',8);

while ($row=$resultado->fetch_assoc()) {
	$pdf->Cell(55,10,$row['nombrePelicula'],1,0,'C',0);
	$pdf->Cell(55,10,$row['fechaVisualizacion'],1,0,'C',0);
	$pdf->Cell(55,10,$row['duracionVisualizacion'],1,1,'C',0);
} 

$pdf->Output('Historial.pdf', 'I');
?>



