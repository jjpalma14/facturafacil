<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorGenerales extends CI_Controller {
    	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->model('ModeloEmpresa');
	}
	public function index()
	{
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data['empresa'] = $this->ModeloEmpresa->obtener_empresa();
                $this->load->view('/plantilla/cabecera');
                $this->load->view('/plantilla/menu');
		$this->load->view('/modulos/VistaGenerales',$data);
                $this->load->view('/plantilla/footer');
	}
        
 public function InsertEmpresa()
	{
		
			$razonsocial=$this->input->post('razonsocial');
			$nit=$this->input->post('nit');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
                        $email=$this->input->post('email');
			$this->ModeloEmpresa->InsertEmpresa($razonsocial,$nit,$direccion,$telefono,$email);	
			echo "1";
		 
	}
 public function InsertCliente()
	{
		
			$razonsocial=$this->input->post('razonsocial');
			$nit=$this->input->post('nit');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
                        $email=$this->input->post('email');
                        $estado=$this->input->post('estado');
                        $usuario=$this->input->post('usuario');
			$this->ModeloEmpresa->InsertCliente($razonsocial,$nit,$direccion,$telefono,$email,$estado,$usuario);	
			echo "1";
		 
	}
        public function ListarClientes(){
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data = $this->ModeloEmpresa->ListarClientes(2);
                echo json_encode($data);
        }
                public function GetClienteID(){
                $id=$this->input->post('id');    
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data = $this->ModeloEmpresa->GetClienteID($id);
                echo json_encode($data);
            
        }
         public function ModificarCliente()
	{
		
			$razonsocial=$this->input->post('razonsocial');
			$nit=$this->input->post('nit');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
                        $email=$this->input->post('email');
                        $estado=$this->input->post('estado');
                        $id=$this->input->post('id');
                        $usuario=$this->input->post('usuario');
			$this->ModeloEmpresa->ModificarCliente($razonsocial,$nit,$direccion,$telefono,$email,$estado,$id,$usuario);	
			echo "1";
		 
	}
        
         public function InsertProveedor()
	{
		
			$razonsocial=$this->input->post('razonsocial');
			$nit=$this->input->post('nit');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
                        $email=$this->input->post('email');
                        $estado=$this->input->post('estado');
                        $usuario=$this->input->post('usuario');
			$this->ModeloEmpresa->InsertProveedor($razonsocial,$nit,$direccion,$telefono,$email,$estado,$usuario);	
			echo "1";
		 
	}
            public function ListarProveedores(){
            
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data = $this->ModeloEmpresa->ListarProveedores(2);
                echo json_encode($data);
            
        }
            public function GetProveedorID(){
                $id=$this->input->post('id');    
                $data = array();
                $this->load->model('ModeloEmpresa');
                $data = $this->ModeloEmpresa->GetProveedorID($id);
                echo json_encode($data);
            
        }
            public function ModificarProveedor()
	{
		
			$razonsocial=$this->input->post('razonsocial');
			$nit=$this->input->post('nit');
			$direccion=$this->input->post('direccion');
			$telefono=$this->input->post('telefono');
                        $email=$this->input->post('email');
                        $estado=$this->input->post('estado');
                        $id=$this->input->post('id');
                        $usuario=$this->input->post('usuario');
			$this->ModeloEmpresa->ModificarProveedor($razonsocial,$nit,$direccion,$telefono,$email,$estado,$id,$usuario);	
			echo "1";
		 
	}
        
}

