<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorBusqueda extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
        
        public function buscarmodulos(){
            $txtbusqueda = $this->input->post('txtbusqueda');
            $msg = [];
            if(strlen($txtbusqueda) == 0){
               $msg = [1,'Campo no puede ir vacio'];
               echo json_encode($msg);
               return false; 
            }
            $data = array();
            $this->load->model('ModeloBusqueda');
            $data = $this->ModeloBusqueda->buscarmodulos($txtbusqueda);
            echo json_encode($data);  
        }
        
        
        
        
        
}

