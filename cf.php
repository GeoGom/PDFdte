<?php
include 'config.php';
include 'nletras.php';
$conexion = mysqli_connect($host, $user, $pass, $db, $port);

//$codGeneracionPost = $_POST['Cod'];
$codGeneracionPost = '750DB3B3-4E0C-11F0-8758-F23C91ADD57D';

$sql = "SELECT js_data_tx as JsonData FROM cs_json_data WHERE dt_codigo_generacion = '$codGeneracionPost'";
$query = mysqli_query($conexion, $sql);
$json_row = mysqli_fetch_assoc($query);
$json = $json_row['JsonData']; 

$json = preg_replace('/"observaciones"\s*:\s*,/', '"observaciones": null,', $json);
$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    exit;
}

//$claves = array_keys($data);

/*
Este es el resultado del array data 
  "identificacion",
  "documentoRelacionado",
  "otrosDocumentos",
  "emisor",
  "receptor",
  "ventaTercero",
  "cuerpoDocumento",     // Este es el array de productos
  "resumen",
  "extension",
  "apendice",
  "estado",
  "selloRecibido",
  "fhProcesamiento",
  "observaciones",
  "firma"
*/ 

//IDENTIFICACION 
$version         = $data['identificacion']['version'];          // Ejemplo: 1
$ambiente        = $data['identificacion']['ambiente'];         // Ejemplo: "01"
$tipoDte         = $data['identificacion']['tipoDte'];          // Ejemplo: "01"
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


//EMISOR
$nit               = $data['emisor']['nit'];
$nrc               = $data['emisor']['nrc'];
$nombre            = $data['emisor']['nombre'];
$codActividad      = $data['emisor']['codActividad'];
$descActividad     = $data['emisor']['descActividad'];
$nombreComercial   = $data['emisor']['nombreComercial'];
$tipoEstablecimiento = $data['emisor']['tipoEstablecimiento'];

// Dirección dentro de emisor
$departamento      = $data['emisor']['direccion']['departamento'];
$municipio         = $data['emisor']['direccion']['municipio'];
$complemento       = $data['emisor']['direccion']['complemento'];

$telefono          = $data['emisor']['telefono'];
$correo            = $data['emisor']['correo'];
$codEstableMH      = $data['emisor']['codEstableMH'];
$codEstable        = $data['emisor']['codEstable'];
$codPuntoVentaMH   = $data['emisor']['codPuntoVentaMH'];
$codPuntoVenta     = $data['emisor']['codPuntoVenta'];


//RECEPTOR
$tipoDocumento     = $data['receptor']['tipoDocumento'];
$numDocumento      = $data['receptor']['numDocumento'];
$nrcReceptor       = $data['receptor']['nrc'];
$nombreReceptor    = $data['receptor']['nombre'];
$codActividadReceptor = $data['receptor']['codActividad'];
$descActividadReceptor = $data['receptor']['descActividad'];
//$direccionReceptor = $data['receptor']['direccion']; er un array
$direccionArray = $data['receptor']['direccion'];
$direccionReceptor = implode(', ', $direccionArray);
$telefonoReceptor  = $data['receptor']['telefono'];
$correoReceptor    = $data['receptor']['correo'];





$cuerpoDocumento = $data['cuerpoDocumento'];



$QR_data = "https://admin.factura.gob.sv/consultaPublica?ambiente=01&codGen=".$codigoGeneracion."&fechaEmi=".$fecEmi;





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
$pdf->Cell(0, 3, 'FACTURA DE CONSUMIDOR FINAL' , 0, 1, 'C');//contenido de la celda

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
$pdf->SetXY(5, 5);
// Insertar la imagen
$imagen = "img/logo2.png"; // Ruta a tu imagen
$pdf->Image($imagen, '', '', 85, 25, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

$x_emisor = 7;
$x_emisor2 = 40;
$y_emisor = 27;
$y_emisor_desplasamiento = 4;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, $nombreComercial , 0, 1, 'L');//contenido de la celda
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
$pdf->Cell(0, 3, "Giro: " . $descActividad , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$direccion_parts = Salto_linea(65 , $complemento);

foreach ($direccion_parts as $part) {
    $pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
    $pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
    $pdf->Cell(0, 3, $part, 0, 1, 'L');
    $y_emisor = $y_emisor + $y_emisor_desplasamiento;
}


$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: " . $telefono , 0, 1, 'L');//contenido de la celda
$y_emisor = $y_emisor + $y_emisor_desplasamiento;

$pdf->SetXY($x_emisor, $y_emisor); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: " . $correo , 0, 1, 'L');//contenido de la celda

// Imprimir una línea divisoria
$pdf->Line(7, 58, 205, 58, array('width' => 0.5, 'color' => array(0,0,0)));




//DATOS DEL CLIENTE 


$x_cliente = 7;
$x_cliente2 = 50;
$y_cliente = 60;
$y_cliente_desplasamiento = 4;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Cliente: ". $nombreReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Direccion: ". $direccionReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Telefono: ". $telefonoReceptor , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "E-Mail: ". $correoReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Doc: ". $numDocumento , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "NRC: ". $nrcReceptor , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

$pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Giro: ". $descActividadReceptor , 0, 1, 'L');//contenido de la celda

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
  $numeroDocumento = $rowP['numeroDocumento'];  // puede ser null
  $numItem        = $rowP['numItem'];
  $tipoItem       = $rowP['tipoItem'];
  $cantidad       = $rowP['cantidad'];
  $codigo         = $rowP['codigo'];
  $uniMedida      = $rowP['uniMedida'];
  $descripcion    = $rowP['descripcion'];
  $precioUni      = $rowP['precioUni'];
  $montoDescu     = $rowP['montoDescu'];
  $ventaNoSuj     = $rowP['ventaNoSuj'];
  $ventaExenta    = $rowP['ventaExenta'];
  $ventaGravada   = $rowP['ventaGravada'];
  $noGravado      = $rowP['noGravado'];
  $codTributo     = $rowP['codTributo'];   // puede ser null
  $tributos       = $rowP['tributos'];     // puede ser null
  $ivaItem        = $rowP['ivaItem'];
  $psv            = $rowP['psv'];

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
      $pdf->Cell(0, 3, $tipo_documento , 0, 1, 'C');//contenido de la celda

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
      $pdf->SetXY(5, 5);
      // Insertar la imagen
      $imagen = "img/logo2.png"; // Ruta a tu imagen
      $pdf->Image($imagen, '', '', 85, 25, '', '', 'T', false, 300, '', false, false, 0, false, false, false);

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
      $pdf->Cell(0, 3, "NIT: ". $nit_cli , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "NRC: ". $nrc_cli , 0, 1, 'L');//contenido de la celda
      $y_cliente = $y_cliente + $y_cliente_desplasamiento;

      $pdf->SetXY($x_cliente, $y_cliente); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, "Giro: ". $giro_cli , 0, 1, 'L');//contenido de la celda

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
  $pdf->Cell(0, 3, $uniMedida  , 0, 1, 'L');//contenido de la celda

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

