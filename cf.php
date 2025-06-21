<?php
include 'config.php';
include 'nletras.php';
//$conexion = mysqli_connect($host, $user, $pass, $db, $port);



$json = '{
 		  "identificacion": {
 		    "version": 1,
 		    "ambiente": "01",
 		    "tipoDte": "01",
 		    "numeroControl": "DTE-01-S001P002-000000000003733",
 		    "codigoGeneracion": "2115B283-4E18-11F0-8758-F23C91ADD57D",
 		    "tipoModelo": 1,
 		    "tipoOperacion": 1,
 		    "tipoContingencia": null,
 		    "motivoContin": null,
 		    "fecEmi": "2025-06-20",
 		    "horEmi": "14:50:01",
 		    "tipoMoneda": "USD"
 		  },
 		  "documentoRelacionado": null,
 		  "otrosDocumentos": null,
 		  "emisor": {
 		    "nit": "12181706851011",
 		    "nrc": "1989850",
 		    "nombre": "AGROFERRETERIA EL AMIGO SUC-1",
 		    "codActividad": "46632",
 		    "descActividad": "Venta al por mayor de artículos de ferretería y pinturerías",
 		    "nombreComercial": "AGROFERRETERIA EL AMIGO SUC-1",
 		    "tipoEstablecimiento": "01",
 		    "direccion": {
 		      "departamento": "11",
 		      "municipio": "23",
 		      "complemento": "COLONIA EL PARAISO, PUERTO PARADA, USULUTAN, USULUTAN"
 		    },
 		    "telefono": "26321308",
 		    "correo": "oficinalisz@gmail.com",
 		    "codEstableMH": null,
 		    "codEstable": null,
 		    "codPuntoVentaMH": null,
 		    "codPuntoVenta": null
 		  },
 		  "receptor": {
 			"tipoDocumento": null,
 		    "numDocumento":	null,
 		    "nrc": null,
 		    "nombre": "CLIENTES VARIOS",
 		    "codActividad": null,
 		    "descActividad": null,
 		    "direccion": null,
 		    "telefono": "72613347",
 		    "correo": null
 		  },
 		  "ventaTercero": null,
 		  "cuerpoDocumento": [
 						{
 			  "numeroDocumento": null,
 			  "numItem": 1,
 			  "tipoItem": 3,
 			  "cantidad": 1.00,
 			  "codigo": "0346",
 			  "uniMedida": 59,
 			  "descripcion": "CLAVO DE 1",
 			  "precioUni": 1.25000000,
 			  "montoDescu": 0.00000000,
 			  "ventaNoSuj": 0.0,
 			  "ventaExenta": 0.00000000,
 			  "ventaGravada": 1.25000000,
 			  "noGravado": 0.0,
 			  "codTributo": null,
 			  "tributos": null,
 			  "ivaItem": 0.14380531,
 			  "psv": 0.0
 			}
 		  ],
 		  "resumen": {
 		    "totalNoSuj": 0.00,
 		    "totalExenta": 0.00,
 		    "totalGravada": 1.25,
 		    "subTotalVentas": 1.25,
 		    "descuNoSuj": 0.00,
 		    "descuExenta": 0.00,
 		    "descuGravada": 0.00,
 		    "porcentajeDescuento": 0.00,
 		    "totalDescu": 0.00,
 		    "tributos": null,
 			"totalIva": 0.14,
 		    "subTotal": 1.25,
 		    "ivaRete1": 0.00,
 		    "reteRenta": 0.00,
 		    "montoTotalOperacion": 1.25,
 		    "totalNoGravado": 0.0,
 		    "totalPagar": 1.25,
 		    "totalLetras": "UNO CON 25/100 USD",
 		    "saldoFavor": 0.0,
 		    "condicionOperacion": 1,
 		    "pagos": null,
 		    "numPagoElectronico": null
 		  },
 		  "extension": {
 		    "nombEntrega": null,
 		    "docuEntrega": null,
 		    "nombRecibe": null,
 		    "docuRecibe": null,
 		    "observaciones": null,
 		    "placaVehiculo": null
 		  },
 		  "apendice": null
 		,
