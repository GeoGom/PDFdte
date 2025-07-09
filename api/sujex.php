<?php

include 'phpFunctions.php';

require_once __DIR__ . '/PHPMailer-Master/src/PHPMailer.php';
require_once __DIR__ . '/PHPMailer-Master/src/SMTP.php';
require_once __DIR__ . '/PHPMailer-Master/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


// Identificación
$version         = $data['identificacion']['version'];          // Ejemplo: 1
$numeroControl   = $data['identificacion']['numeroControl'];    // Ejemplo: "DTE-01-S001P002-..."
$codigoGeneracion= $data['identificacion']['codigoGeneracion']; // Ejemplo: "2115B283-4E18-11F0-..."
$tipoModelo      = $data['identificacion']['tipoModelo'];       // Ejemplo: 1
$tipoOperacion   = $data['identificacion']['tipoOperacion'];    // Ejemplo: 1
$tipoContingencia= $data['identificacion']['tipoContingencia']; // Puede ser null
$motivoContin    = $data['identificacion']['motivoContin'];     // Puede ser null
$fecEmi          = $data['identificacion']['fecEmi'];           // Ejemplo: "2025-06-20"
$horEmi          = $data['identificacion']['horEmi'];           // Ejemplo: "14:50:01"
$tipoMoneda      = $data['identificacion']['tipoMoneda'];       // Ejemplo: "USD"

$selloRecibido   = $data['selloRecibido'];
$estado          = $data['estado'];
$fechaTransmision = $data['fhProcesamiento'];

// Emisor
$emisorNombre = $data['emisor']['nombre'];
$emisorNIT = $data['emisor']['nit'];
$emisorCorreo = $data['emisor']['correo'];
$emisorNRC = $data['emisor']['nrc'];
$emisorDescActividad = $data['emisor']['descActividad'];
$emisorTelefono = $data['emisor']['telefono'];
$emisorDireccion = $data['emisor']['direccion']['complemento'];


// Receptor
$receptorNombre = $data['sujetoExcluido']['nombre'];
$receptorDocumento = $data['sujetoExcluido']['numDocumento'];
$receptorCorreo = $data['sujetoExcluido']['correo'];
$receptorDescActividad = $data['sujetoExcluido']['descActividad'];
$receptorTelefono = $data['sujetoExcluido']['telefono'];
$receptorDireccion = $data['sujetoExcluido']['direccion']['complemento'];



// Items del cuerpo del documento
$cuerpoDocumento = $data['cuerpoDocumento'];




$QR_data = "https://admin.factura.gob.sv/consultaPublica?ambiente=".$ambiente."&codGen=".$codigoGeneracion."&fechaEmi=".$fecEmi;





require_once('tcpdf/tcpdf.php');
//Estilo para codigo QR
$style = array(
    'border' => 2,
    'vpadding' => 'auto',
    'hpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetMargins(0, 0, 0, true);
$pdf->AddPage();

$titulo1max = 14;
$titulo1 = 10;
$titulo2 = 8;
$texto = 6;

//DATOS DEL DOCUMENTO ELECTRONICO Y QR

// Imprimir un cuadrado como caja de texto sin fondo
//$pdf->Rect(x, y, ancho, alto, 'D', array(), array(0,0,0));
$pdf->Rect(90, 10, 112, 45, 'D', array(), array(0,0,0));

$pdf->SetXY(90, 12); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo1max); //formato de la celda
$pdf->Cell(0, 3, 'SUJETO EXCLUIDO' , 0, 1, 'C');//contenido de la celda

$x_documento = 92;
$x_documento2 = 120;

// Imprimir una línea divisoria
$pdf->Line($x_documento, 20, 198, 20, array('width' => 0.5, 'color' => array(0,0,0)));

//imprecion de codigo QR
//$pdf->write2DBarcode(contenido del QR, 'QRCODE,H', x, y, ancho, alto, $style, 'N');
$pdf->write2DBarcode($QR_data, 'QRCODE,H', 168, 22, 30, 30, $style, 'N');



$pdf->SetXY($x_documento, 22); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Codigo de Generacion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 25); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $codigoGeneracion , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 28); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Numero de Control:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 31); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $numeroControl , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 34); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Sello de Resepcion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 37); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $selloRecibido , 0, 1, 'L');//contenido de la celda 

$pdf->SetXY($x_documento, 40); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Fecha de Transmicion:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $fechaTransmision , 0, 1, 'L');//contenido de la celda 

$pdf->SetXY($x_documento, 46); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Fecha de Emision:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento, 49); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $fecEmi , 0, 1, 'L');//contenido de la celda


