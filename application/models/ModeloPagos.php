<?php

class ModeloPagos extends CI_Model {
    
    
    public function InsertPagos($factura,$total,$usuario,$indicador) {
        if($indicador == 1){
        $total = str_replace(",", "", $total);
        $query = "INSERT INTO facturafacil.pagos
        (factura, totalpagado, estado, fecha_registro, usuario_registro)
        VALUES('$factura', $total, 0, now(), $usuario);";
        $resultado = $this->db->query($query);  
        echo 1;
        }if($indicador == 2){
        $total = str_replace(",", "", $total);
        $query = "INSERT INTO facturafacil.pagos
        (factura, totalpagado, estado, fecha_registro, usuario_registro)
        VALUES('$factura', $total, 1, now(), $usuario);";
        $resultado = $this->db->query($query);
        echo 1;
        }
  
    }
    public function UpdateEstadoCredito1($factura){
      $query="UPDATE facturafacil.ventas_creditos
              SET indicador=0
              WHERE factura= '$factura';";
              $resultado = $this->db->query($query);
        
        
    }
    public function UpdateEstadoCredito2($factura){
      $query="UPDATE facturafacil.pagos
      SET estado=0
      WHERE factura='$factura';";
              $resultado = $this->db->query($query);
        
        
    }
        
    }

    
    
    


