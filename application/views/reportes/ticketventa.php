<?php
require_once APPPATH . 'third_party/fpdf/fpdf.php';
require_once APPPATH . 'third_party/conversor.php';
defined('BASEPATH') OR exit('No direct script access allowed');
$factura = $this->input->get('factura'); 
$data = array();
$this->load->model('ModeloVenta');
$pdf = new FPDF($orientation='P',$unit='mm', array(45,350));
$pdf->AddPage();
$pdf->SetFont('Arial','I',16);
$pdf->SetX(1);
$pdf->Cell(43,14,'SERVICIO',0,0,'C');
$pdf->Ln(10);
$pdf->SetX(0.1);
$pdf->SetFont('Arial','B',3);
$pdf->Cell(3,14,'COD',0,0,'L');
$pdf->Cell(25,14,'DESCRIPCION',0,0,'L');
$pdf->Cell(5,14,'CANT',0,0,'L');
$pdf->Cell(5,14,'V UNI',0,0,'L');
$pdf->Cell(5,14,'TOTAL',0,0,'L');
$pdf->Ln(1);
$pdf->SetX(1);
$pdf->Cell(43,14,'========================================================================',0,0,'C');
$pdf->Ln(1.5);
$factura = $this->input->get('factura'); 
$this->load->model('ModeloVenta');
$obj = new ModeloVenta();
$datos = $obj->ReporteVenta($factura);
foreach ($datos as $item) {
$pdf->SetX(0.1);
$pdf->SetFont('Arial','',3);
$pdf->Cell(3,14,$item->cod_articulo,0,0,'L');
$pdf->Cell(25,14,$item->descripcion,0,0,'L');
$pdf->Cell(5,14,$item->cantidad,0,0,'L');
$pdf->Cell(5,14,number_format($item->valor_unitario),0,0,'L');
$pdf->Cell(5,14,number_format($item->total),0,0,'L');
$pdf->Ln(1.5);
$pdf->SetX(0.1);

    
}
$pdf->Output();
?>

