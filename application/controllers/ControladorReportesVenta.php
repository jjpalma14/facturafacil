<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorReportesVenta extends CI_Controller {
    
    public function index()
	{
               
	}

    public function ReporteVenta() {
        $factura = $this->input->get('factura'); 
        $data = array();
        $this->load->model('ModeloVenta');
        $data = $this->ModeloVenta->ReporteVenta($factura);
        $pdf = new PDF('L', 'mm', array(216, 140));
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        
     
        $total_pagar = 0;
       foreach ($data as $item) {
          $total_pagar += $item->total;
          $factura = $item->factura;
          $pdf->Cell(25,5,$item->cod_articulo,1,0,'L',false);
          $pdf->Cell(93,5,$item->descripcion,1,0,'L',false); 
          $pdf->Cell(18,5,$item->cantidad,1,0,'L',false); 
          $pdf->Cell(30,5,number_format($item->valor_unitario),1,0,'L',false); 
          $pdf->Cell(30,5, number_format($item->total),1,0,'L',false); 
          $pdf->Ln(5);
 

          
          
        }
        $pdf->Ln(1);
        $pdf->SetFillColor(230,230,230); 
         $pdf->SetFont('Arial', 'B', 8);
 
        $pdf->Cell(25,5,"TOTAL ITEM",1,0,'L',true);
        $pdf->Cell(171,5,count($data),1,0,'R',false);
        $pdf->Ln(5);
        $pdf->Cell(25,5,"TOTAL VALOR",1,0,'L',true);
        $pdf->Cell(171,5, number_format($total_pagar),1,0,'R',false);
            
        
        
        
        
        
        $pdf->Output(''.$factura.'.pdf', 'I');
    }
    
  

}

class PDF extends FPDF {


    
  
    function Header() {
        
        $factura = $_GET['factura'];
        
        
    $empresa = new ModeloVenta();
    $datos = $empresa->getempresa();
    foreach ($datos as $empresa) {
       $razon_social = $empresa->razon_social;
       $direccion = $empresa->direccion;
       $telefono = $empresa->telefono;
       $email = $empresa->email;
    }    
       
    $this->SetFillColor(230,230,230);
    $this->SetY(10);
    $this->Cell(0,18,'',1,0,'C',true);
    
    
    
    // Logo
    //$this->Image('..//imagenes/logo.jpg',11,11,13);
    // Arial bold 15
    $this->Image(base_url().'/assets/images/jpc.jpg',10,10,14.5);
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    /*$this->Cell(80);*/
    // Título
    $this->SetFillColor(230,230,230);
    $this->Cell(140);
    $this->SetFont('Arial','B',15);
    $this->Cell(140);
    $this->Cell(5,18,"",0,0,'R');
    $this->Ln(3);
    $this->Cell(15);
    $this->Cell(190,5,$razon_social,0,0,'L');
    $this->SetFont('Arial','B',40);
    $this->Ln(5);
    $this->Cell(144);
    $this->Cell(190,5,$factura,0,0,'L');
    $this->SetFont('Arial','B',10);
    $this->Ln(1);
    $this->Cell(15);
    $this->Cell(190,4,$direccion,0,0,'L');
    $this->Ln(5);
    $this->Cell(15);
    $this->Cell(190,2,$email." | ".$telefono,0,0,'L');
    $empresa = new ModeloVenta();
    $datos = $empresa->ReporteVenta($factura);
    foreach ($datos as $empresa) {
       $razon_social = $empresa->razonsocial;
       $direccion = $empresa->direccion;
       $telefono = $empresa->telefono;
       $nit = $empresa->nit;
       $fecha = $empresa->fecha_registro;
    }
    // Salto de línea
    $this->Ln(5);
    $this->SetFont('Arial','B',8);
    $this->Cell(20,5,'CLIENTE:',1,0,'L',true);
    $this->SetFont('Arial','',8);
    $this->Cell(176,5,$razon_social,1,0,'L');
    $this->Ln(5);
    $this->SetFont('Arial','B',8);
    $this->Cell(20,5,'NIT:',1,0,'L',true);
    $this->SetFont('Arial','',8);
    $this->Cell(35,5,$nit,1,0,'L');
    $this->SetFont('Arial','B',8);
    $this->Cell(20,5,'TELEFONO:',1,0,'L',true);
    $this->SetFont('Arial','',8);
    $this->Cell(78,5,$telefono,1,0,'L');
    $this->SetFont('Arial','B',8);
    $this->Cell(15,5,'FECHA:',1,0,'L',true);
    $this->SetFont('Arial','',8);
    $this->Cell(28,5,$fecha,1,0,'L');
    $this->Ln(5);    
    $this->SetFont('Arial','B',8);
    $this->Cell(20,5,'DIRECCION:',1,0,'L',true);
    $this->SetFont('Arial','',8);
    $this->Cell(176,5,$direccion,1,0,'L');
    $this->Ln(6);
    $this->SetFont('Arial','B',8);
    $this->Cell(196,4,'DETALLE',1,0,'C',true);
    $this->Ln(5);
        
        
        
        
        
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(230,230,230); 
        $this->Cell(25, 5, 'CODIGO', 1, 0, 'L',true);
        $this->Cell(93, 5, 'DESCRIPCION', 1, 0, 'L',true);
        $this->Cell(18, 5, 'CANTIDAD', 1, 0, 'L',true);
        $this->Cell(30, 5, 'VALOR UNITARIO', 1, 0, 'L',true);
        $this->Cell(30, 5, 'VALOR TOTAL', 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(100, 5, "", 0, 0, 'L');
        $this->Ln(5);
    }

    function Footer() {
        $hoy = date("F j, Y");
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(195, 5,"", 1, 0, 'C');
        $this->Cell(-190, 5, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }

}
