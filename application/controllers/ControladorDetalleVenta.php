<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorDetalleVenta extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
	public function index()
	{
            
                
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaDetalleVenta');
                $this->load->view('/plantilla/footer');
	}
}


