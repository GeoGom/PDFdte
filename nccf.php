<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$dataJsonPost = json_decode(file_get_contents("php://input"), true);

include 'phpFunctions.php';

//$json = $dataJsonPost[""]; recibe el json 
//$print = $dataJsonPost[""]; recibe el modo en que se debe mostrar 1 (vista en panatalla)  2 (descarga)
$print = 2;
$json = '{
	"identificacion": {
	"version": 3,
	"ambiente": "01",
	"tipoDte": "05",
	"numeroControl": "DTE-05-00010003-000000000000002",
	"codigoGeneracion": "65C14D46-FDD9-11EF-8784-F23C93DBE119",
	"tipoModelo": 1,
	"tipoOperacion": 1,
	"tipoContingencia": null,
	"motivoContin": null,
	"fecEmi": "2025-03-10",
	"horEmi": "12:04:14",
	"tipoMoneda": "USD"
	},
	"documentoRelacionado": [
	{
		"tipoDocumento": "03",
		"tipoGeneracion": 2,
		"numeroDocumento": "6C834474-FC46-11EF-8784-F23C93DBE119",
		"fechaEmision": "2025-03-08"
	}
	],
	"emisor": {
	"nit": "11231902181010",
	"nrc": "2688858",
	"nombre": "CSISTEMAS.NET",
	"codActividad": "46510",
	"descActividad": "Venta al por mayor de computadoras, equipo perif�rico y programas inform�ticos",
	"nombreComercial": "CSISTEMAS.NET",
	"tipoEstablecimiento": "01",
	"telefono": "26846120",
	"correo": "info@csistemas.com",
	"direccion": {
		"departamento": "11",
		"municipio": "23",
		"complemento": "AV. MELARA #21A, USULUTAN, USULUTAN"
	}
	},
	"receptor": {
	"nit": "12051211821018",
	"nrc": "2343361",
	"nombre": "KARLA EMELINA MARTINEZ APARICIO",
	"codActividad": "47300",
	"descActividad": "Venta de combustibles, lubricantes y otros (gasolineras)",
	"nombreComercial": null,
	"direccion": {
		"departamento": "12",
		"municipio": "17",
		"complemento": "15 CALLE ORIENTE Y 2A AVE. SUR"
	},
	"telefono": null,
	"correo": "yamipuma2020@gmail.com"
	},
	"ventaTercero": null,
	"cuerpoDocumento": [
						{
		"numItem": 1,
		"tipoItem": 3,
		"numeroDocumento": "6C834474-FC46-11EF-8784-F23C93DBE119",
		"cantidad": 1.00,
		"codigo": "845973020071",
		"codTributo": null,
		"uniMedida": 59,
		"descripcion": "SWITCH TP-LINK 8 PUERTOS 10100MBPS",
		"precioUni": 13.27433628,
		"montoDescu": 0.00000000,
		"ventaNoSuj": 0.0,
		"ventaExenta": 0.00,
		"ventaGravada": 13.27433628,
		"tributos": [
		"20"
		]
	},				    {
		"numItem": 2,
		"tipoItem": 3,
		"numeroDocumento": "6C834474-FC46-11EF-8784-F23C93DBE119",
		"cantidad": 25.00,
		"codigo": "798302010222",
		"codTributo": null,
		"uniMedida": 59,
		"descripcion": "CABLE UTP CAT 5E NEXXT 4P 25AWG CM 305M BL",
		"precioUni": 0.40707965,
		"montoDescu": 0.00000000,
		"ventaNoSuj": 0.0,
		"ventaExenta": 0.00,
		"ventaGravada": 10.17699115,
		"tributos": [
		"20"
		]
	},				    {
		"numItem": 3,
		"tipoItem": 3,
		"numeroDocumento": "6C834474-FC46-11EF-8784-F23C93DBE119",
		"cantidad": 1.00,
		"codigo": "SUPPORT",
		"codTributo": null,
		"uniMedida": 59,
		"descripcion": "SOPORTE TECNICO",
		"precioUni": 26.54867257,
		"montoDescu": 0.00000000,
		"ventaNoSuj": 0.0,
		"ventaExenta": 0.00,
		"ventaGravada": 26.54867257,
		"tributos": [
		"20"
		]
	}
	],
	"resumen": {
	"totalNoSuj": 0.00,
	"totalExenta": 0.00,
	"totalGravada": 50.00,
	"subTotalVentas": 50.00,
	"descuNoSuj": 0.00,
	"descuExenta": 0.00,
	"descuGravada": 0.00,
	"totalDescu": 0.00,
	"tributos": [
		{
		"codigo": "20",
		"descripcion": "Impuesto al Valor Agregado 13%",
		"valor": 6.50
		}
	],
	"subTotal": 50.00,
	"ivaPerci1": 0.00,
	"ivaRete1": 0.00,
	"reteRenta": 0.00,
	"montoTotalOperacion": 56.50,
	"totalLetras": "CINCUENTA Y SEIS  CON 50/100 USD",
	"condicionOperacion": 1
	},
	"extension": {
	"nombEntrega": null,
	"docuEntrega": null,
	"nombRecibe": null,
	"docuRecibe": null,
	"observaciones": null
	},
	"apendice": null
,
"estado": "PROCESADO",
"selloRecibido": "2025274328DA2B8248A988D72C2CCF742407OMDL",
"fhProcesamiento": "10/03/2025 12:04:15"
}';


$json = preg_replace('/"observaciones"\s*:\s*,/', '"observaciones": null,', $json);
$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    exit;
}


