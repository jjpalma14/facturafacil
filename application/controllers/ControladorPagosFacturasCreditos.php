<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorPagosFacturasCreditos extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
                
    
    
	public function index()
	{
                $data = array();
                $this->load->model('ModeloVenta');
                $data['totalcobrar'] = $this->ModeloVenta->TotalVentasCreditos(2);
                $data['totalpagos'] = $this->ModeloVenta->TotalPagos(1);
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaPagosFacturas',$data);
                $this->load->view('/plantilla/footer');
	}
}

