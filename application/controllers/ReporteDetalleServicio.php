<?php

require_once APPPATH . 'third_party/fpdf/fpdf.php';
require_once APPPATH . 'third_party/conversor.php';
defined('BASEPATH') OR exit('No direct script access allowed');

class ReporteDetalleServicio extends CI_Controller {
    
    public function index()
	{
               
	}

    public function getservicios() {
        //Se agrega la clase desde thirdparty para usar FPDF
       $factura = $this->input->get('factura'); 
        $data = array();
        $this->load->model('ModeloVenta');
        $this->load->model('ModeloEmpresa');
        
        $data = $this->ModeloEmpresa->obtener_empresa();
        $data = $this->ModeloVenta->GetVentasServiciosFactura($factura);
        $pdf = new PDF('P', 'mm','A4');
        $pdf->AddPage();
        $pdf->SetFillColor(230,230,230); 
        
        $total = 0;
         foreach ($data as $item) {
             
            $total += $item->total; 
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(190,5,"CONSECUTIVO: ".$item->idcargo_servicio,1,0,'L',true);
            $pdf->Ln(5);
            $pdf->SetFont('Arial', 'B', 8);
            $pdf->Cell(30,7,"FECHA SERVICIO:",1,0,'L',true);
            $pdf->Cell(30,7,$item->fecha_servicio,1,0,'L',false);
            $pdf->Cell(30,7,"TIPO SERVICIO:",1,0,'L',true);
            $pdf->Cell(50,7,$item->tiposervicio,1,0,'L',false);
            $pdf->Cell(30,7,"VALOR SERVICIO:",1,0,'L',true);
            $pdf->Cell(20,7, number_format($item->total),1,0,'L',false);
            $pdf->Ln(7);
            $pdf->Cell(190,5,"DETALLE",1,0,'C',true);
            $pdf->Ln(5);
            $pdf->MultiCell(190,4,$item->descripcion,1,'L');
            $this->load->model('ModeloLogin');
            $data2 = $this->ModeloLogin->GetUsuarios($item->usuario_registro);
            foreach ($data2 as $usuario) {
                $nombres = $usuario->nombres;
                $apellidos = $usuario->apellidos;
            }
            $pdf->Cell(60,5,"USUARIO QUE EJECUTO EL SERVICIO:",1,0,'L',true);
            $pdf->Cell(130,5,$nombres." ".$apellidos,1,0,'L',FALSE);
            $pdf->Ln(15);
   
            
        }
        
        
        
  
        

        
        
        
        $pdf->Output(''.$factura.'.pdf', 'I');
       
    }
    
 

}

class PDF extends FPDF {


    
    
    function Header() {
     $this->Image(base_url().'/assets/images/jpc.jpg',10,10,8);  
     $this->SetFont('Arial', 'B', 16);

     $this->Cell(190, 10, utf8_decode('RESUMEN DE SERVICIOS EJECUTADOS'), 1, 0, 'C'); 
     $this->Ln(15);
    }

    function Footer() {
        
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(190, 5,"", 0, 0, 'C');
        $this->Cell(-15, 5, utf8_decode('Página ') . $this->PageNo(), 0, 0, 'C');
    }

}
