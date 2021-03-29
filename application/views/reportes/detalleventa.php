<?php
require_once APPPATH . 'third_party/fpdf/fpdf.php';
require_once APPPATH . 'third_party/conversor.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    /*$this->Image('logo.png',10,6,30);*/
    // Arial bold 15
    $this->Image(base_url().'/assets/images/jpc.jpg',10,10,11.4); 
    $this->SetFont('Arial','B',12);
    $inicio = $_GET['inicio'];
    $fin = $_GET['fin'];
    // Move to the right
    // Title
    $this->SetFillColor(230,230,230); 
    $this->Cell(12);
    $this->Cell(178,14,'DETALLE DE VENTAS',0,0,'C',true);
    $this->Ln(6);
    $this->SetFont('Arial','',8);
    $this->Cell(6);
    $this->Cell(190,11,'Desde '.$inicio.' hasta '.$fin.'',0,0,'C');
    $this->Ln(12);
    $this->SetFont('Arial','B',9);
    $this->Cell(19,6,'Factura',0,0,'L',true);
    $this->Cell(19,6,'Art/Ser',0,0,'L',true);
    $this->Cell(15,6,'Tipo',0,0,'L',true);
    $this->Cell(99,6,'Cliente',0,0,'L',true);
    $this->Cell(20,6,'Fecha',0,0,'L',true);
    $this->Cell(18,6,'Total',0,0,'L',true);
    $this->Ln(2);
    
    // Line break
    $this->Ln(4);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetFillColor(230,230,230); 
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    // Page number
    $this->Cell(0,5,'Pagina '.$this->PageNo().' de {nb}',0,0,'C',true);
}
}

// Instanciation of inherited class
$pdf = new PDF('L', 'mm', array(216, 140));
$pdf->AliasNbPages();
$pdf->AddPage();
$inicio = $_GET['inicio'];
$fin = $_GET['fin'];
$data = array();
$this->load->model('ModeloReportes');
$obj = new ModeloReportes();
$data = $obj->detalleventa($inicio, $fin);
$totalventas = 0;
foreach ($data as $item) {
$totalventas += $item['total'];  
$pdf->SetFont('Arial','',8);
$pdf->Cell(19,6,$item['factura'],0,0,'L');
$pdf->Cell(19,6,$item['tipo2'],0,0,'L');
$pdf->Cell(15,6,$item['tipo'],0,0,'L');
$pdf->Cell(99,6,$item['razonsocial'],0,0,'L');
$pdf->Cell(20,6,$item['fecha'],0,0,'L');
$pdf->Cell(18,6, number_format($item['total']),0,0,'L');
$pdf->Ln(6);
}
$pdf->SetFont('Arial','B',9);
$pdf->Cell(190,6,'-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------',0,0,'L');
$pdf->Ln(6);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(25,6,"TOTAL VENTAS:",0,0,'L');
$pdf->SetFont('Arial','I',8);
$pdf->Cell(130, 6,number_format($totalventas)." (".numletras($totalventas).")", 0, 0, 'L');
$pdf->Ln(4);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(28,6,"TOTAL FACTURAS:",0,0,'L');
$pdf->SetFont('Arial','I',8);
$pdf->Cell(28,6,count($data),0,0,'L');
$pdf->Ln(2);
$pdf->Output();
?>


