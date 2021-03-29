<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ErrorPermisos extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		
		
	}
                
    
    
	public function index()
	{
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/plantilla/ErrorPermisos');
                $this->load->view('/plantilla/footer');
	}
}


