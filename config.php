<?php
    $host = "elamigo.csistemas.net";
    $port = 3306;
    $user = "dbu_elamigo";
    $pass = "12345678";
    $db = "dbf_elamigo";

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