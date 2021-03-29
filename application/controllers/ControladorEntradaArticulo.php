<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorEntradaArticulo extends CI_Controller {
       public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ModeloArticulo');
	}
	public function index()
	{
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data['proveedores'] = $this->ModeloEmpresa->ListarProveedores(1); 
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaEntradaArticulos',$data);
                $this->load->view('/plantilla/footer');
	}
        public function EntradaArticulo() {
            $nfactura = array();
            $modulo = 'en_articulo';
            $this->load->model('ModeloArticulo');
            $nfactura = $this->ModeloArticulo->GetNumeroFactura($modulo);
            foreach ($nfactura as $item) {
                $programa = $item->modulo;
                $prefijo = $item->prefijo;
                $consecutivo = $item->consecutivo;
                
            } 
            
           $siguiente = $consecutivo+1; 
           $datos = json_decode($_POST['array'], true);
           $this->ModeloArticulo->EntradaArticulo($datos,$prefijo,$siguiente);
           $this->ModeloArticulo->UpdateNumeroFactura($siguiente,$programa);
           
        }
        public function SalidaArticulo() {
            $nfactura = array();
            $modulo = 'sa_articulo';
            $this->load->model('ModeloArticulo');
            $nfactura = $this->ModeloArticulo->GetNumeroFactura($modulo);
            foreach ($nfactura as $item) {
                $programa = $item->modulo;
                $prefijo = $item->prefijo;
                $consecutivo = $item->consecutivo;
                
            } 
            
           $siguiente = $consecutivo+1; 
           $datos = json_decode($_POST['array'], true);
           $this->ModeloArticulo->SalidaArticulo($datos,$prefijo,$siguiente);
           $this->ModeloArticulo->UpdateNumeroFactura($siguiente,$programa);
           
        }
        public function GetEntradas() {
                $data = array();
                $this->load->model('ModeloEntradaArticulos');
                $data = $this->ModeloEntradaArticulos->GetEntradas();
                echo json_encode($data);
            
        }
          public function GetSalidas() {
                $parametro=$this->input->post('parametro');
                $data = array();
                $this->load->model('ModeloEntradaArticulos');
                $data = $this->ModeloEntradaArticulos->GetSalidas($parametro);
                echo json_encode($data);
            
        }
            public function DetalleEntrada() {
                $identrada=$this->input->post('identrada');
                $this->load->model('ModeloEntradaArticulos');
                $data = $this->ModeloEntradaArticulos->DetalleEntrada($identrada);
                echo json_encode($data);
            
        }
           public function DetalleSalida() {
                $idsalida=$this->input->post('idsalida');
                $this->load->model('ModeloEntradaArticulos');
                $data = $this->ModeloEntradaArticulos->DetalleSalida($idsalida);
                echo json_encode($data);
            
        }
}


