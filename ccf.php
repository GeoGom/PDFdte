<?php
include 'config.php';
include 'nletras.php';
$conexion = mysqli_connect($host, $user, $pass, $db, $port);


//$json = $_POST['']; 
$json = '		{
 		  "identificacion": {
 		    "version": 3,
 		    "ambiente": "01",
 		    "tipoDte": "03",
 		    "numeroControl": "DTE-03-S001P002-000000000000015",
 		    "codigoGeneracion": "54487364-4D23-11F0-8758-F23C91ADD57D",
 		    "tipoModelo": 1,
 		    "tipoOperacion": 1,
 		    "tipoContingencia": null,
 		    "motivoContin": null,
 		    "fecEmi": "2025-06-19",
 		    "horEmi": "09:37:41",
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
 		    "nit": "028730069",
 		    "nrc": "1881112",
 		    "nombre": "JOSE ORLANDO HANDAL DUARTE",
 		    "codActividad": "08930",
 		    "descActividad": "Extracción de sal",
 		    "nombreComercial": null,
 		    "direccion": {
 		      "departamento": "11",
 		      "municipio": "23",
 		      "complemento": "1. AVENIDA NORTE , B . LA MERDED, N . 18 USULUTAN, USULUTAN"
 		    },
 		    "telefono": null,
 		    "correo": "orlandojhd@gmail.com"
 		  },
 		  "ventaTercero": null,
 		  "cuerpoDocumento": [
 						{
 				"numeroDocumento": null,
 				"numItem": 1,
 				"tipoItem": 3,
 				"cantidad": 2.00,
 				"codigo": "0857",
 				"uniMedida": 59,
 				"descripcion": "GRAVA",
 				"precioUni": 39.82300885,
 				"montoDescu": 0.00000000,
 				"ventaNoSuj": 0.0,
 				"ventaExenta": 0.00000000,
 				"ventaGravada": 79.64601770,
 				"noGravado": 0.0,
 				"codTributo": null,
 				"tributos": [
 			                    "20"
 			                ],
 				"psv": 0.0
                },
                		{
 				"numeroDocumento": null,
 				"numItem": 2,
 				"tipoItem": 3,
 				"cantidad": 5.00,
 				"codigo": "01",
 				"uniMedida": 59,
 				"descripcion": "SERVICIO DE TRANSPORTE.",
 				"precioUni": 0.88495575,
 				"montoDescu": 0.00000000,
 				"ventaNoSuj": 0.0,
 				"ventaExenta": 0.00000000,
 				"ventaGravada": 4.42477876,
 				"noGravado": 0.0,
 				"codTributo": null,
 				"tributos": 				[
 			        "20"
 			    ]					,
 				"psv": 0.0
 		    }
 		  ],
 		  "resumen": {
 		    "totalNoSuj": 0.00,
 		    "totalExenta": 0.00,
 		    "totalGravada": 84.07,
 		    "subTotalVentas": 84.07,
 		    "descuNoSuj": 0.00,
 		    "descuExenta": 0.00,
 		    "descuGravada": 0.00,
 		    "porcentajeDescuento": 0.00,
 		    "totalDescu": 0.00,
 		    "tributos": 			[
 		      {
 		        "codigo": "20",
 		        "descripcion": "Impuesto al Valor Agregado 13%",
 		        "valor": 10.93
 		      }
 		    ]					,
 		    "subTotal": 84.07,
 		    "ivaPerci1": 0.00,
 		    "ivaRete1": 0.00,
 		    "reteRenta": 0.00,
 		    "montoTotalOperacion": 95.00,
 		    "totalNoGravado": 0.0,
 		    "totalPagar": 95.00,
 		    "totalLetras": "NOVENTA Y CINCO  CON 00/100 USD",
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
"selloRecibido": "202537E2627B5AD5463F8F5E87D7CAD3C0D8Z7PM",
"fhProcesamiento": "19/06/2025 09:37:42",
"observaciones": ,
"firma": "eyJhbGciOiJSUzUxMiJ9.ewogICJpZGVudGlmaWNhY2lvbiIgOiB7CiAgICAidmVyc2lvbiIgOiAzLAogICAgImFtYmllbnRlIiA6ICIwMSIsCiAgICAidGlwb0R0ZSIgOiAiMDMiLAogICAgIm51bWVyb0NvbnRyb2wiIDogIkRURS0wMy1TMDAxUDAwMi0wMDAwMDAwMDAwMDAwMTUiLAogICAgImNvZGlnb0dlbmVyYWNpb24iIDogIjU0NDg3MzY0LTREMjMtMTFGMC04NzU4LUYyM0M5MUFERDU3RCIsCiAgICAidGlwb01vZGVsbyIgOiAxLAogICAgInRpcG9PcGVyYWNpb24iIDogMSwKICAgICJ0aXBvQ29udGluZ2VuY2lhIiA6IG51bGwsCiAgICAibW90aXZvQ29udGluIiA6IG51bGwsCiAgICAiZmVjRW1pIiA6ICIyMDI1LTA2LTE5IiwKICAgICJob3JFbWkiIDogIjA5OjM3OjQxIiwKICAgICJ0aXBvTW9uZWRhIiA6ICJVU0QiCiAgfSwKICAiZG9jdW1lbnRvUmVsYWNpb25hZG8iIDogbnVsbCwKICAib3Ryb3NEb2N1bWVudG9zIiA6IG51bGwsCiAgImVtaXNvciIgOiB7CiAgICAibml0IiA6ICIxMjE4MTcwNjg1MTAxMSIsCiAgICAibnJjIiA6ICIxOTg5ODUwIiwKICAgICJub21icmUiIDogIkFHUk9GRVJSRVRFUklBIEVMIEFNSUdPIFNVQy0xIiwKICAgICJjb2RBY3RpdmlkYWQiIDogIjQ2NjMyIiwKICAgICJkZXNjQWN0aXZpZGFkIiA6ICJWZW50YSBhbCBwb3IgbWF5b3IgZGUgYXJ0w61jdWxvcyBkZSBmZXJyZXRlcsOtYSB5IHBpbnR1cmVyw61hcyIsCiAgICAibm9tYnJlQ29tZXJjaWFsIiA6ICJBR1JPRkVSUkVURVJJQSBFTCBBTUlHTyBTVUMtMSIsCiAgICAidGlwb0VzdGFibGVjaW1pZW50byIgOiAiMDEiLAogICAgImRpcmVjY2lvbiIgOiB7CiAgICAgICJkZXBhcnRhbWVudG8iIDogIjExIiwKICAgICAgIm11bmljaXBpbyIgOiAiMjMiLAogICAgICAiY29tcGxlbWVudG8iIDogIkNPTE9OSUEgRUwgUEFSQUlTTywgUFVFUlRPIFBBUkFEQSwgVVNVTFVUQU4sIFVTVUxVVEFOIgogICAgfSwKICAgICJ0ZWxlZm9ubyIgOiAiMjYzMjEzMDgiLAogICAgImNvcnJlbyIgOiAib2ZpY2luYWxpc3pAZ21haWwuY29tIiwKICAgICJjb2RFc3RhYmxlTUgiIDogbnVsbCwKICAgICJjb2RFc3RhYmxlIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YU1IIiA6IG51bGwsCiAgICAiY29kUHVudG9WZW50YSIgOiBudWxsCiAgfSwKICAicmVjZXB0b3IiIDogewogICAgIm5pdCIgOiAiMDI4NzMwMDY5IiwKICAgICJucmMiIDogIjE4ODExMTIiLAogICAgIm5vbWJyZSIgOiAiSk9TRSBPUkxBTkRPIEhBTkRBTCBEVUFSVEUiLAogICAgImNvZEFjdGl2aWRhZCIgOiAiMDg5MzAiLAogICAgImRlc2NBY3RpdmlkYWQiIDogIkV4dHJhY2Npw7NuIGRlIHNhbCIsCiAgICAibm9tYnJlQ29tZXJjaWFsIiA6IG51bGwsCiAgICAiZGlyZWNjaW9uIiA6IHsKICAgICAgImRlcGFydGFtZW50byIgOiAiMTEiLAogICAgICAibXVuaWNpcGlvIiA6ICIyMyIsCiAgICAgICJjb21wbGVtZW50byIgOiAiMS4gQVZFTklEQSBOT1JURSAsIEIgLiBMQSBNRVJERUQsIE4gLiAxOCBVU1VMVVRBTiwgVVNVTFVUQU4iCiAgICB9LAogICAgInRlbGVmb25vIiA6IG51bGwsCiAgICAiY29ycmVvIiA6ICJvcmxhbmRvamhkQGdtYWlsLmNvbSIKICB9LAogICJ2ZW50YVRlcmNlcm8iIDogbnVsbCwKICAiY3VlcnBvRG9jdW1lbnRvIiA6IFsgewogICAgIm51bWVyb0RvY3VtZW50byIgOiBudWxsLAogICAgIm51bUl0ZW0iIDogMSwKICAgICJ0aXBvSXRlbSIgOiAzLAogICAgImNhbnRpZGFkIiA6IDIuMCwKICAgICJjb2RpZ28iIDogIjA4NTciLAogICAgInVuaU1lZGlkYSIgOiA1OSwKICAgICJkZXNjcmlwY2lvbiIgOiAiR1JBVkEiLAogICAgInByZWNpb1VuaSIgOiAzOS44MjMwMDg4NSwKICAgICJtb250b0Rlc2N1IiA6IDAuMCwKICAgICJ2ZW50YU5vU3VqIiA6IDAuMCwKICAgICJ2ZW50YUV4ZW50YSIgOiAwLjAsCiAgICAidmVudGFHcmF2YWRhIiA6IDc5LjY0NjAxNzcsCiAgICAibm9HcmF2YWRvIiA6IDAuMCwKICAgICJjb2RUcmlidXRvIiA6IG51bGwsCiAgICAidHJpYnV0b3MiIDogWyAiMjAiIF0sCiAgICAicHN2IiA6IDAuMAogIH0sIHsKICAgICJudW1lcm9Eb2N1bWVudG8iIDogbnVsbCwKICAgICJudW1JdGVtIiA6IDIsCiAgICAidGlwb0l0ZW0iIDogMywKICAgICJjYW50aWRhZCIgOiA1LjAsCiAgICAiY29kaWdvIiA6ICIwMSIsCiAgICAidW5pTWVkaWRhIiA6IDU5LAogICAgImRlc2NyaXBjaW9uIiA6ICJTRVJWSUNJTyBERSBUUkFOU1BPUlRFLiIsCiAgICAicHJlY2lvVW5pIiA6IDAuODg0OTU1NzUsCiAgICAibW9udG9EZXNjdSIgOiAwLjAsCiAgICAidmVudGFOb1N1aiIgOiAwLjAsCiAgICAidmVudGFFeGVudGEiIDogMC4wLAogICAgInZlbnRhR3JhdmFkYSIgOiA0LjQyNDc3ODc2LAogICAgIm5vR3JhdmFkbyIgOiAwLjAsCiAgICAiY29kVHJpYnV0byIgOiBudWxsLAogICAgInRyaWJ1dG9zIiA6IFsgIjIwIiBdLAogICAgInBzdiIgOiAwLjAKICB9IF0sCiAgInJlc3VtZW4iIDogewogICAgInRvdGFsTm9TdWoiIDogMC4wLAogICAgInRvdGFsRXhlbnRhIiA6IDAuMCwKICAgICJ0b3RhbEdyYXZhZGEiIDogODQuMDcsCiAgICAic3ViVG90YWxWZW50YXMiIDogODQuMDcsCiAgICAiZGVzY3VOb1N1aiIgOiAwLjAsCiAgICAiZGVzY3VFeGVudGEiIDogMC4wLAogICAgImRlc2N1R3JhdmFkYSIgOiAwLjAsCiAgICAicG9yY2VudGFqZURlc2N1ZW50byIgOiAwLjAsCiAgICAidG90YWxEZXNjdSIgOiAwLjAsCiAgICAidHJpYnV0b3MiIDogWyB7CiAgICAgICJjb2RpZ28iIDogIjIwIiwKICAgICAgImRlc2NyaXBjaW9uIiA6ICJJbXB1ZXN0byBhbCBWYWxvciBBZ3JlZ2FkbyAxMyUiLAogICAgICAidmFsb3IiIDogMTAuOTMKICAgIH0gXSwKICAgICJzdWJUb3RhbCIgOiA4NC4wNywKICAgICJpdmFQZXJjaTEiIDogMC4wLAogICAgIml2YVJldGUxIiA6IDAuMCwKICAgICJyZXRlUmVudGEiIDogMC4wLAogICAgIm1vbnRvVG90YWxPcGVyYWNpb24iIDogOTUuMCwKICAgICJ0b3RhbE5vR3JhdmFkbyIgOiAwLjAsCiAgICAidG90YWxQYWdhciIgOiA5NS4wLAogICAgInRvdGFsTGV0cmFzIiA6ICJOT1ZFTlRBIFkgQ0lOQ08gIENPTiAwMC8xMDAgVVNEIiwKICAgICJzYWxkb0Zhdm9yIiA6IDAuMCwKICAgICJjb25kaWNpb25PcGVyYWNpb24iIDogMSwKICAgICJwYWdvcyIgOiBudWxsLAogICAgIm51bVBhZ29FbGVjdHJvbmljbyIgOiBudWxsCiAgfSwKICAiZXh0ZW5zaW9uIiA6IHsKICAgICJub21iRW50cmVnYSIgOiBudWxsLAogICAgImRvY3VFbnRyZWdhIiA6IG51bGwsCiAgICAibm9tYlJlY2liZSIgOiBudWxsLAogICAgImRvY3VSZWNpYmUiIDogbnVsbCwKICAgICJvYnNlcnZhY2lvbmVzIiA6IG51bGwsCiAgICAicGxhY2FWZWhpY3VsbyIgOiBudWxsCiAgfSwKICAiYXBlbmRpY2UiIDogbnVsbAp9.BYbiJgIXnNtwQ-yl78pnd5VBIsqqHrBPCUgwMfYGGlTrsO5j8d2ajjouTNrOwm-chvGn0f8TgEnlSJzYymEpiCCa1jsu5u3zbbTOX-p75noOJHYGGL9rPQ379zeIgWkc3PczRJAoq2_jyD5goZ7ByI63N-t46VorC67dEBnGUb4WdWtKQcZ8bxBb6XsuG-D4l66bqZEnIw5EirBjiZ8zGV-VSrGyodlmMsyxHHbdm6wxhX7IBqaj0X97f0uY-v8lrpaf2B9HMtbYVVGZiRDim6HN0c2Rmy2JWm4mMCFTOZVr_xs03bGNkTA5C9p8hcE3IB_dbfWHQsRpu6Rm7ndleA"
}';


