<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorSalidaArticulos extends CI_Controller {
       public function __construct()
	{
		parent::__construct();
	
	}
	public function index()
	{
  
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaSalidaArticulos');
                $this->load->view('/plantilla/footer');
	}
 
   
}



