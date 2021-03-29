<?php

class ModeloArticulo extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function GetID() {
        $this->db->select_max('codigocategoria');
        $this->db->from('categoria');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function InsertCategoria($categoria,$usuario) {
        $query = "INSERT INTO facturafacil.categoria
                (descripcion, estado, fecha_creacion, usuario_creacion, fecha_modificacion, usuario_modificacion)
                 VALUES('$categoria', 1, now(), $usuario, null, null);";
        $this->db->query($query);
    }

    public function GetCategoria() {
        $this->db->select('*');
        $this->db->from('categoria');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function GetIDArticulo() {
        $this->db->select_max('codigo');
        $this->db->from('articulos');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function InsertArticulo($descripcion, $categoria,$codigo,$estado,$usuario) {
        $query = "select * from facturafacil.articulos where codigo='$codigo'";
        $resultado = $this->db->query($query);
        $num = $resultado->num_rows();
        if($num == 0){
        $query = "INSERT INTO facturafacil.articulos
        (descripcion, idcategoria, costo_compra, fecha_creacion, usuario_creacion, fecha_modificacion, usuario_modificacion, estado)
        VALUES('$descripcion', $categoria, 0,  now(), $usuario, '', '', 1);";
        $this->db->query($query);
        }
        if($num == 1){   
        $query = "UPDATE facturafacil.articulos
        SET descripcion='$descripcion', idcategoria=$categoria,fecha_modificacion = now(),usuario_modificacion=$usuario, estado=$estado
        WHERE codigo=$codigo;";
        $this->db->query($query);   
        }
        
    }

    public function GetArticulos($parametro) {
        
        if($parametro == 1){
        $this->db->select('articulos.codigo');
        $this->db->select('articulos.descripcion');
        $this->db->select('categoria.descripcion as categoria');
        $this->db->select('articulos.estado');
        $this->db->from('articulos');
        $this->db->join('categoria', 'articulos.idcategoria = categoria.codigocategoria');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
        }
        if ($parametro == 2){
        $this->db->select('articulos.codigo');
        $this->db->select('articulos.descripcion');
        $this->db->select('categoria.descripcion as categoria');
        $this->db->select('articulos.estado');
        $this->db->from('articulos');
        $this->db->join('categoria', 'articulos.idcategoria = categoria.codigocategoria');
        $this->db->where('articulos.estado',1);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;   
        }
    }

    public function TotalArticulos() {
        $this->db->select('*');
        $this->db->from('articulos');
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        $this->db->count_all_results();
        return $resultado;
    }

    public function EntradaArticulo($datos, $prefijo, $siguiente) {

        $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($datos); $i ++) {
            $tipo = $datos[$i]['tipo'];
            $proveedor = $datos[$i]['proveedor'];
            $nfactura = $datos[$i]['nfactura'];
            $fecha = $datos[$i]['fecha'];
            $codigo = $datos[$i]['codigo'];
            $cantidad = $datos[$i]['cantidad'];
            $valorunitario = $datos[$i]['valorunitario'];
            $total = $datos[$i]['total'];
            $valorunitario = str_replace(",", "", $valorunitario);
            $total = str_replace(",", "", $total);
            $usuario = $datos[$i]['usuario'];
            $query = "INSERT INTO facturafacil.entradas
           (identradas, tipo, proveedor, numero_factura, fecha, codigo_producto, cantidad, valor_unitario, valor_total, fecha_registro, usuario_registro, estado)
            VALUES('$prefijo" . "$numeroConCeros', $tipo, $proveedor, '$nfactura', '$fecha', $codigo, '$cantidad', '$valorunitario', '$total', now(), $usuario, 1);
            ";
            $this->db->query($query);
        }

        echo $prefijo . $numeroConCeros;
    }
       public function SalidaArticulo($datos, $prefijo, $siguiente) {

        $numeroConCeros = str_pad($siguiente, 4, "0", STR_PAD_LEFT);
        for ($i = 0; $i < count($datos); $i ++) {
            $tipo = $datos[$i]['tipo'];
            $fecha = $datos[$i]['fecha'];
            $codigo = $datos[$i]['codigo'];
            $cantidad = $datos[$i]['cantidad'];
            $valorunitario = $datos[$i]['valorunitario'];
            $total = $datos[$i]['total'];
            $valorunitario = str_replace(",", "", $valorunitario);
            $total = str_replace(",", "", $total);
            $usuario = $datos[$i]['usuario'];
            $query = "INSERT INTO facturafacil.salidas
            (codigo_producto, cantidad, valor, documento_salida, fecha, usuario_registro, fecha_registro, tipo)
            VALUES($codigo, $cantidad, $total, '$prefijo$numeroConCeros', ' $fecha', $usuario, now(), '$tipo');
            ";
            $this->db->query($query);
        }

        echo $prefijo . $numeroConCeros;
    }

    public function GetNumeroFactura($modulo) {
        $this->db->select('*');
        $this->db->from('consecutivos');
        $this->db->where('modulo', $modulo);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }

    public function UpdateNumeroFactura($siguiente, $programa) {
        $consecutivo = $siguiente;
        $query = "UPDATE facturafacil.consecutivos
        SET  consecutivo=$consecutivo where modulo='$programa';";
        $this->db->query($query);
    }

    public function GetSaldos($parametro) {
      
        if($parametro == 1){       
        $query="select e.codigo_producto,a.descripcion,a.costo_compra,e.cantidad as entradas,
        case when s.cantidad is null then 0 else s.cantidad end as salidas,
        case when sum(e.cantidad - s.cantidad) is null then e.cantidad else sum(e.cantidad - s.cantidad) end as stock 
        from entrada_productos e
        left join salida_productos s on e.codigo_producto = s.codigo_producto
        join articulos a on e.codigo_producto = a.codigo
        group by e.codigo_producto";
        $consulta = $this->db->query($query);
        return $consulta->result_array();
        }
        if($parametro == 2){
        $query="select e.codigo_producto,a.descripcion,a.costo_compra,e.cantidad as entradas,
        case when s.cantidad is null then 0 else s.cantidad end as salidas,
        case when sum(e.cantidad - s.cantidad) is null then e.cantidad else sum(e.cantidad - s.cantidad) end as stock 
        from entrada_productos e
        left join salida_productos s on e.codigo_producto = s.codigo_producto
        join articulos a on e.codigo_producto = a.codigo
        where a.estado = 1
        group by e.codigo_producto";
        $consulta = $this->db->query($query);
        return $consulta->result_array();   
        }
    }
    public function getsaldosventas(){
        $sql = "select a.codigo,a.descripcion,t.tarifa_actual,
        case when sum(e.cantidad - s.cantidad) is null then e.cantidad else sum(e.cantidad - s.cantidad) end as stock 
        from articulos a
        left join tarifa_articulo t on a.codigo = t.cod_articulo 
        left join entrada_productos e on a.codigo = e.codigo_producto 
        left join salida_productos s on a.codigo = s.codigo_producto 
        where estado = 1 and t.tarifa_actual <> ''
        group by a.codigo";
        $consulta = $this->db->query($sql);
        return $consulta->result_array();
    }

    public function GetUnicoArticulo($codigo) {
        $this->db->select('costo_compra');
        $this->db->from('facturafacil.articulos');
        $this->db->where('codigo', $codigo);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    public function InsertTarifaArticulo($codigo,$tarifa,$usuario) {
        $query = "select * from facturafacil.tarifa_articulo where cod_articulo=$codigo";
        $resultado = $this->db->query($query);
        $num = $resultado->num_rows();
        if($num == 0){
        $query = "INSERT INTO facturafacil.tarifa_articulo
        ( cod_articulo, tarifa_anterior,tarifa_actual, usuario_registro, fecha_registro, usuario_modifica, fecha_modifica)
        VALUES($codigo, 0,$tarifa, $usuario, now(), '', '');";
        $this->db->query($query);
        echo "1";
    }else{
        $query = "update facturafacil.tarifa_articulo set tarifa_actual=$tarifa,usuario_modifica = $usuario, fecha_modifica=now() where cod_articulo=$codigo";
        $this->db->query($query);
        echo "2";
    }
        
    }
    public function GetInfoTarifa($codigo) {
        $this->db->select('*');
        $this->db->from('articulos');
        $this->db->join('tarifa_articulo', 'articulos.codigo = tarifa_articulo.cod_articulo ','left');
        $this->db->where('codigo', $codigo);
        $consulta = $this->db->get();
        $resultado = $consulta->result();
        return $resultado;
    }
    

}
