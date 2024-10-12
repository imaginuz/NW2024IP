<?php
require_once 'analizar_cuentas.php';
/**
 * llamar funcion ---
 */
function extraerNumerosDeCuenta($texto)
{
    $texto = preg_replace("/[\,\.!?¿¡:;\-()\r\n]/", " ", $texto);

    $partes = preg_split('/\s+/', $texto);

    $numerosDeCuenta = array_filter($partes, function ($parte) {
        return preg_match('/^\d{13}$/', $parte);
    });

    return $numerosDeCuenta;
}

