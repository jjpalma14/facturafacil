<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorReportes extends CI_Controller {
    
    public function index()
	{
               
	}

    public function ReporteEntrada() {
        //Se agrega la clase desde thirdparty para usar FPDF

       $entrada = $this->input->get('entrada'); 
        $data = array();
        $this->load->model('ModeloEntradaArticulos');
        $data = $this->ModeloEntradaArticulos->DetalleEntrada($entrada);
        $totales = $this->ModeloEntradaArticulos->TotalEntradas($entrada);

        

        
        $pdf = new PDF('L', 'mm', array(216, 140));
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 8);
        // Se crean números para generar algunas páginas en el documento
        $total = '';
        foreach ($data as $item) {
          $total += $item->valor_total;
          $pdf->Cell(25,5,$item->codigo_producto,1,0,'L',false);
          $pdf->Cell(87,5,$item->descripcion,1,0,'L',false); 
          $pdf->Cell(18,5,$item->cantidad,1,0,'L',false); 
          $pdf->Cell(30,5,number_format($item->valor_unitario),1,0,'L',false); 
          $pdf->Cell(30,5, number_format($item->valor_total),1,0,'L',false); 
          $pdf->Ln(5);
        }
        $pdf->Ln(5);
        $pdf->SetFillColor(230,230,230); 
        $pdf->SetFont('Arial', 'B', 8);
        $pdf->Cell(25,5,"TOTAL ITEM",1,0,'L',true);
        $pdf->Cell(165,5,count($data),1,0,'R',false);
        $pdf->Ln(5);
        $pdf->Cell(25,5,"TOTAL VALOR",1,0,'L',true);
        $pdf->Cell(165,5,number_format($total),1,0,'R',false);
            

        
        
        
        
        $pdf->Output('paginaEnBlanco.pdf', 'I');
    }
    
    public function RetornoDatos(){
        $entrada = $this->input->get('entrada'); 
        $data = array();
        $this->load->model('ModeloEntradaArticulos');
        $data = $this->ModeloEntradaArticulos->DetalleEntrada($entrada);

    }
 

}

class PDF extends FPDF {


    
    
    function Header() {
        
        $entrada = $_GET['entrada'];
        $fecha = $_GET['fecha'];
        $factura = $_GET['factura'];
        $tipo = $_GET['tipo'];
        $proveedor = $_GET['proveedor'];
        $data = array ();
        $obj = new ModeloEntradaArticulos();
        $data = $obj->GetProveedor($proveedor);
        foreach ($data as $item) {
            $proveedor = $item->razonsocial;
        }
        
       
        $this->Image(base_url().'/assets/images/jpc.jpg',10,10,8);
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10, utf8_decode('ENTRADA DE ARTICULO'), 1, 0, 'C');
        $this->Ln(12);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, utf8_decode('PROVEEDOR:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(165, 5, utf8_decode($proveedor), 1, 0, 'L');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(25, 5, utf8_decode('FECHA:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(30, 5, utf8_decode($fecha), 1, 0, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(20, 5, utf8_decode('ENTRADA:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(15, 5, utf8_decode($entrada), 1, 0, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(20, 5, utf8_decode('FACTURA:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        $this->Cell(30, 5, utf8_decode($factura), 1, 0, 'L');
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(20, 5, utf8_decode('TIPO:'), 1, 0, 'L',true);
        $this->SetFont('Arial', '', 8);
        if($tipo == 01){
        $this->Cell(30, 5, utf8_decode("Entrada por compras"), 1, 0, 'L');
        }
        if($tipo == 02){
        $this->Cell(30, 5, utf8_decode("Obsequio"), 1, 0, 'L');    
        }
        $this->Ln(7);
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(230,230,230); 
        $this->Cell(25, 5, 'COD', 1, 0, 'L',true);
        $this->Cell(87, 5, 'DESCRIPCION', 1, 0, 'L',true);
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
        $this->Cell(190, 10, utf8_decode($hoy), 1, 0, 'C');
        $this->Cell(-15, 10, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }

}

