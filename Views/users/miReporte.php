<?php 
    require('../../fpdf/fpdf.php');
    @session_start();
   
   
class PDF extends FPDF
{
    

    // Cabecera de página
    function Header()
    {
        // Logo
        //$this->Image('logo.png',10,8,33);
        // Arial bold 15
        $this->SetFont('Arial','B',12);
        // Movernos a la derecha
        $this->Cell(60);
        // Título
        $this->Cell(50,10,'Mi historial de compras', 0/*borde de la tabla */,0,'C');
        foreach($_SESSION['miCompra'] as $miCompra){
            $cliente = $miCompra['nombreUsuario'];
        }

        // Salto de línea
        $this->Ln(10);
        $this->Cell(50,10,'Cliente: '.$cliente, 0/*borde de la tabla */,0,'C');
        $this->Cell(50,10,' ', 0/*borde de la tabla */,0,'C');
        $this->Cell(50,10,'Fecha Actual: '.date('Y-m-d' ), 0/*borde de la tabla */,0,'C');
        // Salto de línea'
        $this->Ln(15);
        /*Move to right */
        $this->Cell(10);
        $this->SetFont('Arial','B',10);
        $this->Cell(50, 10,'Producto', 1, 0, 'C', 0 );
        $this->Cell(40, 10,'Precio', 1, 0, 'C', 0 );
        //$pdf->Cell(20, 10, $row['tx_apellidoMaterno'], 1, 0, 'C', 0 );
        $this->Cell(20, 10,'Cantidad', 1, 0, 'C', 0 );
        $this->Cell(20, 10,'Total', 1, 0, 'C', 0 );
       // $this->Cell(20, 10, 'Vendedor', 1, 0, 'C', 0 );
        $this->Cell(30, 10,'Fecha de Compra', 1, 1/*salto de linea*/, 'C', 0 );
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0,'C');
    }

}


    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);


    $pdf->SetFont('Arial','',10);
    $total = 0;
    foreach($_SESSION['miCompra'] as $miCompra){
        /*Move to right */
        $pdf->Cell(10);
        $pdf->Cell(50, 10, $miCompra['nombre'], 1, 0, 'C', 0 );
        $pdf->Cell(40, 10, "$".$miCompra['precio'].".00", 1, 0, 'C', 0 );
        //$pdf->Cell(20, 10, $miCompra['tx_apellidoMaterno'], 1, 0, 'C', 0 );
        $pagoTota = $miCompra['cantidad'] * $miCompra['precio'];
        $pdf->Cell(20, 10, $miCompra['cantidad'], 1, 0, 'C', 0 );
        //$pdf->Cell(20, 10, $miCompra['nombreUsuario'], 1, 0, 'C', 0 );
        $pdf->Cell(20, 10, "$".$pagoTota.".00", 1, 0, 'C', 0 );
        $pdf->Cell(30, 10, $miCompra['fecha'], 1, 1/*salto de linea*/, 'C', 0 );

        $total = $total + $pagoTota;
    }
    $pdf->SetFont('Arial','B',12);
    //$pdf->Cell(100, 20, "Ganacia generada en este reporte  $".$total.".00", 4, 30, 'C', 0 );
   

    //$pdf->Cell(40, 10, utf8_decode(''));
    $pdf->Output();

  


?>