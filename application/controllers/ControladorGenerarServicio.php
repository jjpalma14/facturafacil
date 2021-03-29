<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorGenerarServicio extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
                
    
    
	public function index()
	{
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data['clientes'] = $this->ModeloEmpresa->ListarClientes(1);
                $this->load->model('ModeloTipoServicio');
                $data['tipo'] = $this->ModeloTipoServicio->gettipo();
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaGenerarServicio',$data);
                $this->load->view('/plantilla/footer');
	}

}