// Identificación
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

// Emisor
$emisorNombre = $data['emisor']['nombre'];
$emisorNIT = $data['emisor']['nit'];
$emisorCorreo = $data['emisor']['correo'];
$emisorNRC = $data['emisor']['nrc'];
$emisorDescActividad = $data['emisor']['descActividad'];
$emisorTelefono = $data['emisor']['telefono'];
$emisorDireccion = $data['emisor']['direccion']['complemento'];
$emisorNombreComercial = $data['emisor']['nombreComercial'];

// Receptor
$receptorNombre = $data['receptor']['nombre'];
$receptorNIT = $data['receptor']['nit'];
$receptorCorreo = $data['receptor']['correo'];
$receptorNRC = $data['receptor']['nrc'];
$receptorDescActividad = $data['receptor']['descActividad'];
$receptorTelefono = $data['receptor']['telefono'];
$receptorDireccion = $data['receptor']['direccion']['complemento'];
$receptorNombreComercial = $data['receptor']['nombreComercial'];

// Resumen
$totalGravada = $data['resumen']['totalGravada'];
$totalIVA = $data['resumen']['tributos'][0]['valor'] ?? 0;
$montoTotalOperacion = $data['resumen']['montoTotalOperacion'];
$totalLetras = $data['resumen']['totalLetras'];



// Items del cuerpo del documento
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
$pdf->Cell(0, 3, 'NOTA DE CREDITO' , 0, 1, 'C');//contenido de la celda

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
$pdf->Cell(0, 3, "NIT: ". $receptorNIT , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_cliente2, $y_cliente); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "NRC: ". $receptorNRC , 0, 1, 'L');//contenido de la celda
$y_cliente = $y_cliente + $y_cliente_desplasamiento;

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
      $pdf->Cell(0, 3, 'NOTA DE CREDITO' , 0, 1, 'C');//contenido de la celda

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

$totalNoSuj = $resumen['totalNoSuj'];            // Total de operaciones no sujetas
$totalExenta = $resumen['totalExenta'];          // Total de ventas exentas
$totalGravada = $resumen['totalGravada'];        // Total de ventas gravadas
$subTotalVentas = $resumen['subTotalVentas'];    // Suma total antes de descuentos
$descuNoSuj = $resumen['descuNoSuj'];            // Descuento aplicado a ventas no sujetas
$descuExenta = $resumen['descuExenta'];          // Descuento en ventas exentas
$descuGravada = $resumen['descuGravada'];        // Descuento en ventas gravadas
$totalDescu = $resumen['totalDescu'];            // Total general de descuentos
$subTotal = $resumen['subTotal'];                // Subtotal después de descuentos
$ivaPerci1 = $resumen['ivaPerci1'];  
$ivaRete1 = $resumen['ivaRete1'];  
$reteRenta = $resumen['reteRenta'];              // Retención de renta (si aplica)
$montoTotalOperacion = $resumen['montoTotalOperacion'];  // Monto total de la operación
$totalLetras = $resumen['totalLetras'];          // Monto total en letras
$condicionOperacion = $resumen['condicionOperacion']; // Condición de operación (ej. contado o crédito)


$nombEntrega = $data['extension']['nombEntrega'];
$nombRecibe = $data['extension']['nombRecibe'];
$observaciones_extension = $data['extension']['observaciones'];

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
$pdf->Cell(0, 3, $subTotalVentas , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;


if (!is_null($resumen['tributos'])) {
		$tributos = $resumen['tributos'];
  foreach ($tributos as $index => $tributo) {
      $tributo_codigo = $tributo['codigo'];
      $tributos_descrip = $tributo['descripcion'];
      $tributos_val = $tributo['valor'];

      $pdf->SetXY( 148, $y_detalleR); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $tributos_descrip , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 187, $y_detalleR); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $tributos_val , 0, 1, 'L');//contenido de la celda
      $y_detalleR = $y_detalleR + $y_detale_incremento;

  }
}
if($ivaRete1 > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"IVA Retenido: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $ivaRete1 , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}
if($ivaPerci1 > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"IVA Persivido: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $ivaPerci1 , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}
if($reteRenta > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Retención de renta: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $reteRenta , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}


if($totalExenta > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total Excentas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalExenta , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}

if($totalNoSuj > 0){
$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"Total No Sujetas: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $totalNoSuj , 0, 1, 'L');//contenido de la celda
$y_detalleR = $y_detalleR + $y_detale_incremento;
}

$pdf->SetXY( 148, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalleR); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, number_format($montoTotalOperacion,2,'.',',') , 0, 1, 'L');//contenido de la celda
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
$pdf->Cell(0, 3, "Entrega: " . $nombEntrega , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;

$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Recibe: " . $nombRecibe , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;

$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Observaciones: " . $observaciones_extension , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;

// Documento relacionado
$docRelacionado = $data['documentoRelacionado'][0]['numeroDocumento'] ?? null;
$fechaEmision_dr = $data['documentoRelacionado'][0]['fechaEmision'] ?? null;

$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Documento Relacionado: " . $docRelacionado , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;

$pdf->SetXY( 7, $y_detalleL); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Fecha de Emicion: " . $fechaEmision_dr , 0, 1, 'L');//contenido de la celda
$y_detalleL = $y_detalleL + $y_detale_incremento;


$example = $codigoGeneracion.".pdf";

if($print == '1'){
    $pdf->Output($example, 'I');
}else{
    $pdf->Output($example, 'D');
}

?>