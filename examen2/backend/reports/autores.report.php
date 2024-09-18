<?php
// Incluir los archivos necesarios
require_once('../config/config.php');
require_once('../reports/fpdf/fpdf.php');
require_once('../models/autores.model.php');

// Crear una clase que extienda FPDF
class PDF extends FPDF {
    
    // Cabecera del reporte
    function Header() {

        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(255, 255, 255); // Texto blanco
        $this->SetFillColor(234, 69, 66); // Color de fondo similar al rojo del encabezado
        $this->Cell(0, 15, 'Reporte de Autores', 0, 1, 'C', true); // Celda con fondo de color
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0); // Texto blanco
        $this->Cell(0, 10, 'Numero de Reporte: ' . rand(1000, 9999), 0, 1, 'C');
        $this->Cell(0, 10, 'Fecha: ' . date('Y-m-d'), 0, 1, 'C');
        $this->Ln(10); // Salto de línea
        // Logo
        $this->Image('../../images/logo.png', 10, 6, 30); // Logo en la esquina superior izquierda

    }

    // Pie de página
    function Footer() {
        // Posición: a 1.5 cm del final
        $this->SetY(-30);
        $this->SetFont('Arial', 'I', 10);
        $this->SetTextColor(128, 128, 128); // Texto gris
        // Firma
        $this->Cell(0, 10, 'Creado por Bto Aldas', 0, 1, 'C');
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }

    // Tabla con los datos de los autores
    function TablaAutores($header, $data) {
        // Colores del encabezado
        $this->SetFillColor(156, 39, 176); // Azul oscuro
        $this->SetTextColor(255); // Blanco
        $this->SetDrawColor(48, 63, 159); // Borde azul más oscuro
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 12);

        // Ancho de las columnas
        $w = array(13, 43, 43, 44, 44);
        
        // Cabeceras
        for ($i = 0; $i < count($header); $i++) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', true);
        }
        $this->Ln();
        
        // Restaurar colores y fuente para el cuerpo de la tabla
        $this->SetFillColor(224, 224, 224); // Gris claro
        $this->SetTextColor(0); // Texto negro
        $this->SetFont('Arial', '', 10);
        $fill = false;

        // Datos
        foreach ($data as $row) {
            $this->Cell($w[0], 6, $row['autor_id'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 6, $row['nombre'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 6, $row['apellido'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 6, $row['fecha_nacimiento'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 6, $row['nacionalidad'], 'LR', 0, 'L', $fill);
            $this->Ln();
            $fill = !$fill;
        }

        // Línea de cierre
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// Crear PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

// Cabeceras de la tabla
$header = array('ID', 'Nombre', 'Apellido', 'Fecha Nacimiento', 'Nacionalidad');

// Obtener los datos de los autores desde el modelo
$autor = new Autor();
$datos = $autor->todos();
$autores = [];
while ($row = mysqli_fetch_assoc($datos)) {
    $autores[] = $row;
}

// Generar la tabla con los datos de los autores
$pdf->TablaAutores($header, $autores);

// Salida del PDF
$pdf->Output();
?>
