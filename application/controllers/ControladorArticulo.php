<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorArticulo extends CI_Controller {
       public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ModeloArticulo');
	}

	public function index()
	{
                $data = array();
                $this->load->model('ModeloArticulo');
                $data['categoria'] = $this->ModeloArticulo->GetCategoria();
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/articulos',$data);
                $this->load->view('/plantilla/footer');
	}
        public function GetCodigo(){
          
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->GetID();
                foreach ($data as $item) {
                $id = $item->codigocategoria; 
                }
                $numeroConCeros = str_pad($id+1, 4, "0", STR_PAD_LEFT);
                echo $numeroConCeros;
  
        }
        public function GuardarCategoria(){
            	$categoria=$this->input->post('descripcion');
                $usuario=$this->input->post('usuario');
                if(strlen($categoria) == 0){
                    echo "2";
                    return false;
                }else
                {                
                $this->ModeloArticulo->InsertCategoria($categoria,$usuario);	
	        echo "1";
                }
        }
        public function GetCategorias(){
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->GetCategoria();
                echo json_encode($data);
        }
        public function GetCodigoarticulos(){
          
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->GetIDArticulo();
                foreach ($data as $item) {
                $id = $item->codigo; 
                }
                $numeroConCeros = str_pad($id+1, 4, "0", STR_PAD_LEFT);
                echo $numeroConCeros;
  
        }
           public function InsertArticulo(){
                $usuario=$this->input->post('usuario');
            	$descripcion=$this->input->post('descripcion');
                $categoria=$this->input->post('categoria');
                $codigo=$this->input->post('codigo');
                $estado=$this->input->post('estado');
                if(strlen($categoria) == 0 && strlen($descripcion) == 0 ){
                    echo "2";
                    return false;
                }else
                {                
                $this->ModeloArticulo->InsertArticulo($descripcion,$categoria,$codigo,$estado,$usuario);	
	        echo "1";
                }
        }
         public function GetArticulos(){
                $parametro=$this->input->post('parametro');
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->GetArticulos($parametro);
                echo json_encode($data);
        }
        public function GetSaldos(){
                $parametro=$this->input->post('parametro');
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->GetSaldos($parametro);
                echo json_encode($data);
        }
         public function GetSaldosVentas(){
                $data = array();
                $this->load->model('ModeloArticulo');
                $data = $this->ModeloArticulo->getsaldosventas();
                echo json_encode($data);
        }
        public function InsertTarifaArticulo(){
            $codigo=$this->input->post('codigo');
            $tarifa=$this->input->post('tarifa');
            $usuario=$this->input->post('usuario');
            
            if(strlen($tarifa) <= 0 || $tarifa == 0){
                echo "La tarifa no puede ser menor o igual a 0";
                return false;
            }
            $this->load->model('ModeloArticulo');
            $data = array ();
            $data = $this->ModeloArticulo->GetUnicoArticulo($codigo);
            foreach ($data as $item) {
            $costo_compra = $item->costo_compra;
            }
            if($tarifa <= $costo_compra){
                echo "La tarifa no puede ser menor o igual a el valor de compra (".number_format($costo_compra).")";
                return false;
            }
            $this->ModeloArticulo->InsertTarifaArticulo($codigo,$tarifa,$usuario);  
        }
        public function GetInfoTarifa(){
            $codigo=$this->input->post('codigo'); 
           $data = array ();
           $data = $this->ModeloArticulo->GetInfoTarifa($codigo);
           echo json_encode($data);   
        }

}