$pdf->SetXY($x_documento2, 40); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Modelo de Facturacion:" , 0, 1, 'L');//contenido de la celda
/*
$pdf->SetXY($x_documento2, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoModelo , 0, 1, 'L');//contenido de la celda 
*/
$pdf->SetXY($x_documento2, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, 'PREVIO' , 0, 1, 'L');//contenido de la celda 
/*
$pdf->SetXY($x_documento2, 46); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Tipo de Transmision:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento2, 49); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoDte , 0, 1, 'L');//contenido de la celda
*/



//DATOS DEL EMISOR DEL DOCUMENTO



// Establecer la posición de la imagen
$pdf->SetXY(8, 5);
// Insertar la imagen
$imagen = "img/img.png"; // Ruta de la imagen
$anchoMax = 85; // Ancho máximo permitido
$altoMax = 21; // Alto máximo permitido

// Insertar imagen ajustada proporcionalmente al cuadro
$pdf->Image(
    $imagen,
    '', '', // Posición X, Y (déjalos automáticos)
    $anchoMax,
    $altoMax,
    '', // Tipo de imagen
    '', // Link
    '', // Align
    false, // Resize (no estira la imagen a la fuerza)
    300, // DPI
    '', // Alt
    false, // isMask
    false, // imgMask
    0, // Border
    'L', // Fit box alignment (Left top corner)
    true // Fit box (mantiene proporción dentro del ancho/alto)
);

$x_emisor = 7;
$x_emisor2 = 40;
$y_emisor = 27;
$y_emisor_desplasamiento = 4;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, $emisorNombre , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NIT: " . $emisorNIT , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_emisor2, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NRC: " . $emisorNRC , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$direccion_parts = Salto_linea(75 , $emisorDescActividad);

foreach ($direccion_parts as $part) {
    $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
    $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
    $pdf->Cell(0, 3, $part , 0, 1, 'L');//contenido de la celda
    $y_emisor = $y_emisor + $y_emisor_desplasamiento;
}

$direccion_parts = Salto_linea(65 , $emisorDireccion);

foreach ($direccion_parts as $part) {
    $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
    $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
    $pdf->Cell(0, 3, $part, 0, 1, 'L');
    $y_emisor = $y_emisor + $y_emisor_desplasamiento;
}


$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: " . $emisorTelefono , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: " . $emisorCorreo , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 58, 205, 58, array('width' => 0.5, 'color' => array(0,0,0)));




//DATOS DEL CLIENTE 


$x_cliente = 7;
$x_cliente2 = 50;
$y_cliente = 60;
$y_cliente_desplasamiento = 4;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Cliente: ". $receptorNombre , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Direccion: ". $receptorDireccion  , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: ". $receptorTelefono , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: ". $receptorCorreo , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Documento: ". $receptorDocumento , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Giro: ". $receptorDescActividad , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 80, 205, 80, array('width' => 0.5, 'color' => array(0,0,0)));



//DETALLE DEL documento :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::


$y_detalle = 82;
$y_detale_incremento = 4;

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "No." , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 12, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "CODIGO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 33, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "MEDIDA" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 45, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "DESCRIPCION" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 118, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "CANTIDAD" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 132, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "PRECIO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 144, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "DESCUENTO" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 160, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "NO SUJETAS" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 176, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "EXENTAS" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 190, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "GRAVADAS" , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 88, 205, 88, array('width' => 0.5, 'color' => array(0,0,0)));

$item = 1;


$y_detalle = 90;
$y_detale_incremento = 4;

$gravada = null;
$exentas = null;
$no_sujetas = null;

$descuento_total = 0;
$SUMA = 0;
$suma_exentas = 0;
$pagianas = 1;
$max_y = $pdf->GetPageHeight();