"estado": "PROCESADO",
"selloRecibido": "20253A7B4304A2964D85A6572E694ECF6D11IFCC",
"fhProcesamiento": "20/06/2025 14:50:02",
"observaciones": ,
"firma": "eyJhbGciOiJSUzUxMiJ9.ewogICJpZGVudGlmaWNhY2lvbiIgOiB7CiAgICAidmVyc2lvbiIgOiAxLAogICAgImFtYmllbnRlIiA6ICIwMSIsCiAgICAidGlwb0R0ZSIgOiAiMDEiLAogICAgIm51bWVyb0NvbnRyb2wiIDogIkRURS0wMS1TMDAxUDAwMi0wMDAwMDAwMDAwMDM3MzMiLAogICAgImNvZGlnb0dlbmVyYWNpb24iIDogIjIxMTVCMjgzLTRFMTgtMTFGMC04NzU4LUYyM0M5MUFERDU3RCIsCiAgICAidGlwb01vZGVsbyIgOiAxLAogICAgInRpcG9PcGVyYWNpb24iIDogMSwKICAgICJ0aXBvQ29udGluZ2VuY2lhIiA6IG51bGwsCiAgICAibW90aXZvQ29udGluIiA6IG51bGwsCiAgICAiZmVjRW1pIiA6ICIyMDI1LTA2LTIwIiwKICAgICJob3JFbWkiIDogIjE0OjUwOjAxIiwKICAgICJ0aXBvTW9uZWRhIiA6ICJVU0QiCiAgfSwKICAiZG9jdW1lbnRvUmVsYWNpb25hZG8iIDogbnVsbCwKICAib3Ryb3NEb2N1bWVudG9zIiA6IG51bGwsCiAgImVtaXNvciIgOiB7CiAgICAibml0IiA6ICIxMjE4MTcwNjg1MTAxMSIsCiAgICAibnJjIiA6ICIxOTg5ODUwIiwKICAgICJub21icmUiIDogIkFHUk9GRVJSRVRFUklBIEVMIEFNSUdPIFNVQy0xIiwKICAgICJjb2RBY3RpdmlkYWQiIDogIjQ2NjMyIiwKICAgICJkZXNjQWN0aXZpZGFkIiA6ICJWZW50YSBhbCBwb3IgbWF5b3IgZGUgYXJ0w61jdWxvcyBkZSBmZXJyZXRlcsOtYSB5IHBpbnR1cmVyw61hcyIsCiAgICAibm9tYnJlQ29tZXJjaWFsIiA6ICJBR1JPRkVSUkVURVJJQSBFTCBBTUlHTyBTVUMtMSIsCiAgICAidGlwb0VzdGFibGVjaW1pZW50byIgOiAiMDEiLAogICAgImRpcmVjY2lvbiIgOiB7CiAgICAgICJkZXBhcnRhbWVudG8iIDogIjExIiwKICAgICAgIm11bmljaXBpbyIgOiAiMjMiLAogICAgICAiY29tcGxlbWVudG8iIDogIkNPTE9OSUEgRUwgUEFSQUlTTywgUFVFUlRPIFBBUkFEQSwgVVNVTFVUQU4sIFVTVUxVVEFOIgogICAgfSwKICAgICJ0ZWxlZm9ubyIgOiAiMjYzMjEzMDgiLAogICAgImNvcnJlbyIgOiAib2ZpY2luYWxpc3pAZ21haWwuY29tIiwKICAgICJjb2RFc3RhYmxlTUgiIDogbnVsbCwKICAgICJjb2RFc3RhYmxlIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YU1IIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YSIgOiBudWxsCiAgfSwKICAicmVjZXB0b3IiIDogewogICAgInRpcG9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1Eb2N1bWVudG8iIDogbnVsbCwKICAgICJucmMiIDogbnVsbCwKICAgICJub21icmUiIDogIkNMSUVOVEVTIFZBUklPUyIsCiAgICAiY29kQWN0aXZpZGFkIiA6IG51bGwsCiAgICAiZGVzY0FjdGl2aWRhZCIgOiBudWxsLAogICAgImRpcmVjY2lvbiIgOiBudWxsLAogICAgInRlbGVmb25vIiA6ICI3MjYxMzM0NyIsCiAgICAiY29ycmVvIiA6IG51bGwKICB9LAogICJ2ZW50YVRlcmNlcm8iIDogbnVsbCwKICAiY3VlcnBvRG9jdW1lbnRvIiA6IFsgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogMSwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDEuMCwKICAgICJjb2RpZ28iIDogIjAzNDYiLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiQ0xBVk8gREUgMSIsCiAgICAicHJlY2lvVW5pIiA6IDEuMjUsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiAxLjI1LAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAiaXZhSXRlbSIgOiAwLjE0MzgwNTMxLAogICAgInBzdiIgOiAwLjAKICB9IF0sCiAgInJlc3VtZW4iIDogewogICAgInRvdGFsTm9TdWoiIDogMC4wLAogICAgInRvdGFsRXhlbnRhIiA6IDAuMCwKICAgICJ0b3RhbEdyYXZhZGEiIDogMS4yNSwKICAgICJzdWJUb3RhbFZlbnRhcyIgOiAxLjI1LAogICAgImRlc2N1Tm9TdWoiIDogMC4wLAogICAgImRlc2N1RXhlbnRhIiA6IDAuMCwKICAgICJkZXNjdUdyYXZhZGEiIDogMC4wLAogICAgInBvcmNlbnRhamVEZXNjdWVudG8iIDogMC4wLAogICAgInRvdGFsRGVzY3UiIDogMC4wLAogICAgInRyaWJ1dG9zIiA6IG51bGwsCiAgICAidG90YWxJdmEiIDogMC4xNCwKICAgICJzdWJUb3RhbCIgOiAxLjI1LAogICAgIml2YVJldGUxIiA6IDAuMCwKICAgICJyZXRlUmVudGEiIDogMC4wLAogICAgIm1vbnRvVG90YWxPcGVyYWNpb24iIDogMS4yNSwKICAgICJ0b3RhbE5vR3JhdmFkbyIgOiAwLjAsCiAgICAidG90YWxQYWdhciIgOiAxLjI1LAogICAgInRvdGFsTGV0cmFzIiA6ICJVTk8gQ09OIDI1LzEwMCBVU0QiLAogICAgInNhbGRvRmF2b3IiIDogMC4wLAogICAgImNvbmRpY2lvbk9wZXJhY2lvbiIgOiAxLAogICAgInBhZ29zIiA6IG51bGwsCiAgICAibnVtUGFnb0VsZWN0cm9uaWNvIiA6IG51bGwKICB9LAogICJleHRlbnNpb24iIDogewogICAgIm5vbWJFbnRyZWdhIiA6IG51bGwsCiAgICAiZG9jdUVudHJlZ2EiIDogbnVsbCwKICAgICJub21iUmVjaWJlIiA6IG51bGwsCiAgICAiZG9jdVJlY2liZSIgOiBudWxsLAogICAgIm9ic2VydmFjaW9uZXMiIDogbnVsbCwKICAgICJwbGFjYVZlaGljdWxvIiA6IG51bGwKICB9LAogICJhcGVuZGljZSIgOiBudWxsCn0.RSe0rz1Mwqj9yQ9hxctbEJeDclzOrpJADNnBWAzdaspM0Wzt589HPI7Ovr4RlieePmka5tt4Q36Moh5dT92cXBVQgbTVhMCmAHGLvN9X6KRoexI1mkJQsEMMnKwkpEQbJsyymiIG1kGinJz_EsODvn-jhtK8dNtITyUymh6cMfBqM-wzR5Ya3Hcovi_sylOyK7nUxSkqYRiaxPFPwrs0Y9sWOziZQ7VlANpAYtq0IDwsCcCdnAFjhW6frNo2Kyfy2YMqSBdnVGj15-rEqoLJnbrWlcJQcENCzTlTuafQxcqZYfZval2TXJ6m5wgn7zfuRwDHpq5SaatuIawD15t04A"
}'; 

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
$direccionReceptor = $data['receptor']['direccion'];
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

