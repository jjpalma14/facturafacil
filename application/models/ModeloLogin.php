<?php

class ModeloLogin extends CI_Model {
    
    
    public function validar($usuario,$password) {
        //valida si existe el usuario
        $query = "select identificacion from usuarios where identificacion = $usuario ";
        $resultado = $this->db->query($query);
        $num = $resultado->num_rows();
        if($num == 0){
            echo "Usuario no registrado";
        }
        if($num == 1){
        $query = "select * from usuarios where identificacion = $usuario";
        $consulta = $this->db->query($query);
        foreach($consulta->result_array() as $d)
            
        {
            $passwordbase = $d['password'];
            $nombres = $d['nombres'];
            $identificacion = $d['identificacion'];
            $apellidos = $d['apellidos'];
            $estado = $d['estado'];
        }
        if($estado == 1){
           echo "Usuario inactivo, Consulte con sistema";
           return false;
        }
        
        
        
        if($passwordbase == md5($password)){
             session_start();
             $_SESSION['login_user']=$nombres;
             $_SESSION['identificacion']=$identificacion;
             $_SESSION['apellidos']=$apellidos;
             echo "1";
            
            
            
        }else{
            echo "Contraseña invalida";
        }
        
        }
    }
    public function updatepassword($password,$usuario){
       $query = "UPDATE facturafacil.usuarios
        SET password=MD5('$password') WHERE identificacion=$usuario;";
       $resultado = $this->db->query($query); 
       if($resultado){
           echo 1;
       } 
        
    }
    public function insertusuario($nombres,$apellidos,$id,$pass,$estado,$usuario,$parametro) {
      if($parametro == 1){
       $query = "INSERT INTO facturafacil.usuarios
      (nombres, apellidos, identificacion, password, perfil, fecha_registro, usuario_registro, estado)
       VALUES('$nombres', '$apellidos', $id, md5('$pass'), 1, now(), $usuario, $estado);";
       $resultado = $this->db->query($query); 
       if($resultado){
           echo 1;
       }    
      }
       if($parametro == 2){
       $query = "UPDATE facturafacil.usuarios
        SET nombres = '$nombres',apellidos='$apellidos',estado=$estado WHERE identificacion=$id;";
       $resultado = $this->db->query($query); 
       if($resultado){
           echo 2;
       }    
      }
        if($parametro == 3){
       $query = "UPDATE facturafacil.usuarios
        SET password=MD5('$id') WHERE identificacion=$id;";
       $resultado = $this->db->query($query); 
       if($resultado){
           echo 3;
       }    
      }
    }
    public function GetUsuarios($parametro) {
        if($parametro == 1){
        $this->db->select('*');
        $this->db->from('facturafacil.usuarios');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado; 
        }else{
        $this->db->select('*');
        $this->db->from('facturafacil.usuarios');
        $this->db->where('identificacion',$parametro);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;    
        }
    }
    public function getpermisos($id){
        $this->db->select('idmodulo');
        $this->db->select('modulo');
        $this->db->select('permiso');
        $this->db->from('facturafacil.permisos');
        $this->db->join('facturafacil.modulos','permisos.programa = modulos.idmodulo');
        $this->db->where('identificacion',$id);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;       
    }
    public function updatepermisos($datos) {

      $total = count($datos);
       $id = $total - 1;
       for($i = 0;$i < $id;$i++){ 
          $programa = str_pad($i+1, 2, "0", STR_PAD_LEFT); 
          $query = "UPDATE facturafacil.permisos SET permiso=$datos[$i]
           WHERE identificacion=$datos[$id] and programa= $programa";
          $resultado = $this->db->query($query);
       }
  
    }
        public function getpermisosid($id,$programa){
            
        $this->db->select('permiso');
        $this->db->from('facturafacil.permisos');
        $this->db->where('identificacion',$id);
        $this->db->where('programa',$programa);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;       
    }
}

