<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorVentasServicios extends CI_Controller {
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
		$this->load->view('/modulos/VistaVentasServicios',$data);
                $this->load->view('/plantilla/footer');
	}
        public function GuardarVentaServicio() {
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
           $this->ModeloVenta->InsertVentasServicio($datos,$prefijo,$siguiente);
           $this->ModeloVenta->InsertObservacion($datos,$prefijo,$siguiente);
           $this->ModeloVenta->InsertVentasCredito($datos,$prefijo,$siguiente);
           $this->ModeloArticulo->UpdateNumeroFactura($siguiente,$programa);
           $this->ModeloVenta->InsertFacturaCargo($datos,$prefijo,$siguiente);
            
         

        }
        function VentasServicios() {
                $data = array();
                $this->load->model('ModeloVenta');
                $data = $this->ModeloVenta->GetVentasServicios();
                echo json_encode($data);
            
        }
        function GetVentasServicios(){
                $factura =$this->input->post('factura');
                $data = array();
                $this->load->model('ModeloVenta');
                $data = $this->ModeloVenta->GetVentasServiciosFactura($factura);
                echo json_encode($data);
            
        }
}


