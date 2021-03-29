<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorServicios extends CI_Controller {
     public function __construct()
	{
		parent::__construct();
		$this->load->database();
		
	}
                
    
    
	public function index()
	{
  
                $this->load->model('ModeloServicio');
                $data['servicios'] = $this->ModeloServicio->GetServicios(1);
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaServicios',$data);
                $this->load->view('/plantilla/footer');
            
            
            
            
            
            
	}
        public function UpdateServicio() {
            
            $cliente = $this->input->post('cliente'); 
            $tipo = $this->input->post('tipo'); 
            $fecha = $this->input->post('fecha'); 
            $detalle = $this->input->post('detalle');
            $usuario = $this->input->post('usuario');
            $totalcargo = $this->input->post('totalcargo');
            $consecutivo = $this->input->post('consecutivo');
            
            $hoy = date('Y-m-d');
            
        if (strlen($fecha) <= 0) {
            $msg = [2,'Campo fecha servicio no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
          if (strlen($detalle) <= 0) {
            $msg = [2,'Campo descripción no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
        if ($fecha > $hoy) {
            $msg = [2,'La fecha del servicio no puede ser mayor a la fecha actual'];
            echo json_encode($msg);
            return false;
        }
        if ($totalcargo <= 0) {
            $msg = [2,'Total servicio no puede ser igual o menor a 0'];
            echo json_encode($msg);
            return false;
        }
        if (strlen($totalcargo) <= 0) {
            $msg = [2,'Total servicio no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
        $this->load->model('ModeloServicio');
        $this->ModeloServicio->UpdateServicio($cliente,$tipo,$fecha,$detalle,$consecutivo,$usuario,$totalcargo);
        $tipo2 = 'UPDATE';
        $this->ModeloServicio->Insertauditoria($tipo2,$consecutivo,$usuario);
        }
        public function InsertServicio(){
            
            $cliente = $this->input->post('cliente'); 
            $tipo = $this->input->post('tipo'); 
            $fecha = $this->input->post('fecha'); 
            $detalle = $this->input->post('detalle');
            $usuario = $this->input->post('usuario');
            $totalcargo = $this->input->post('totalcargo');
            
            $hoy = date('Y-m-d');
            
        if (strlen($fecha) <= 0) {
            $msg = [2,'Campo fecha servicio no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
          if (strlen($detalle) <= 0) {
            $msg = [2,'Campo descripción no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
        if ($fecha > $hoy) {
            $msg = [2,'La fecha del servicio no puede ser mayor a la fecha actual'];
            echo json_encode($msg);
            return false;
        }
        if ($totalcargo <= 0) {
            $msg = [2,'Total servicio no puede ser igual o menor a 0'];
            echo json_encode($msg);
            return false;
        }
        if (strlen($totalcargo) <= 0) {
            $msg = [2,'Total servicio no puede ir vacio !!!'];
            echo json_encode($msg);
            return false;
        }
        
        $nfactura = array();
        $modulo = 'ge_servicio';
        $this->load->model('ModeloArticulo');
        $nfactura = $this->ModeloArticulo->GetNumeroFactura($modulo);
        foreach ($nfactura as $item) {
            $programa = $item->modulo;
            $prefijo = $item->prefijo;
            $consecutivo = $item->consecutivo;
        }
        $siguiente = $consecutivo + 1;
        $this->load->model('ModeloServicio');
        $this->ModeloServicio->InsertServicio($cliente,$tipo,$fecha,$detalle,$prefijo,$siguiente,$usuario,$totalcargo);
        $this->ModeloArticulo->UpdateNumeroFactura($siguiente,$programa);       
        }
        public function getcargos() {
        $cliente = $this->input->post('cliente');     
        $datos = array();
        $this->load->model('ModeloServicio');
        $datos = $this->ModeloServicio->getcargos($cliente); 
        echo json_encode($datos);
        
        }
        public function GetServicios() {
            $parametro = $this->input->post('parametro');
            $data = array();
            $this->load->model('ModeloServicio');
            $data = $this->ModeloServicio->GetServicios($parametro);
            echo json_encode($data);
   
        }
        public function validacionservicio(){
         $consecutivo = $this->input->post('consecutivo');
         $data = array();
         $this->load->model('ModeloServicio');
         $data = $this->ModeloServicio->GetServicios2($consecutivo);
         echo json_encode($data);
         
        }
        public function anularcargo() {
         $consecutivo = $this->input->post('consecutivo');
         $usuario = $this->input->post('usuario');
         $data = array();
         $this->load->model('ModeloServicio');
         $data = $this->ModeloServicio->GetServicios2($consecutivo);
         foreach ($data as $item) {
           $estado = $item->estado;
         }
         if($estado == 2 or $estado == 1){
            $msg = [2,'El cargo esta relacionado en una cuenta de cobro o ya se encuentra anulado, por lo tanto no se puede anular'];
            echo json_encode($msg);
            return false; 
         }
         if($estado == 0){
          $data = $this->ModeloServicio->Anularcargo($consecutivo); 
          $tipo2 = 'ANULACION';
          $this->ModeloServicio->Insertauditoria($tipo2,$consecutivo,$usuario);
          $msg = [1,'Registro anulado'];
          echo json_encode($msg);
          return false;    
         }
        }
}



