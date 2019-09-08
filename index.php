<?php 

require_once "pdf.php";
require_once "conexion.php";

// CREAR OBJETO PDF
$pdf = new PDF();
// HABILTAR USO ALIAS
$pdf->AliasNbPages();
//METADATOS PDF
$pdf->SetTitle("Reporte Articulos GymGalaxy");
$pdf->SetAuthor('GymGalaxy');
$pdf->SetCreator('GymGalaxy');
// CREAR UNA PAGINA
$pdf->AddPage();
// FUENTE LETRA PAGINA
$pdf->SetFont("Arial","B",12);
//TRAIGO DATOS TABLA
$datos = traerDatos();
//ARRAY TAMAÑO CELDA CADA FILA TABLA
$dimension_celdas = array(40,80);
//CALCULO CENTRADO CELDA
$margenIzq = ($pdf->GetPageWidth()-array_sum($dimension_celdas))/2;
// var_dump(traerDatos());
//INSERTO BACKGROUND A LA CABECERA TABLA
$pdf->SetFillColor(236,191,107);
// ASIGNO COLOR TEXTO
$pdf->SetTextColor(34,34,50);
//ASIGNO MARGEN A LA CELDA
$pdf->SetX($margenIzq);
//CREO LAS CELDAS CABECERA
$pdf->Cell($dimension_celdas[0],10,"ID Producto",1,0,"C",1);
$pdf->Cell($dimension_celdas[1],10,"Nombre",1,1,"C",1);
;
//ASIGNO MARGEN A LA CELDA
$pdf->SetX($margenIzq);
//VARIABLE ALTERNAR BG CELDA
$cellAlternate = true;
// RECORRO LOS DATOS
foreach($datos as $dato)
// ASIGNO MARGEN
{   $pdf->SetX($margenIzq);
    //COMPRUBO VALOR CELDA ALTERNADA Y ASIGNO BG
    ($cellAlternate)?$pdf->SetFillColor(190,190,185):$pdf->SetFillColor(250,250,250);
    //CREO CELDAS
    $pdf->Cell($dimension_celdas[0],10,utf8_decode($dato['id']),1,0,"C",1);   
    $pdf->Cell($dimension_celdas[1],10,utf8_decode($dato['nombre']),1,1,"C",1);
    //RESETEO VALOR VARIABLE
    ($cellAlternate)?$cellAlternate = false:$cellAlternate = true;
}
//CREO OTRA PAGINA
$pdf->AddPage();
//INGRESO TEXTO PAGINA
$pdf->BodyText("texto.txt");
$pdf->Output("I","ejemplo.pdf",1);

// MORE INFORMATION
// http://www.fpdf.org/
?>
