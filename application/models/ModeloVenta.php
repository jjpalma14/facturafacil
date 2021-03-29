<?php

class ModeloVenta extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function InsertVentas($datos,$prefijo,$siguiente) {
            $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
            for ($i = 0; $i < count($datos); $i ++) {
            $tipo = $datos[$i]['tipo'];
            $cliente = $datos[$i]['cliente'];
            $codigo = $datos[$i]['codigo'];
            $cantidad = $datos[$i]['cantidad'];
            $valorunitario = $datos[$i]['valorunitario'];
            $total = $datos[$i]['total'];
            $valorunitario = str_replace(",", "", $valorunitario);
            $total = str_replace(",", "", $total);
            $usuario = $datos[$i]['usuario'];
            $query = "INSERT INTO facturafacil.ventas
            (factura, tipo, cliente, cod_articulo, cantidad, valor_unitario, total, usuario_registro, fecha_registro)
            VALUES('$prefijo" . "$numeroConCeros', $tipo, $cliente, $codigo, $cantidad, $valorunitario, $total, $usuario, now());";
            $this->db->query($query);
        }
        echo $prefijo . $numeroConCeros;
    }
      public function DetalleVenta($factura){
        $this->db->select('*');
        $this->db->from('ventas');
        $this->db->join('articulos','ventas.cod_articulo = articulos.codigo');
        $this->db->where('factura',$factura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
      public function ReporteVenta($factura){
        $this->db->select('*');
        $this->db->from('ventas');
        $this->db->join('articulos','ventas.cod_articulo = articulos.codigo');
        $this->db->join('clientes','ventas.cliente = clientes.idclientes');
        $this->db->where('factura',$factura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function getempresa() {
        $this->db->select('*');
        $this->db->from('empresa');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado; 
    }
    public function GetCliente($factura) {
        $this->db->select('*');
        $this->db->from('clientes');
        $this->db->join('ventas','clientes.idclientes = ventas.cliente');
        $this->db->where('factura',$factura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado; 
    }
    public function TotalVentasCreditos($indicador) {
        if($indicador == 1){
        $this->db->select('*');
        $this->db->from('facturafacil.ventas_creditos');
        $this->db->join('clientes','ventas_creditos.clientes = clientes.idclientes');
        $this->db->where('indicador',1);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;  
        }
        if($indicador == 2){
        $this->db->select('*');
        $this->db->from('facturafacil.ventas_creditos');
        $this->db->join('clientes','ventas_creditos.clientes = clientes.idclientes');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;   
        }
        
    }
      public function TotalVentasCreditosFactura($factura) {
        $this->db->select('*');
        $this->db->from('facturafacil.ventas_creditos');
        $this->db->join('clientes','ventas_creditos.clientes = clientes.idclientes');
        $this->db->where('factura',$factura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;  
        
    }
    public function InsertVentasCredito($datos,$prefijo,$siguiente) {
        
            $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
            $total = 0;
            for ($i = 0; $i < count($datos); $i ++) {
            $tipo = $datos[$i]['tipo'];
            $cliente = $datos[$i]['cliente'];
            $total += str_replace(",", "",$datos[$i]['total']);       
            }
            if($tipo == 2){
            $query = "INSERT INTO facturafacil.ventas_creditos
            (factura, clientes, total_credito, fecha_registro, indicador)
            VALUES('$prefijo" . "$numeroConCeros',$cliente, $total,now(),1)";
            $this->db->query($query);
            }
        
    }
        public function InsertVentasServicio($datos,$prefijo,$siguiente) {
            $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
            for ($i = 0; $i < count($datos); $i ++) {
            $tipo = $datos[$i]['tipo'];
            $total = $datos[$i]['total'];
            $cliente = $datos[$i]['cliente'];
            $fecha = $datos[$i]['fecha'];
            $idservicio = $datos[$i]['idservicio'];
            $tiposervicio = $datos[$i]['tiposervicio'];
            $total = str_replace(",", "", $total);
            $usuario = $datos[$i]['usuario'];
            $query = "INSERT INTO facturafacil.ventas_servicio
            (factura, tipo, cliente, tiposervicio, total, usuario_registro, fecha_registro, estado)
            VALUES('$prefijo" . "$numeroConCeros', $tipo, $cliente, '$tiposervicio', $total, $usuario, now(), 0);";
            $this->db->query($query);
        }
        echo $prefijo . $numeroConCeros;
    }
    public function InsertFacturaCargo($datos,$prefijo,$siguiente){
        $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($datos); $i ++) {
         $idservicio = $datos[$i]['idservicio'];
         $query = "UPDATE facturafacil.cargo_servicio
            SET estado=2,cuenta_cobro='$prefijo" . "$numeroConCeros'
            WHERE idcargo_servicio='$idservicio'";
            $this->db->query($query); 
        }  
    }
        function GetVentasServicios() {
        $this->db->select('*');
        $this->db->select_sum('total');
        $this->db->from('facturafacil.ventas_servicio');
        $this->db->join('clientes','ventas_servicio.cliente = clientes.idclientes');
        $this->db->group_by("factura");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;  
    }
    function GetVentasServiciosFactura($factura) {
        $this->db->select('*');
        $this->db->from('facturafacil.ventas_servicio');
        $this->db->join('clientes','ventas_servicio.cliente = clientes.idclientes');
        $this->db->join('observaciones','ventas_servicio.factura = observaciones.documento','left');
        $this->db->join('cargo_servicio','ventas_servicio.factura = cargo_servicio.cuenta_cobro');
        $this->db->where('factura',$factura);
        $this->db->group_by('idcargo_servicio');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    function InsertObservacion($datos,$prefijo,$siguiente){
          $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
          $observacion = "";
          $factura = "";
          for ($i = 0; $i < count($datos); $i ++) {
            $observacion = $datos[$i]['observacion'];
          }
        $query = "INSERT INTO facturafacil.observaciones
        (documento, observacion, usuario_registro, fecha_registro)
        VALUES('$prefijo" . "$numeroConCeros', '$observacion', 'jpalma', now());";
        $this->db->query($query);
    }
    function Acumulado() {
        $mes = date('m');
        $query="select count(distinct(factura)) acumulado from ventas_servicio where month(fecha_registro) = $mes 
        union all
        select count(distinct(factura)) acumulado from ventas where month(fecha_registro) = $mes ";
        $consulta = $this->db->query($query);
        return $consulta->result_array();  
    }
    function acumulado2() {
        $query="select date_format(fecha_registro,'%M') as mes,sum(total) as total from ventas
        group by date_format(fecha_registro,'%M')";
        $consulta = $this->db->query($query);
        return $consulta->result_array();     
    }
     function acumulado3() {
        $query="select date_format(fecha_registro,'%M') as mes,sum(total) as total from ventas_servicio
        group by date_format(fecha_registro,'%M')";
        $consulta = $this->db->query($query);
        return $consulta->result_array();     
    }
    function TotalPagos($factura){
        if($factura == 1){
        $this->db->select('factura');  
        $this->db->select_sum('totalpagado');
        $this->db->from('facturafacil.pagos');
        $this->db->where('estado',$factura);
        $this->db->group_by("factura");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;  
        }else{
        $this->db->select_sum('totalpagado');
        $this->db->from('facturafacil.pagos');
        $this->db->where('factura',$factura);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
    }
    public function totalventasarticulos() {
        $mes = date('m');
        $this->db->select('*'); 
        $this->db->select_sum('total');
        $this->db->from('facturafacil.ventas');
        $this->db->join('clientes','ventas.cliente = clientes.idclientes');
         $this->db->where('month(fecha_registro)',$mes);
        $this->db->group_by("factura");
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;   
    }

}