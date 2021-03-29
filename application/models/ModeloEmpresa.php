<?php

class ModeloEmpresa extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function obtener_empresa() {
        $this->db->select('*');
        $this->db->from('empresa');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function InsertEmpresa($razonsocial, $nit, $direccion, $telefono, $email) { 
            $query = "UPDATE facturafacil.empresa
                      SET razon_social='$razonsocial', nit='$nit', direccion='$direccion', telefono='$telefono', email='$email' ";
            $this->db->query($query);
        
    }

    public function InsertCliente($razonsocial, $nit, $direccion, $telefono, $email, $estado,$usuario) { 
            $query = "INSERT INTO facturafacil.clientes
            (razonsocial, nit, direccion, telefono, email, estado, fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacio)
            VALUES('$razonsocial', '$nit', '$direccion', '$telefono', '$email', $estado, now(), '', $usuario, '');
";
            $this->db->query($query);
        
    }

    public function ListarClientes($estado) {
        if($estado == 1){
        $this->db->select('idclientes');
        $this->db->select('nit');
        $this->db->select('razonsocial');
        $this->db->select('estado');
        $this->db->from('clientes');
        $this->db->where('estado',$estado);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;    
        }
        if($estado == 2){
        $this->db->select('idclientes');
        $this->db->select('nit');
        $this->db->select('razonsocial');
        $this->db->select('estado');
        $this->db->from('clientes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
    }

    public function GetClienteID($id) {
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->where('idclientes', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function ModificarCliente($razonsocial, $nit, $direccion, $telefono, $email, $estado, $id,$usuario) { 
            $query = "UPDATE facturafacil.clientes
            SET razonsocial='$razonsocial', nit='$nit', direccion='$direccion', telefono='$telefono', email='$email', estado=$estado, fecha_modificacion=now(), usuario_modificacio=$usuario
            WHERE idclientes=$id;
            ";
            $this->db->query($query);
        }
    

    public function InsertProveedor($razonsocial, $nit, $direccion, $telefono, $email, $estado, $usuario) { 
            $query = "INSERT INTO facturafacil.proveedores
            (razonsocial, nit, direccion, telefono, email, estado, fecha_creacion, fecha_modificacion, usuario_creacion, usuario_modificacio)
            VALUES('$razonsocial', '$nit', '$direccion', '$telefono', '$email', $estado, now(), '', $usuario, '')";
            $this->db->query($query);
        
    }

    public function ListarProveedores($estado) {
       
        if($estado == 1){
        $this->db->select('idproveedores');
        $this->db->select('nit');
        $this->db->select('razonsocial');
        $this->db->select('estado');
        $this->db->from('proveedores');
        $this->db->where('estado',$estado);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
         if($estado == 2){
        $this->db->select('idproveedores');
        $this->db->select('nit');
        $this->db->select('razonsocial');
        $this->db->select('estado');
        $this->db->from('proveedores');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
    }
      public function GetProveedorID($id) {
        $this->db->select('*');
        $this->db->from('proveedores');
        $this->db->where('idproveedores', $id);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
      public function ModificarProveedor($razonsocial, $nit, $direccion, $telefono, $email, $estado, $id,$usuario) { 
            $query = "UPDATE facturafacil.proveedores
            SET razonsocial='$razonsocial', nit='$nit', direccion='$direccion', telefono='$telefono', email='$email', estado=$estado, fecha_modificacion=now(), usuario_modificacio=$usuario
            WHERE idproveedores=$id;
            ";
            $this->db->query($query);
        }
    

}