$json = preg_replace('/"observaciones"\s*:\s*,/', '"observaciones": null,', $json);
$data = json_decode($json, true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    exit;
}


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

$numDocumento      = $data['receptor']['nit'];
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
$pdf->Cell(0, 3, 'COMPROVANTE DE CREDITO FISCAL' , 0, 1, 'C');//contenido de la celda

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
      $pdf->Cell(0, 3, 'COMPROVANTE DE CREDITO FISCAL' , 0, 1, 'C');//contenido de la celda

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
$porcentajeDescuento = $resumen['porcentajeDescuento'];  // % global de descuento aplicado
$totalDescu = $resumen['totalDescu'];            // Total general de descuentos
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


if (!is_null($resumen['tributos'])) {
		$tributos = $resumen['tributos'];
  foreach ($tributos as $index => $tributo) {
      $tributo_codigo = $tributo['codigo'];
      $tributos_descrip = $tributo['descripcion'];
      $tributos_val = $tributo['valor'];

      $pdf->SetXY( 148, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $tributos_descrip , 0, 1, 'L');//contenido de la celda

      $pdf->SetXY( 187, $y_detalle); //posicion de la celda
      $pdf->SetFont('helvetica', '', $texto); //formato de la celda
      $pdf->Cell(0, 3, $tributos_val , 0, 1, 'L');//contenido de la celda
      $y_detalle = $y_detalle + $y_detale_incremento;

  }
}
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
$pdf->Cell(0, 3, number_format($totalPagar,2,'.',',') , 0, 1, 'L');//contenido de la celda
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