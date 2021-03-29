<?php

class ModeloServicio extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function InsertServicio($cliente, $tipo, $fecha, $detalle, $prefijo, $siguiente,$usuario,$totalcargo) {
        $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
        $query = "INSERT INTO facturafacil.cargo_servicio
        (idcargo_servicio, idcliente, tipo, descripcion, fecha_servicio, usuario_registro, fecha_registro, estado,total,cuenta_cobro)
        VALUES('$prefijo" . "$numeroConCeros', $cliente, $tipo, '$detalle', '$fecha', $usuario, now(), 0,$totalcargo,'');";
        $this->db->query($query);
        $msg = [1,'Se genero el servicio con el siguiente consecutivo ',$prefijo,$numeroConCeros];
        echo json_encode($msg);
    }
    
    
    public function UpdateServicio($cliente,$tipo,$fecha,$detalle,$consecutivo,$usuario,$totalcargo) {
        $query = "UPDATE facturafacil.cargo_servicio
        SET idcliente=$cliente, tipo=$tipo, descripcion='$detalle', fecha_servicio='$fecha',total=$totalcargo 
        WHERE idcargo_servicio='$consecutivo';";
        $this->db->query($query);
        $msg = [1,'El servicio '.$consecutivo.' fue actualizado'];
        echo json_encode($msg);  
    }
    
    
    
    public function getcargos($cliente) {
        $this->db->select('idcargo_servicio');
        $this->db->select('tipo_servicio.idtipo_servicio');
        $this->db->select('tipo_servicio.tipo');
        $this->db->select('fecha_servicio');
        $this->db->select('total');
        $this->db->from('cargo_servicio');
        $this->db->join('tipo_servicio','cargo_servicio.tipo = tipo_servicio.idtipo_servicio');
        $this->db->where('estado',0);
        $this->db->where('idcliente',$cliente);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        
    }
    public function GetServicios($parametro) {
        $mes = date('m');
        if($parametro == 1){
        $this->db->select('*');
        $this->db->select('cargo_servicio.estado');
        $this->db->from('cargo_servicio');
        $this->db->join('tipo_servicio','cargo_servicio.tipo = tipo_servicio.idtipo_servicio');
        $this->db->join('clientes','cargo_servicio.idcliente = clientes.idclientes');
        $this->db->where('month(fecha_servicio)',$mes);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado; 
        }else{
        $this->db->select('*');
        $this->db->select('cargo_servicio.estado');
        $this->db->from('cargo_servicio');
        $this->db->join('tipo_servicio','cargo_servicio.tipo = tipo_servicio.idtipo_servicio');
        $this->db->join('clientes','cargo_servicio.idcliente = clientes.idclientes');
        $this->db->where('idcargo_servicio',$parametro);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;    
        }
    }
    public function GetServicios2($parametro) {
        $this->db->select('*');
        $this->db->from('cargo_servicio');
        $this->db->where('idcargo_servicio',$parametro);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;       
    }
 
    public function Insertauditoria($tipo,$documento,$usuario) {
        $query = "INSERT INTO facturafacil.movimientos
        (tipo, documento, usuario, fecha_registro)
        VALUES('$tipo', '$documento', $usuario, now());";
        $this->db->query($query);  
    }
    public function Anularcargo($consecutivo) {
        $query = "UPDATE facturafacil.cargo_servicio
        SET estado=1 
        WHERE idcargo_servicio='$consecutivo';";
        $this->db->query($query);  
    }

}