<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
                
    
    
	public function index()
	{
                $data = array();
                $this->load->model('ModeloArticulo');
                $this->load->model('ModeloEmpresa');
                $this->load->model('ModeloVenta');
                $data['totalcliente'] = $this->ModeloEmpresa-> ListarClientes(2);
                $data['total'] = $this->ModeloArticulo->TotalArticulos(); 
                $data['totalcobrar'] = $this->ModeloVenta->TotalVentasCreditos(1);
                $data['totalpagos'] = $this->ModeloVenta->TotalPagos(1);
                $data['acumuladoventas'] = $this->ModeloVenta->Acumulado();
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/home',$data);
                $this->load->view('/plantilla/footer');
	}
}

