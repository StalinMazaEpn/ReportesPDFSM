<?php
require_once "fpdf/fpdf.php";
// Cabecera de la Página
class PDF extends FPDF{
    function Header()
    {
        // Imagen Logo
        $this->Image('logo.png',10,6,30);
        // Tipo y Tamaño Fuente
        $this->SetFont('Arial','B',16);
        // Move to the right
        $this->Cell(100);
        // Title
        $this->Cell(80,10,utf8_decode('PDF Title'),0,0,'C',0);
        // Line break
        $this->Ln(35);
        //Cell width,Cell height,String to print, border,salto linea, centrado,fill cell    
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,utf8_decode('Página ') .$this->PageNo().'/{nb}',0,0,'C');
    }


    function BodyText($file)
    {
        // Read text file
        $txt = file_get_contents($file);
        // Times 12
        $this->SetFont('Times','',12);
        // Output justified text
        $this->MultiCell(0,5,$txt);
        // Line break
        $this->Ln();
        // Mention in italics
        $this->SetFont('','I');
        $this->Cell(0,5,'(fin del capitulo)');
    }


}

?>