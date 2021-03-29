<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorPagos extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	public function index()
	{
                
               
                
	}
        public function InsertPagos() {
            $usuario=$this->input->post('usuario');
            $factura=$this->input->post('factura');
            $total=$this->input->post('total');
            $total = str_replace(",", "", $total);
            if(strlen($total)==0){
                echo "El campo no puede ir vacio!!";
                return false;
            }
            if($total <= 0){
                echo "El valor debe se mayor a 0";
                return false;
            }
            $this->load->model('ModeloVenta');
            $data = $this->ModeloVenta->TotalPagos($factura);
            $valorpagos = 0;
            foreach ($data as $item) {
              $valorpagos += $item->totalpagado;
            }
            $data2 = $this->ModeloVenta->TotalVentasCreditosFactura($factura);
            $totalfactura = 0;
            foreach ($data2 as $item) {
              $totalfactura = $item->total_credito;
            }
            $saldo = $totalfactura - $valorpagos;
            
           if($total > $saldo){
               echo "El valor no puede ser mayor al saldo ".number_format($saldo)."";
               return false;
           }
           
           if($saldo == $total){
            $this->load->model('ModeloPagos');
            $this->ModeloPagos->InsertPagos($factura,$total,$usuario,1); 
            $this->ModeloPagos->UpdateEstadoCredito1($factura);  
            $this->ModeloPagos->UpdateEstadoCredito2($factura);
            
           }else{
           $this->load->model('ModeloPagos');
           $this->ModeloPagos->InsertPagos($factura,$total,$usuario,2); 
            
           }
           
           
            
        }

        
}