$titulo1 = 10;
$titulo2 = 8;
$texto = 6;

//DATOS DEL DOCUMENTO ELECTRONICO Y QR

// Imprimir un cuadrado como caja de texto sin fondo
//$pdf->Rect(x, y, ancho, alto, 'D', array(), array(0,0,0));
$pdf->Rect(90, 10, 112, 45, 'D', array(), array(0,0,0));

$pdf->SetXY(90, 12); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo1); //formato de la celda
$pdf->Cell(0, 3, $tipoDte , 0, 1, 'C');//contenido de la celda

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

$pdf->SetXY($x_documento2, 43); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoModelo , 0, 1, 'L');//contenido de la celda 

$pdf->SetXY($x_documento2, 46); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Tipo de Transmision:" , 0, 1, 'L');//contenido de la celda

$pdf->SetXY($x_documento2, 49); //posicion de la celda
$pdf->SetFont('helvetica', 'B', $titulo2); //formato de la celda
$pdf->Cell(0, 3, $tipoDte , 0, 1, 'L');//contenido de la celda




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
$pdf->Cell(0, 3, $nombre , 0, 1, 'L');//contenido de la celda
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
    $pdf->Cell(0, 3, $item , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 12, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, '0000' , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 33, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, 'med' , 0, 1, 'L');//contenido de la celda


    if (1 == 2){
        $cantidad_vendida = 1 / 2;
    }else{
        $cantidad_vendida = 1;
    }

    $pdf->SetXY( 118, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $cantidad_vendida , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 132, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, '0.00' , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 144, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, '0.00' , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 160, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $no_sujetas , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 170, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $exentas , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 190, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $gravada , 0, 1, 'L');//contenido de la celda

    $producto_cadena = 'AQUI EL NOMBRE DEL PRODUCTO ';

    $productos_parts = Salto_linea(60,$producto_cadena);
    
    foreach ($productos_parts as $producto_lineas){
        $pdf->SetXY( 45, $y_detalle); //posicion de la celda
        $pdf->SetFont('helvetica', '', $texto); //formato de la celda
        $pdf->Cell(0, 3, $producto_lineas , 0, 1, 'L');//contenido de la celda
        $y_detalle = $y_detalle + $y_detale_incremento;
    }



    $item = $item + 1;
    $descuento_total = $descuento_total + 0.00;
    $SUMA = $SUMA + $gravada;
    $suma_exentas = $suma_exentas + $exentas;
}



