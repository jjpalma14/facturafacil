<?php

class ModeloMenu extends CI_Model {

    public function __construct() {
        parent::__construct();
    }
    
    public function getmenu(){
        $this->db->select('*');
        $this->db->from('facturafacil.MenuPpal');
        $this->db->where('estado',0);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
     public function getmodulos($menu){
        $this->db->select('*');
        $this->db->from('facturafacil.modulos');
        $this->db->where('estado',0);
        $this->db->where('idmenu',$menu);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    
    
    
}

