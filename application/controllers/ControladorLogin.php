<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class ControladorLogin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function index() {
        $this->load->view('/plantilla/login');
    }

    public function Ingreso() {
        $usuario = $this->input->post('usuario');
        $password = $this->input->post('password');

        if (strlen($usuario) <= 0) {
            echo "campo usuario no puede ir vacio";
            return false;
        }
        if (strlen($password) <= 0) {
            echo "campo contraseña no puede ir vacio";
            return false;
        }

        $this->load->model('ModeloLogin');
        $this->ModeloLogin->validar($usuario, $password);
    }

    public function logout() {
        session_start();
        if (!empty($_SESSION['login_user'])) {
            $_SESSION['login_user'] = '';
            session_destroy();
            header("Location: ".base_url()."");
        }
        

    }
    public function updatepassword(){
       $password = $this->input->post('password'); 
       $usuario = $this->input->post('usuario');
         if (strlen($password) <= 0) {
            echo "campo contraseña no puede ir vacio";
            return false;
        }
        $this->load->model('ModeloLogin');
        $this->ModeloLogin->updatepassword($password,$usuario);
        
        
        
    }
    public function insertusuario() {
       $nombres = $this->input->post('nombres'); 
       $apellidos = $this->input->post('apellidos');
       $id = $this->input->post('id');
       $pass = $this->input->post('pass');
       $estado = $this->input->post('estado');
       $usuario = $this->input->post('usuario');
       $parametro = $this->input->post('parametro');

       if($parametro == 2){
        
        if (strlen($nombres) <= 0 || strlen($id) <= 0) {
            echo "debe llenar los campos obligatorios (*)";
            return false;
        }    
        $this->load->model('ModeloLogin');
        $this->ModeloLogin->insertusuario($nombres,$apellidos,$id,$pass,$estado,$usuario,$parametro);
        return false;   
       }
       if($parametro == 3){
        $this->load->model('ModeloLogin');
        $this->ModeloLogin->insertusuario($nombres,$apellidos,$id,$pass,$estado,$usuario,$parametro); 
        return false;
       }
       
         if (strlen($nombres) <= 0 || strlen($id) <= 0 || strlen($pass) <= 0) {
            echo "debe llenar los campos obligatorios (*)";
            return false;
        }
       
        $query = "select identificacion from usuarios where identificacion = $id ";
        $resultado = $this->db->query($query);
        $num = $resultado->num_rows();
        if($num == 1){
          echo "Identificación ya registrada";
            return false;  
        }

        $this->load->model('ModeloLogin');
        $this->ModeloLogin->insertusuario($nombres,$apellidos,$id,$pass,$estado,$usuario,$parametro);
     
    }
    public function GetUsuarios() {
                $data = array();
                $this->load->model('ModeloLogin');
                $data = $this->ModeloLogin->GetUsuarios(1);
                echo json_encode($data);
    }
    public function GetEditUsuario($id) {
                $data = array();
                $this->load->model('ModeloLogin');
                $data = $this->ModeloLogin->GetUsuarios($id);
                echo json_encode($data);
    }
    public function updatepermisos() {
      $datos = json_decode($_POST['permisos'], true);  
      $this->load->model('ModeloLogin');
      $data = $this->ModeloLogin->updatepermisos($datos);
    }

}