foreach ($cuerpoDocumento as $rowP) {
  $numItem        = $rowP['numItem'];
  $tipoItem       = $rowP['tipoItem'];
  $cantidad       = $rowP['cantidad'];
  $codigo         = $rowP['codigo'];
  $uniMedida      = $rowP['uniMedida'];
  $descripcion    = $rowP['descripcion'];
  $precioUni      = $rowP['precioUni'];
  $montoDescu     = $rowP['montoDescu'];
  $ventaNoSuj     = '0.00';
  $ventaExenta    = '0.00';
  $ventaGravada   = $rowP['compra'];


  if ($pdf->GetY() >= $max_y -60) { // Ajusta este valor según tus necesidades

      // Imprimir una línea divisoria
      $pdf->Line(7, $max_y -55, 205, $max_y -55, array('width' => 0.5, 'color' => array(0,0,0)));

      $pdf->SetXY( 7, $max_y - 30); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

      $pagianas = $pagianas + 1;
      
      //contenido de pie de pagina 

      
      // Agrega una nueva página
      $pdf->AddPage();
      // Reinicia la posición vertical a la parte superior de la página
      //DATOS DEL DOCUMENTO ELECTRONICO Y QR

      // Imprimir un cuadrado como caja de texto sin fondo
      //$pdf->Rect(x, y, ancho, alto, 'D', array(), array(0,0,0));
      $pdf->Rect(90, 10, 112, 45, 'D', array(), array(0,0,0));

      $pdf->SetXY(90, 12); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo1); //formato de la celda
      $pdf->Cell(0, 3, 'SUJETO EXCLUIDO' , 0, 1, 'C');//contenido de la celda

      $x_documento = 92;
      $x_documento2 = 120;

      // Imprimir una línea divisoria
      $pdf->Line($x_documento, 20, 198, 20, array('width' => 0.5, 'color' => array(0,0,0)));

      //imprecion de codigo QR
      //$pdf->write2DBarcode(contenido del QR, 'QRCODE,H', x, y, ancho, alto, $style, 'N');
      $pdf->write2DBarcode($QR_data, 'QRCODE,H', 168, 22, 30, 30, $style, 'N');



      $pdf->SetXY($x_documento, 22); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Codigo de Generacion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 25); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $documento , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 28); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Numero de Control:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 31); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $control , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 34); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Sello de Resepcion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 37); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $sello , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento, 40); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Fecha de Transmicion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 43); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $f_trasmision , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento, 46); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Fecha de Emision:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento, 49); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $f_emicion , 0, 1, 'L');//contenido de la celda


      $pdf->SetXY($x_documento2, 40); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Modelo de Facturacion:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento2, 43); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $modelo_dte , 0, 1, 'L');//contenido de la celda 

      $pdf->SetXY($x_documento2, 46); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Tipo de Transmision:" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_documento2, 49); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
      $pdf->Cell(0, 3, $tipo_dte , 0, 1, 'L');//contenido de la celda




      //DATOS DEL EMISOR DEL DOCUMENTO



      // Establecer la posición de la imagen
      $pdf->SetXY(8, 5);
      // Insertar imagen ajustada proporcionalmente al cuadro
      $pdf->Image(
          $imagen,
          '', '', // Posición X, Y (déjalos automáticos)
          $anchoMax,
          $altoMax,
          '', // Tipo de imagen
          '', // Link
          '', // Align
          false, // Resize (no estira la imagen a la fuerza)
          300, // DPI
          '', // Alt
          false, // isMask
          false, // imgMask
          0, // Border
          'L', // Fit box alignment (Left top corner)
          true // Fit box (mantiene proporción dentro del ancho/alto)
      );

      $x_emisor = 7;
      $x_emisor2 = 40;
      $y_emisor = 27;
      $y_emisor_desplasamiento = 4;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, $representante , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NIT: " . $nit , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_emisor2, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NRC: " . $nrc , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Giro: " . $giro , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;


      foreach ($direccion_parts as $part) {
          $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
          $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
          $pdf->Cell(0, 3, $part, 0, 1, 'L');
          $y_emisor = $y_emisor + $y_emisor_desplasamiento;
      }


      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Telefono: " . $tel , 0, 1, 'L');//contenido de la celda
      $y_emisor = $y_emisor + $y_emisor_desplasamiento;

      $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "E-Mail: " . "facturacionelectronicagalo23@gmail.com" , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 58, 205, 58, array('width' => 0.5, 'color' => array(0,0,0)));




      //DATOS DEL CLIENTE 


      $x_cliente = 7;
      $x_cliente2 = 50;
      $y_cliente = 60;
      $y_cliente_desplasamiento = 4;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Cliente: ". $cliente , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Direccion: ". $direccion_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Telefono: ". $tel_cli , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "E-Mail: ". $mail_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Documento: ". $receptorDocumento , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Giro: ". $receptorDescActividad , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 80, 205, 80, array('width' => 0.5, 'color' => array(0,0,0)));



      //DETALLE DEL documento


      $y_detalle = 82;
      $y_detale_incremento = 4;

      $pdf->SetXY( 7, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "No." , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 12, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "CODIGO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 33, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "MEDIDA" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 45, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "DESCRIPCION" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 118, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "CANTIDAD" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 132, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "PRECIO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 144, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "DESCUENTO" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 160, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NO SUJETAS" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 176, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "EXENTAS" , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 190, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
      $pdf->Cell(0, 3, "GRAVADAS" , 0, 1, 'L');//contenido de la celda

      // Imprimir una línea divisoria
      $pdf->Line(7, 88, 205, 88, array('width' => 0.5, 'color' => array(0,0,0)));

      $y_detalle = 90;
      $y_detale_incremento = 4;
  }


  $p_exento = 0.00;

  if ($p_exento > 0){
      $exentas = 0.00;
      $gravada = 0.00;
      $no_sujetas = 0.00;
  }else{
      $gravada = 0.00;
      $exentas =0.00;
      $no_sujetas = 0.00;
  }

  $pdf->SetXY( 7, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $numItem , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 12, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $codigo , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 33, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, 'UNID'  , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 118, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, $cantidad , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 132, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($precioUni,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 144, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($montoDescu,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 160, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaNoSuj,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 176, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaExenta,4,'.',',') , 0, 1, 'L');//contenido de la celda

  $pdf->SetXY( 190, $y_detalle); //posicion de la celda
  $pdf->SetFont('helvetica', '', $texto); //formato de la celda
  $pdf->Cell(0, 3, number_format($ventaGravada,2,'.',',') , 0, 1, 'L');//contenido de la celda

  $producto_cadena = $descripcion;

  $productos_parts = Salto_linea(60,$producto_cadena);
  
  foreach ($productos_parts as $producto_lineas){
      $pdf->SetXY( 45, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $producto_lineas , 0, 1, 'L');//contenido de la celda
      $y_detalle = $y_detalle + $y_detale_incremento;
  }
}


