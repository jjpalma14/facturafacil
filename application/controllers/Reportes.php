<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
        	public function index()
	{
            
		$this->load->view('/reportes/detalleventa');

	}
        public function detalleventa() {
        
         $inicio = $this->input->post('inicio'); 
         $fin = $this->input->post('fin');
         $msg = array ();   
         if(strlen($inicio) <= 0){
             $msg = [1,"La fecha inicial no puede ir vacia!!"];
             echo json_encode($msg);
             return false;
         }
         if(strlen($fin) <= 0){
             $msg = [1,"La fecha final no puede ir vacia!!"];
             echo json_encode($msg);
             return false;
         }
          if($fin < $inicio){
             $msg = [1,"La fecha final no puede se menor a la fecha inicial!!"];
             echo json_encode($msg);
             return false;
         }
        
         $datos = array ();
         $datos = [$inicio,$fin];
         echo json_encode($datos);
         
         
        }
    public function cargoservicio() {
        $this->load->view('/reportes/cargoservicio');
    }
    public function ticketventa() {
        $this->load->view('/reportes/ticketventa');
    }
     
        
        
        
}
