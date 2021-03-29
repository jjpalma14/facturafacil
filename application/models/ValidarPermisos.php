<?php

class ValidarPermisos extends CI_Model {
    
    public function validaraccesos($identificacion,$programa) {
       
        
        $this->db->select('*');
        $this->db->from('facturafacil.permisos');
        $this->db->where('identificacion',$identificacion);
        $this->db->where('programa',$programa);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado; 
 
    }
                
            
    
}

