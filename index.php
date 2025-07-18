<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

$dataJsonPost = json_decode(file_get_contents("php://input"), true);

$json = $dataJsonPost["datos"]; 
$print = $dataJsonPost["proceso"]; 

//$json = preg_replace('/"observaciones"\s*:\s*,/', '"observaciones": null,', $json);
//$data = json_decode($json, true);
$data = $json;

if (json_last_error() !== JSON_ERROR_NONE) {
    echo "Error al decodificar JSON: " . json_last_error_msg();
    exit;
}

$ambiente        = $data['identificacion']['ambiente'] ?? '';         
$tipoDte         = $data['identificacion']['tipoDte'] ?? '';   

switch ($tipoDte) {
    case '01':
        require_once __DIR__ . '/api/cf.php';
        break;
    case '03':
        require_once __DIR__ . '/api/ccf.php';
        break;
    case '05':
        require_once __DIR__ . '/api/nccf.php';
        break;
    case '14':
        require_once __DIR__ . '/api/sujex.php';
        break;    
    default:
        echo 'El tipo de documento no esta incluido entre los formatos disponibles';
}
?>