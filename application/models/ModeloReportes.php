<?php

class ModeloReportes extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    public function detalleventa($inicio,$fin) {
        $query="select factura,'Servicios' as tipo2,case when tipo = 2 then 'Credito' else 'Contado' end as tipo,c.razonsocial,date_format(fecha_registro,'%Y-%m-%d') as fecha,sum(total) as total from ventas_servicio v
        join clientes c on v.cliente = c.idclientes 
        where date_format(fecha_registro,'%Y-%m-%d') >= '$inicio' and date_format(fecha_registro,'%Y-%m-%d') <= '$fin'
        group by factura 
        union all
        select factura,'Articulos' as tipo2,case when tipo = 2 then 'Credito' else 'Contado' end as tipo,c.razonsocial ,date_format(fecha_registro,'%Y-%m-%d') as fecha,sum(total) as total from ventas v
        join clientes c on v.cliente = c.idclientes
        where date_format(fecha_registro,'%Y-%m-%d') >= '$inicio' and date_format(fecha_registro,'%Y-%m-%d') <= '$fin'
        group by factura 
        order by factura ";
        $consulta = $this->db->query($query);
        return $consulta->result_array();    
    }
    
    
}

