<?php

class ModeloTipoServicio extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    

    function gettipo() {
        $this->db->select('*');
        $this->db->from('facturafacil.tipo_servicio');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }




}
