<?php
include 'config.php';
include 'nletras.php';
$conexion = mysqli_connect($host, $user, $pass, $db, $port);

//24018220359         

$documento = "250413768";
$ns = 12;

$query_propietario = "SELECT 
repre as representante,
registro as nrc,
nit as nit,
giro as giro,
direccion as direccion,
telefono as tel
FROM qlista
WHERE ns = $ns";

$data_propietario = mysqli_query($conexion, $query_propietario);

$row_propietario = mysqli_fetch_assoc($data_propietario);

$representante = $row_propietario["representante"];
$nrc = $row_propietario["nrc"];
$nit = $row_propietario["nit"];
$giro = $row_propietario["giro"];
$direccion = $row_propietario["direccion"];
$tel = $row_propietario["tel"];

$query_documento = "select 
CASE
	WHEN vg1.tipo = 3 THEN 'FACTURA DE CONSUMIDOR FINAL'
	WHEN vg1.tipo = 2 THEN 'COMPROVANTE DE CREDITO FISCAL'
	ELSE vg1.tipo
END AS tipo,
qc.octes as ONG_CDI, 
qc.nomcli as cliente,
qc.dir2 as direccion,
qc.tel1 as telefono,
qc.email as mail,
qc.nit as nit,
qc.regist as nrc,
qc.giro as giro,
vg2.vexent as exentas, 
vg2.vgrava as gravadas,
vg2.total as total,
vg3.retenc as retencion,
vg3.percep as percepcion,
vg2.dte_codigo_generacion as generacion,
vg2.dte_numero_control as control,
vg2.dte_sello_recibido as sello,
vg2.dte_fecha_emision as f_emicion,
vg2.dte_fecha_transmision as f_trasmision,
vg2.dte_id_contingencia as contingencia
from rventasg2 as vg2 
left join rventasg3 vg3 on vg3.id_relacion = vg2.id_relacion
inner join rventasg1 vg1 on vg1.id_relacion=vg2.id_rvg1 
inner join qclientes qc on qc.id_cliente = vg2.id_cliente
WHERE vg2.id_relacion = '$documento'";
$data_documento = mysqli_query($conexion, $query_documento);

$row_documento = mysqli_fetch_assoc($data_documento);


$retencion = $row_documento["retencion"];
$ONG_CDI = $row_documento["ONG_CDI"];
$tipo_documento = $row_documento["tipo"];
$cliente = $row_documento["cliente"];
$direccion_cli = $row_documento["direccion"];
$tel_cli = $row_documento["telefono"];
$mail_cli = $row_documento["mail"];
$nit_cli = $row_documento["nit"];
$nrc_cli = $row_documento["nrc"];
$giro_cli = $row_documento["giro"];
$generacion = $row_documento["generacion"];
$control = $row_documento["control"];
$sello = $row_documento["sello"];
$ff_emicion = $row_documento["f_emicion"];
$f_emicion = date("Y-m-d", strtotime($ff_emicion));
$f_trasmision = $row_documento["f_trasmision"];
$contingencia = $row_documento["contingencia"];

$modelo_dte = " ";
$tipo_dte = " "; 

if ($sello == "" && $f_trasmision == "" && $contingencia == ""){

    //no esta activo el cobro de facturacion electronica

}else{
    if ($contingencia > 0 && $sello == " " ){
        $modelo_dte = "Diferido";
        $tipo_dte = "Contingencia"; 
    }else{
        $modelo_dte = "Previo";
        $tipo_dte = "Normal"; 
    }
}



$QR_data = "https://admin.factura.gob.sv/consultaPublica?ambiente=01&codGen=".$documento."&fechaEmi=".$f_emicion;


$query_detalle = "select 
cp.codigo as codigo,
cp.exento as p_exento,
CASE
	WHEN vd.medida = 1 THEN (select pp.med1 from precios as pp where pp.id_precio = vd.id_precio)
	WHEN vd.medida = 2 THEN (select pp.med4 from precios as pp where pp.id_precio = vd.id_precio)
	ELSE vd.medida
END AS medida,
vd.medida AS med,
CASE
	WHEN vd.medida = 1 THEN (select pp.fra1 from precios as pp where pp.id_precio = vd.id_precio)
	WHEN vd.medida = 2 THEN (select pp.fra4 from precios as pp where pp.id_precio = vd.id_precio)
	ELSE vd.medida