$resumen = $data['resumen'];

$totalCompra     = $resumen['totalCompra'];
$descuento          = $resumen['descu'];
$totalDescuento     = $resumen['totalDescu'];
$subTotal           = $resumen['subTotal'];
$ivaRete1           = $resumen['ivaRete1'];
$reteRenta          = $resumen['reteRenta'];
$totalPagar         = $resumen['totalPagar'];
$totalLetras        = $resumen['totalLetras'];
$condicionOperacion = $resumen['condicionOperacion'];
$pagos              = $resumen['pagos'];
$observaciones      = $resumen['observaciones'];



$y_detalle = $max_y - 60;
// Imprimir una línea divisoria
$pdf->Line(7, $y_detalle, 205, $y_detalle, array('width' => 0.5, 'color' => array(0,0,0)));


$pdf->SetXY( 7, $max_y - 30); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

//TOTALES DEL DOCUMENTO
$y_detalleL = $y_detalle + $y_detale_incremento;

$y_detalleR = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Suma: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($totalCompra,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Descuentos: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($totalDescuento,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Sub Total: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($subTotal,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;


if($ivaRete1 > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"IVA Retenido: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($ivaRete1,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}

if($reteRenta > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Retención de renta: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($reteRenta,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}



$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($totalPagar,2,'.',',') , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Forma de Pago: " , 0, 1, 'L');//contenido de la celda

if ($condicionOperacion == 1) {
  $condicionOperacion = "Contado";
} elseif ($condicionOperacion == 2) {
  $condicionOperacion = "Crédito";
} else {
  $condicionOperacion = "No especificada";
}

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $condicionOperacion , 0, 1, 'L');//contenido de la celda






$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "SON: " . $totalLetras , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;


$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Observaciones: " . $observaciones , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;



$example = $codigoGeneracion.".pdf";
$nombreJSON = $codigoGeneracion.".json";

if($print == '1'){
    $pdf->Output($example, 'I');
}else if($print == '2'){
    $pdf->Output($example, 'D');
}elseif($print == '3'){

    $rutaJSON = __DIR__ . '/' . $nombreJSON;
    file_put_contents($rutaJSON, $json);

    $rutaPDF = __DIR__ . '/' . $example;
    $pdf->Output($rutaPDF, 'F'); // 'F' = File en el servidor

    // 5. Enviar correo
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP personalizado
        $mail->isSMTP();
        $mail->Host       = 'csmx1.csistemas.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'jarris28@csistemas.com';
        $mail->Password   = 'CaHmbd#VY3';
        $mail->SMTPSecure = 'ssl'; // Según tu config
        $mail->Port       = 465;

        // Configuración del correo
        $mail->setFrom('jarris28@csistemas.com', 'Factura Electronica');
        //$mail->addAddress($receptorCorreo);
        $mail->addAddress('alexis9871@gmail.com');
        $mail->addReplyTo('info@csistemas.com');

        $mail->ConfirmReadingTo = 'info@csistemas.com';

        //Adjuntamos los archivos
        $mail->addAttachment($rutaPDF);  // PDF
        $mail->addAttachment($rutaJSON); // JSON

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = $emisorNombre;
        $mail->Body    = '<b>Buen dia, '.$receptorNombre.'</b><br>Adjunto encontraras el documento PDF de tu factura y el archivo Json.';

        // Enviar correo
        $mail->send();
        echo 'Correo enviado correctamente.';

    } catch (Exception $e) {
        echo "Error al enviar el correo: {$mail->ErrorInfo}";
    }

    // Opcional: eliminar el archivo generado
    unlink($rutaPDF);
    unlink($rutaJSON);




}else{
    echo 'No se a definido el meto de imprecion del archivo';
}




?>