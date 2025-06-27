<?php

function convertir_monto_a_letra($monto) {
    $partes = explode('.', number_format($monto, 2, '.', ''));
    $entero = intval($partes[0]);
    $decimal = intval($partes[1]);

    $resultado = '';

    if ($entero > 0) {
        $resultado = convertir_numero_a_tres_cifras($entero);
        if ($decimal > 0) {
            $resultado .= ' con ' . $decimal . '/100';
        } else {
            $resultado .= ' con 00/100';
        }
    } else {
        if ($decimal > 0) {
            $resultado = 'cero con ' . $decimal . '/100';
        } else {
            $resultado = 'cero con 00/100';
        }
    }

    return $resultado;
}

function convertir_numero_a_tres_cifras($numero) {
    $unidades = array('', 'uno', 'dos', 'tres', 'cuatro', 'cinco', 'seis', 'siete', 'ocho', 'nueve', 'diez', 'once', 'doce', 'trece', 'catorce', 'quince', 'dieciséis', 'diecisiete', 'dieciocho', 'diecinueve');
    $decenas = array('', '', 'veinte', 'treinta', 'cuarenta', 'cincuenta', 'sesenta', 'setenta', 'ochenta', 'noventa');
    $centenas = array('', 'ciento', 'doscientos', 'trescientos', 'cuatrocientos', 'quinientos', 'seiscientos', 'setecientos', 'ochocientos', 'novecientos');
    $millares = array('', 'un mil ','dos mil ','tres mil ','cuatro mil ','cinco mil ','seis mil ','siete mil ','ocho mil ','nueve mil ', 'diez mil ', 'once mil ', 'doce mil ', 'trece mil ', 'catorce mil ', 'quince mil ', 'dieciséis mil ', 'diecisiete mil ', 'dieciocho mil ', 'diecinueve mil ', 'veinte mil ');


    $resultado = '';

    if ($numero < 20) {
        $resultado = $unidades[$numero];
    } elseif ($numero < 100) {
        $decena = (int)($numero / 10);
        $unidad = $numero % 10;
        if ($unidad == 0) {
            $resultado = $decenas[$decena];
        } else {
            $resultado = $decenas[$decena] . ' y ' . $unidades[$unidad];
        }
    } elseif ($numero < 1000) {
        $centena = (int)($numero / 100);
        $decena = (int)(($numero % 100) / 10);
        $unidad = $numero % 10;
        $dato2 = $decena.$unidad;
        if ($decena == 0 && $unidad == 0 && $centena == 1) {
            $resultado = "cien";
        } elseif($decena == 1 && $unidad > 0){
            $resultado = $centenas[$centena] . ' ' . $unidades[$dato2];
        }elseif ($unidad == 0 and $decena > 1) {
            $resultado = $centenas[$centena] . ' ' . $decenas[$decena];
        } else {
            $resultado = $centenas[$centena] . ' ' . $decenas[$decena] . ' y ' . $unidades[$unidad];
        }
    }elseif ($numero < 10000){       
        $primer_digito = (int)($numero / 1000);
        $otros_digitos = $numero % 1000;

        $millar = $primer_digito;
        
        $numero = $otros_digitos;

        $numero2 = $numero;
        if ($numero < 100){
            $decena = (int)($numero / 10);
            $unidad = $numero % 10;
            if ($unidad == 0) {
                $resultado = $millares[$millar] . $decenas[$decena];
            }elseif($decena == 1 and $unidad > 0 ){
                $resultado = $millares[$millar] . $unidades[$numero2];
            } else {
                $resultado = $millares[$millar] . $decenas[$decena] . ' y ' . $unidades[$unidad];
            }
        }elseif($numero == 100){
            $resultado = $millares[$millar]."cien";
        }else{
            $primer_digito = (int)($numero / 100);
            $otros_digitos = (int)(($numero % 100) / 10);

            $centena = $primer_digito;
            
            $centena = (int)($numero / 100);
            $decena = (int)(($numero % 100) / 10);
            $unidad = ($numero % 10);

            $ultimos = $decena.$unidad;

            if ($decena == 1 and $unidad >= 0) {
                $resultado = $millares[$millar] . $centenas[$centena] .' ' .$unidades[$ultimos];
            }elseif($decena == 0 and $unidad > 0){
                $resultado = $millares[$millar] . $centenas[$centena] .' ' .$unidades[$unidad];
            }elseif($decena > 1 and $unidad == 0){
                $resultado = $millares[$millar] . $centenas[$centena] .' ' .$decenas[$decena];
            }else{
                $resultado = $millares[$millar] . $centenas[$centena] .' ' .$decenas[$decena] . ' y ' . $unidades[$unidad];
            }
        }
    }

    return $resultado;
}


//$variable = convertir_monto_a_letra($numero);





function Salto_linea ($max_length, $text) {

    $parts = [];
    $current_part = "";

    for ($i = 0; $i < strlen($text); $i++) {
        $current_part .= $text[$i];
        if (strlen($current_part) >= $max_length) {
            // Buscar el espacio en blanco más cercano
            $space_pos = strrpos($current_part, " ");
            if ($space_pos !== false) {
                $parts[] = trim(substr($current_part, 0, $space_pos));
                $current_part = trim(substr($current_part, $space_pos + 1));
            } else {
                $parts[] = $current_part;
                $current_part = "";
            }
        }
    }

    if ($current_part !== "") {
        $parts[] = $current_part;
    }

    return $parts;
}
?>