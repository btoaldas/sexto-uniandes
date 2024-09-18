<?php
// Incluir los archivos necesarios
require_once('../config/config.php');
require_once('../reports/fpdf/fpdf.php');
require_once('../models/libros.model.php');

// Crear una clase que extienda FPDF
class PDF extends FPDF {
    
    // Cabecera del reporte
    function Header() {
        $this->SetFont('Arial', 'B', 16);
        $this->SetTextColor(255, 255, 255); // Texto blanco
        $this->SetFillColor(234, 69, 66); // Color de fondo similar al rojo del encabezado
        $this->Cell(0, 15, 'Reporte de Libros', 0, 1, 'C', true); // Celda con fondo de color
        $this->SetFont('Arial', '', 12);
        $this->SetTextColor(0, 0, 0); // Texto negro para el subtítulo
        $this->Cell(0, 10, 'Numero de Reporte: ' . rand(1000, 9999), 0, 1, 'C'); // Número aleatorio
        $this->Cell(0, 10, 'Fecha: ' . date('Y-m-d'), 0, 1, 'C'); // Fecha actual
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

    // Tabla con los datos de los libros
    function TablaLibros($header, $data) {
        // Colores del encabezado
        $this->SetFillColor(156, 39, 176); // Color del encabezado
        $this->SetTextColor(255); // Texto blanco
        $this->SetDrawColor(52, 58, 64); // Borde gris oscuro
        $this->SetLineWidth(.3);
        $this->SetFont('Arial', 'B', 10);

        // Ancho de las columnas
        $w = array(7, 65, 30, 20, 30, 40); // Ajusta el ancho de la última columna para Autor
        
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
            $this->Cell($w[0], 5, $row['libro_id'], 'LR', 0, 'L', $fill);
            $this->Cell($w[1], 5, $row['titulo'], 'LR', 0, 'L', $fill);
            $this->Cell($w[2], 5, $row['genero'], 'LR', 0, 'L', $fill);
            $this->Cell($w[3], 5, $row['fecha_publicacion'], 'LR', 0, 'L', $fill);
            $this->Cell($w[4], 5, $row['isbn'], 'LR', 0, 'L', $fill);

            // Aquí concatenamos el autor_id, nombre, y apellido
            $autorInfo = $row['autor_id'] . ' - ' . $row['nombre'] . ' ' . $row['apellido'];
            $this->Cell($w[5], 5, $autorInfo, 'LR', 0, 'L', $fill);

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
$header = array('ID', 'Titulo', 'Genero', 'Fecha', 'ISBN', 'Autor');

// Obtener los datos de los libros desde el modelo
$libro = new Libro();
$datos = $libro->reporte();
$libros = [];

while ($row = mysqli_fetch_assoc($datos)) {
    $libros[] = $row;
}

// Generar la tabla con los datos de los libros
$pdf->TablaLibros($header, $libros);

// Salida del PDF
$pdf->Output();
?>
