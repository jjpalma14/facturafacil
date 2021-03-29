<?php
require_once APPPATH . 'third_party/fpdf/fpdf.php';
require_once APPPATH . 'third_party/conversor.php';
defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->model('ModeloServicio');
$this->load->model('ModeloLogin');
class PDF extends FPDF
{

    function RoundedRect($x, $y, $w, $h, $r, $corners = '1234', $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' || $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2F %.2F m',($x+$r)*$k,($hp-$y)*$k ));

        $xc = $x+$w-$r;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l', $xc*$k,($hp-$y)*$k ));
        if (strpos($corners, '2')===false)
            $this->_out(sprintf('%.2F %.2F l', ($x+$w)*$k,($hp-$y)*$k ));
        else
            $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);

        $xc = $x+$w-$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-$yc)*$k));
        if (strpos($corners, '3')===false)
            $this->_out(sprintf('%.2F %.2F l',($x+$w)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);

        $xc = $x+$r;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2F %.2F l',$xc*$k,($hp-($y+$h))*$k));
        if (strpos($corners, '4')===false)
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-($y+$h))*$k));
        else
            $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);

        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$yc)*$k ));
        if (strpos($corners, '1')===false)
        {
            $this->_out(sprintf('%.2F %.2F l',($x)*$k,($hp-$y)*$k ));
            $this->_out(sprintf('%.2F %.2F l',($x+$r)*$k,($hp-$y)*$k ));
        }
        else
            $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2F %.2F %.2F %.2F %.2F %.2F c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }    
// Page header
function Header()
{
    
    $consecutivo = $_GET['consecutivo'];
    
    $obj = new ModeloServicio();
    $datos = $obj->GetServicios($consecutivo);
    foreach ($datos as $item) {
        $cliente = $item->razonsocial;
        $fecha = $item->fecha_servicio;
        $tipo = $item->tipo;
        $id = $item->idcargo_servicio;
        $idusuario = $item->usuario_registro;
        $estado = $item->estado;
    }
    $obj2 = new ModeloLogin();
    $usuario = $obj2->GetUsuarios($idusuario);
    foreach ($usuario as $item) {
       $nombres = $item->nombres;
       $apellidos = $item->apellidos; 
    }
    // Logo
    /*$this->Image('logo.png',10,6,30);*/
    // Arial bold 15
    $this->Image(base_url().'/assets/images/jpc.jpg',10,10,11.4); 
    $this->SetFont('Arial','B',12);

    // Move to the right
    // Title
    $this->SetFillColor(230,230,230); 
    $this->Cell(12);
    $this->Cell(178,14,'SERVICIO',0,0,'C',true);
    $this->Ln(6);
    $this->SetFont('Arial','',8);
    $this->RoundedRect(10, 28, 190, 18, 2, '1234', 'DL');
    $this->Ln(12);
    $this->SetFont('Arial','B',9);
    $this->Ln(1);
    $this->Cell(14,6,'Cliente:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    $this->Cell(176,6,$cliente,0,0,'L',false);
    $this->Ln(5);
    $this->SetFont('Arial','B',9);
    $this->Cell(14,6,'Fecha:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    $this->Cell(60,6,$fecha,0,0,'L',false);
    $this->SetFont('Arial','B',9);
    $this->Cell(22,6,'Consecutivo:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    $this->Cell(30,6,$id,0,0,'L',false);
     $this->SetFont('Arial','B',9);
    $this->Cell(11,6,'Tipo:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    $this->Cell(53,6,$tipo,0,0,'L',false);
    $this->Ln(5);
    $this->SetFont('Arial','B',9);
    $this->Cell(30,6,'Usuario Ejecutor:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    $this->Cell(96,6,$nombres." ".$apellidos,0,0,'L',false);
    $this->SetFont('Arial','B',9);
    $this->Cell(14,6,'Estado:',0,0,'L',false);
    $this->SetFont('Arial','',9);
    if($estado == 2){
      $this->Cell(52,6,"Facturado",0,0,'L',false);  
    }
    if($estado == 1){
      $this->Cell(52,6,"Anulado",0,0,'L',false);  
    }
    if($estado == 0){
      $this->Cell(52,6,"Activo",0,0,'L',false);  
    }
    $this->Ln(10);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetFillColor(230,230,230); 
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','B',8);
    // Page number
    $this->Cell(0,5,'Pagina '.$this->PageNo().' de {nb}',0,0,'C',true);
}
}

// Instanciation of inherited class
$pdf = new PDF('L', 'mm', array(216, 140));
$pdf->AliasNbPages();
$pdf->AddPage();
$consecutivo = $_GET['consecutivo'];
    
    $obj = new ModeloServicio();
    $datos = $obj->GetServicios($consecutivo);
    foreach ($datos as $item) {
        $detalle = $item->descripcion;
        $total = $item->total;
    }
$pdf->SetFont('Arial','B',11);
$pdf->Cell(190,6,"DETALLE",0,0,'C');
$pdf->Ln(8);
$pdf->SetFont('Arial','',8);

$pdf->MultiCell(190,4,$detalle,0,'L',false);
$pdf->RoundedRect(10, 56, 190, 30, 2, '1234', 'DL');

$pdf->SetFont('Arial','I',10);
$pdf->SetY(-53);
$pdf->Cell(32,6,"VALOR SERVICIO:",0,0,'L');
$pdf->Cell(18,6,number_format($total)." (".numletras($total).")",0,0,'L');
$pdf->Ln(20);
$pdf->SetFont('Arial','',10);
$pdf->Cell(190,6,utf8_decode("________________________________"),0,0,'C');
$pdf->Ln(4);
$pdf->Cell(190,6,utf8_decode("FIRMA DE SATISFACCIÓN"),0,0,'C');
$pdf->Output();
?>


