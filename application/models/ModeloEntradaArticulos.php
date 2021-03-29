<?php

class ModeloEntradaArticulos extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

     public function GetEntradas() {
        $this->db->select('identradas');
        $this->db->select('proveedores.razonsocial');
        $this->db->select('fecha');
        $this->db->select_sum('valor_total');
        $this->db->from('entradas');
        $this->db->join('proveedores', 'entradas.proveedor = proveedores.idproveedores');
        $this->db->group_by("identradas");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
         public function GetSalidas($parametro) {
         
        if($parametro == 1){     
        $this->db->select('documento_salida');
        $this->db->select('fecha');
        $this->db->select_sum('valor');
        $this->db->from('salidas');
        $this->db->where('tipo',04);
        $this->db->group_by("documento_salida");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
        if($parametro == 2){     
        $this->db->select('documento_salida');
        $this->db->select('fecha');
        $this->db->select_sum('valor');
        $this->db->from('salidas');
        $this->db->where('tipo',03);
        $this->db->group_by("documento_salida");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
    }
      public function DetalleEntrada($identrada){
        $this->db->select('*');
        $this->db->from('entradas');
        $this->db->join('articulos','entradas.codigo_producto = articulos.codigo');
        $this->db->where('identradas',$identrada);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
         public function DetalleSalida($idsalida){
        $this->db->select('*');
        $this->db->from('salidas');
        $this->db->join('articulos','salidas.codigo_producto = articulos.codigo');
        $this->db->where('documento_salida',$idsalida);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
     public function TotalEntradas($identrada){ 
        $this->db->select_sum('valor_total');
        $this->db->select_sum('cantidad');
        $this->db->from('entradas');
        $this->db->where('identradas',$identrada);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function GetProveedor($provedor){
        $this->db->select('razonsocial');
        $this->db->from('proveedores');
        $this->db->where('idproveedores',$provedor);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
      public function ReporteSalida($salida){ 
        $this->db->select('tipo');
        $this->db->select('fecha');
        $this->db->select('documento_salida');
        $this->db->select('codigo_producto');
        $this->db->select('descripcion');
        $this->db->select('cantidad');
        $this->db->select('costo_compra');
        $this->db->select('valor');
        $this->db->from('salidas');
        $this->db->join('articulos','salidas.codigo_producto = articulos.codigo');
        $this->db->where('documento_salida',$salida);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;    
    }




}