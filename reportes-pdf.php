<?php
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
$consulta="SELECT * FROM reporte WHERE fechaVisualizacion BETWEEN '2023-06-01' AND '2023-06-30'";
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

$pdf->Output('Reporte.pdf', 'I');
?>



