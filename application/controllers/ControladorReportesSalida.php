<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorReportesSalida extends CI_Controller {
    
    public function index()
	{
               
	}

    public function ReporteSalida() {
        $salida = $this->input->get('salida'); 
        $data = array();
        $this->load->model('ModeloEntradaArticulos');
        $data = $this->ModeloEntradaArticulos->ReporteSalida($salida);
        $pdf = new PDF('L', 'mm', array(216, 140));
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        
     
      $total ="";
       foreach ($data as $item) {
           $total += $item->valor;
          $documento = $item->documento_salida;
          $pdf->Cell(25,5,$item->codigo_producto,1,0,'L',false);
          $pdf->Cell(87,5,$item->descripcion,1,0,'L',false); 
          $pdf->Cell(18,5,$item->cantidad,1,0,'L',false); 
          $pdf->Cell(30,5,number_format($item->costo_compra),1,0,'L',false); 
          $pdf->Cell(30,5, number_format($item->valor),1,0,'L',false); 
          $pdf->Ln(5);
 

          
          
        }
        $pdf->Ln(5);
        $pdf->SetFillColor(230,230,230); 
         $pdf->SetFont('Arial', 'B', 8);
 
        $pdf->Cell(25,5,"TOTAL ITEM",1,0,'L',true);
        $pdf->Cell(165,5,count($data),1,0,'R',false);
        $pdf->Ln(5);
        $pdf->Cell(25,5,"TOTAL VALOR",1,0,'L',true);
        $pdf->Cell(165,5, number_format($total),1,0,'R',false);
            
        
        
        
        
        
        $pdf->Output(''.$documento.'.pdf', 'I');
    }
    
  

}

class PDF extends FPDF {


    
    
    function Header() {
        
        $salida = $_GET['salida'];
        $data = array ();
        $obj = new ModeloEntradaArticulos();
        $data = $obj->ReporteSalida($salida);
        foreach ($data as $item) {
            $fecha = $item->fecha;
            $documento = $item->documento_salida;
        }
        
       
        $this->Image(base_url().'/assets/images/jpc.jpg',10,10,8);
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10, utf8_decode('SALIDA DE ARTICULO'), 1, 0, 'C');
        $this->Ln(12);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(31, 5, utf8_decode('FECHA:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(31, 5, utf8_decode($fecha), 1, 0, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(31, 5, utf8_decode('DOCUMENTO:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(31, 5, utf8_decode($documento), 1, 0, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(31, 5, utf8_decode('TIPO:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(35, 5, utf8_decode("Salida por ajuste"), 1, 0, 'L');
        $this->Ln(7);
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(230,230,230); 
        $this->Cell(25, 5, 'COD', 1, 0, 'L',true);
        $this->Cell(87, 5, 'DESCRIPCION', 1, 0, 'L',true);
        $this->Cell(18, 5, 'CANTIDAD', 1, 0, 'L',true);
        $this->Cell(30, 5, 'VALOR COMPRA', 1, 0, 'L',true);
        $this->Cell(30, 5, 'VALOR TOTAL', 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(100, 5, "", 0, 0, 'L');
        $this->Ln(5);
    }

    function Footer() {
        $hoy = date("F j, Y");
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(190, 10, utf8_decode($hoy), 1, 0, 'C');
        $this->Cell(-15, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }

}
