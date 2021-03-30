<?php

class ModeloBusqueda extends CI_Model {
    
    
    public function buscarmodulos($txtbusqueda) {
       $query = "select * from modulos where modulo like '%$txtbusqueda%' and idmenu <> 99";
       $consulta = $this->db->query($query);
       return $consulta->result_array(); 
       
    }
    
    
    
}