$totalNoSuj = $resumen['totalNoSuj'];            // Total de operaciones no sujetas
$totalExenta = $resumen['totalExenta'];          // Total de ventas exentas
$totalGravada = $resumen['totalGravada'];        // Total de ventas gravadas
$subTotalVentas = $resumen['subTotalVentas'];    // Suma total antes de descuentos
$descuNoSuj = $resumen['descuNoSuj'];            // Descuento aplicado a ventas no sujetas
$descuExenta = $resumen['descuExenta'];          // Descuento en ventas exentas
$descuGravada = $resumen['descuGravada'];        // Descuento en ventas gravadas
$porcentajeDescuento = $resumen['porcentajeDescuento'];  // % global de descuento aplicado
$totalDescu = $resumen['totalDescu'];            // Total general de descuentos
$tributos = $resumen['tributos'];                // Información de otros tributos (puede ser null)
$totalIva = $resumen['totalIva'];                // IVA total calculado
$subTotal = $resumen['subTotal'];                // Subtotal después de descuentos
$ivaRete1 = $resumen['ivaRete1'];                // IVA retenido (si aplica)
$reteRenta = $resumen['reteRenta'];              // Retención de renta (si aplica)
$montoTotalOperacion = $resumen['montoTotalOperacion'];  // Monto total de la operación
$totalNoGravado = $resumen['totalNoGravado'];    // Total de montos no gravados
$totalPagar = $resumen['totalPagar'];            // Monto total a pagar por el cliente
$totalLetras = $resumen['totalLetras'];          // Monto total en letras
$saldoFavor = $resumen['saldoFavor'];            // Saldo a favor del cliente (si aplica)
$condicionOperacion = $resumen['condicionOperacion']; // Condición de operación (ej. contado o crédito)
$pagos = $resumen['pagos'];                      // Detalles de pagos (puede ser null)
$numPagoElectronico = $resumen['numPagoElectronico']; // Número de pago electrónico (si aplica)



$y_detalle = $max_y - 60;
// Imprimir una línea divisoria
$pdf->Line(7, $y_detalle, 205, $y_detalle, array('width' => 0.5, 'color' => array(0,0,0)));


$pdf->SetXY( 7, $max_y - 30); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

//TOTALES DEL DOCUMENTO
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Sin Descuento: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $subTotalVentas , 0, 1, 'L');//contenido de la celda



$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $titulo1); //formato de la celda
$pdf->Cell(0, 3, "SON: " . $totalLetras , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Descuento: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalDescu , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Suma: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $subTotal , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

/*
$observaciones = "";

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $titulo1); //formato de la celda
$pdf->Cell(0, 3, "Observaciones: " . $observaciones , 0, 1, 'L');//contenido de la celda
*/

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"IVA Retenido: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $ivaRete1 , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Excentas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalExenta , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total No Sujetas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalNoSuj , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalPagar , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Forma de Pago: " , 0, 1, 'L');//contenido de la celda

if ($condicionOperacion == 1) {
  $condicionOperacion = "Contado";
} elseif ($condicionOperacion == 2) {
  $condicionOperacion = "Crédito";
} else {
  $condicionOperacion = "No especificada";
}

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $condicionOperacion , 0, 1, 'L');//contenido de la celda













$example = $codigoGeneracion.".pdf";

//mysqli_close($conexion);
$pdf->Output($example, 'I');
?>