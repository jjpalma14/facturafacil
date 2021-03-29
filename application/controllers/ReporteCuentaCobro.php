<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';
require_once APPPATH . 'third_party/conversor.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteCuentaCobro extends CI_Controller {
    
    public function index()
	{
               
	}

    public function CuentaCobro() {
        //Se agrega la clase desde thirdparty para usar FPDF
       
        $factura = $this->input->get('factura'); 
        
        $data = array();
        $this->load->model('ModeloVenta');
        $this->load->model('ModeloEmpresa');
        $data = $this->ModeloEmpresa->obtener_empresa();
        $data = $this->ModeloVenta->GetVentasServiciosFactura($factura);
        $pdf = new PDF('P', 'mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', '', 7);
        $total = 0;
        $observacion = "";
         foreach ($data as $item) {
             
          
            $total += $item->total; 
            $observacion = $item->observacion;
            $pdf->Cell(20,5,$item->idcargo_servicio,1,'L'); 
            $pdf->Cell(30,5,$item->fecha_servicio,1,'L'); 
            $pdf->Cell(110,5,$item->tiposervicio,1,'L');
            $pdf->Cell(30,5, number_format($item->total),1,'L'); 
            $pdf->Ln(5);
   
            
        }
        $pdf->Ln(4);
        $pdf->Cell(18,5,"Observacion:,",0,'L');
        $pdf->Ln(4);
        $pdf->MultiCell(190,4, utf8_decode($observacion),1,'L'); 
         
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50,7,"TOTAL VALOR SERVICIOS:",0,'L');
        $pdf->Cell(130,7, number_format($total),0,'C');
         $obj2 = new ModeloEmpresa();
        $datos2 = $obj2->obtener_empresa();
        foreach ($datos2 as $empresa) {
            $razonsocial = $empresa->razon_social;
            $nitempresa = $empresa->nit;
            $nittelefono= $empresa->telefono;
            $email = $empresa->email;
        }
        
        $pdf->Ln(40);
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(50,7,"Atentamente,",0,'L');
        $pdf->Ln(15);
        $pdf->Cell(50,7,"___________________________",0,'L');
        $pdf->Ln(5);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50,7,$razonsocial,0,'L');
        $pdf->Ln(4);
        $pdf->Cell(50,7, number_format($nitempresa),0,'L');
        $pdf->Ln(4);
        $pdf->Cell(50,7,$nittelefono,0,'L');
        $pdf->Ln(4);
        $pdf->Cell(50,7,$email,0,'L');
  
        

        
        
        
        
        $pdf->Output(''.$factura.'.pdf', 'I');
    }
    
 

}

class PDF extends FPDF {


    
    
    function Header() {
        
        
      
        $factura = $_GET['factura'];
        $obj = new ModeloVenta();
        $datos = $obj->GetVentasServiciosFactura($factura);
        $total = 0;
        foreach ($datos as $item) {
            $fecha = $item->fecha_registro;
            $cliente = $item->razonsocial;
            $nit = $item->nit;
            $total += $item->total;
        }
        $obj2 = new ModeloEmpresa();
        $datos2 = $obj2->obtener_empresa();
        foreach ($datos2 as $empresa) {
            $razonsocial = $empresa->razon_social;
            $nitempresa = $empresa->nit;
        }

        
        $this->Ln(10);
        $this->SetFont('Arial', 'B', 16);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10, utf8_decode('CUENTA DE COBRO '.$factura.''), 0, 0, 'C');
        $this->Ln(6);
        $this->SetFont('Arial', '', 12);
        $this->Cell(190, 10,date_format (new DateTime($fecha), 'F j, Y'), 0, 0, 'C');
        $this->Ln(20);
        
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10, utf8_decode($cliente), 0, 0, 'C');
        $this->Ln(4);
        $this->SetFont('Arial', '', 12);
        $this->Cell(190, 10,$nit, 0, 0, 'C');
        $this->Ln(20);
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10,"Debe a", 0, 0, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'B', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10, utf8_decode($razonsocial), 0, 0, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', '', 12);
        $this->Cell(190, 10,number_format($nitempresa), 0, 0, 'C');
        $this->Ln(16);
        $this->SetFont('Arial', '', 12);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10,"La suma de", 0, 0, 'C');
        $this->Ln(5);
        $this->SetFont('Arial', 'I', 11);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10,numletras($total)." ($".number_format($total).")", 0, 0, 'C');
        $this->Ln(16);
        $this->SetFont('Arial', '', 8);
        $this->SetFillColor(230,230,230); 
        $this->Cell(190, 10,"Por concepto de:", 0, 0, 'L');
         $this->Ln(8);
        $this->SetFont('Arial', 'B', 8);
        $this->SetFillColor(230,230,230); 
        $this->Cell(20, 6,"ID SERVICIO", 1, 0, 'L',true);
        $this->Cell(30, 6,"FECHA SERVICIO", 1, 0, 'L',true);
        $this->Cell(110, 6,"TIPO SERVICIO", 1, 0, 'L',true);
        $this->Cell(30, 6,"VALOR SERVICIO", 1, 0, 'L',true);
        $this->Ln(6);
        
        
        
       
   
        
    }

    function Footer() {
        
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(190, 5,"", 0, 0, 'C');
        $this->Cell(-15, 5, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }

}