END AS fraccion,
cp.descrip as producto,
vd.cunidad as cantidad,
ROUND(vd.preciou,2) as precio,
ROUND(vd.descue,2) as descuento, 
vd.total as total
from rventasg1 v1 
inner join rventasg2 v2 on v2.id_rvg1 = v1.id_relacion
inner join qventasd vd on vd.id_vent = v2.id_relacion
INNER JOIN existencia ex ON ex.id_exist = vd.id_exist
inner join codigosp cp on cp.id_code = ex.id_code
where  v2.id_relacion = $documento";
$data_detalle = mysqli_query($conexion, $query_detalle);



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
$pdf->Cell(0, 3, $generacion , 0, 1, 'L');//contenido de la celda

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

$direccion_parts = Salto_linea(65 , $direccion);

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

while ($row_detalle = mysqli_fetch_assoc($data_detalle)) {
    
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

    if ($row_detalle["med"] == 2){
        $cantidad_vendida = $row_detalle["cantidad"] / $row_detalle["fraccion"];
    }else{
        $cantidad_vendida = $row_detalle["cantidad"];
    }

    $precio_sin_iva = round(($row_detalle["precio"]/1.13),2);

    $p_exento = $row_detalle["p_exento"];


    if ($p_exento > 0){
        $exentas = round (($precio_sin_iva * $cantidad_vendida),2);
        $gravada = 0.00;

        $no_sujetas = 0.00;
    }else{
        $gravada = round (($precio_sin_iva * $cantidad_vendida),2);
        $exentas =0.00;

        $no_sujetas = 0.00;
    }

    

    $pdf->SetXY( 7, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $item , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 12, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $row_detalle["codigo"] , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 33, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $row_detalle["medida"] , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 118, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $cantidad_vendida , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 132, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $precio_sin_iva , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 144, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $row_detalle["descuento"] , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 160, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $no_sujetas , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 170, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $exentas , 0, 1, 'L');//contenido de la celda

    $pdf->SetXY( 190, $y_detalle); //posicion de la celda
    $pdf->SetFont('helvetica', '', $texto); //formato de la celda
    $pdf->Cell(0, 3, $gravada , 0, 1, 'L');//contenido de la celda

    $producto_cadena = $row_detalle["producto"];

    $productos_parts = Salto_linea(60,$producto_cadena);
    
    foreach ($productos_parts as $producto_lineas){
        $pdf->SetXY( 45, $y_detalle); //posicion de la celda
        $pdf->SetFont('helvetica', '', $texto); //formato de la celda
        $pdf->Cell(0, 3, $producto_lineas , 0, 1, 'L');//contenido de la celda
        $y_detalle = $y_detalle + $y_detale_incremento;
    }


    $item = $item + 1;

    $descuento_total = $descuento_total + $row_detalle["descuento"];
    
    $SUMA = $SUMA + $gravada;
    $suma_exentas = $suma_exentas + $exentas;
}

$iva = round(($SUMA*0.13),2);

$sub_total_iva = $SUMA + $iva;


$sub_total = $sub_total_iva + $suma_exentas;




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
$pdf->Cell(0, 3,"SUMA: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $SUMA , 0, 1, 'L');//contenido de la celda

$total_para_letras = $row_documento["total"];

$total_en_letras = convertir_monto_a_letra($total_para_letras);

$pdf->SetXY( 7, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $titulo1); //formato de la celda
$pdf->Cell(0, 3, "SON: " . $total_en_letras , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"13% IVA: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $iva , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"SUB-TOTAL: " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $sub_total_iva , 0, 1, 'L');//contenido de la celda
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
$pdf->Cell(0, 3, $sub_total , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;


$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"(-) IVA PERCIBIDO : " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $row_documento["percepcion"] , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;

$pdf->SetXY( 148, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3,"TOTAL A COBRAR : " , 0, 1, 'L');//contenido de la celda

$pdf->SetXY( 187, $y_detalle); //posicion de la celda
$pdf->SetFont('helvetica', '', $texto); //formato de la celda
$pdf->Cell(0, 3, $row_documento["total"] , 0, 1, 'L');//contenido de la celda
$y_detalle = $y_detalle + $y_detale_incremento;













$example = $generacion.".pdf";

mysqli_close($conexion);
$pdf->Output($example, 'I');
?>