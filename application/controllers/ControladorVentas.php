<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorVentas extends CI_Controller {
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
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaVentas',$data);
                $this->load->view('/plantilla/footer');
	}
        public function GuardarVenta() {
            $nfactura = array();
            $modulo = 've_articulo';
            $this->load->model('ModeloArticulo');
            $nfactura = $this->ModeloArticulo->GetNumeroFactura($modulo);
            foreach ($nfactura as $item) {
                $programa = $item->modulo;
                $prefijo = $item->prefijo;
                $consecutivo = $item->consecutivo;   
            } 
           $siguiente = $consecutivo+1;
           $datos = json_decode($_POST['array'], true);
           $this->load->model('ModeloVenta');
           $this->ModeloVenta->InsertVentas($datos,$prefijo,$siguiente);
           $this->ModeloVenta->InsertVentasCredito($datos,$prefijo,$siguiente);
           $this->ModeloArticulo->UpdateNumeroFactura($siguiente,$programa);

        }
        public function DetalleVenta() {
                $factura=$this->input->post('factura');
                $this->load->model('ModeloVenta');
                $data = $this->ModeloVenta->DetalleVenta($factura);
                echo json_encode($data);
            
        }
        public function vistaventasgeneradas() {
                $data = array();
                $this->load->model('ModeloVenta');  
                $data['totalventaarticulos'] = $this->ModeloVenta->totalventasarticulos();
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaVentasGeneradas',$data);
                $this->load->view('/plantilla/footer');
        }
        
}