$y_detalle = $max_y - 55;
// Imprimir una línea divisoria
$pdf->Line(7, $y_detalle, 205, $y_detalle, array('width' => 0.5, 'color' => array(0,0,0)));


$pdf->SetXY( 7, $max_y - 30); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "Pagina: ".$pagianas , 0, 1, 'L');//contenido de la celda

//TOTALES DEL DOCUMENTO
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"SUMA: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $SUMA , 0, 1, 'L');//contenido de la celda

$total_para_letras = '1.50';

$total_en_letras = convertir_monto_a_letra($total_para_letras);

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $titulo1); //formato de la celda
$pdf->Cell(0, 3, "SON: " . $total_en_letras , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"(+)VENTA EXENTA: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $suma_exentas , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"(+)VENTA NO SUJETA: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, "0.00" , 0, 1, 'L');//contenido de la celda

$observaciones = "";

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $titulo1); //formato de la celda
$pdf->Cell(0, 3, "Observaciones: " . $observaciones , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"(-)DESCUENTOS: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $descuento_total , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"SUB-TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, 'nada' , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"(-) IVA RETENIDO : " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, 'nada' , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL A COBRAR : " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, 'nada' , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;













$example = $codigoGeneracion.".pdf";

//mysqli_close($conexion);
$pdf->Output($example, 'I');
?>