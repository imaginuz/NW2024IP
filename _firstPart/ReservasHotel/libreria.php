<?php
$productos = [
    ["codigo" => "HB001", "nombre" => "Habitacion Economica", "precio" => 500],
    ["codigo" => "HB002", "nombre" => "Habitacion Mediana", "precio" => 1100],
    ["codigo" => "HB003", "nombre" => "Habitacion Suite Presidencial", "precio" => 2000],
];

function findProductoByCodigo($codigo)
{
    global $productos;
    $producto = null;
    foreach ($productos as $prod) {
        if ($prod["codigo"] == $codigo) {
            $producto = $prod;
            break;
        }
    }
    return $producto;
}

function construirOrden($nombre, $cantidad, $producto)
{
    $orden = [
        "uuid" => time(),
        "nombre" => $nombre,
        "producto" => $producto,
        "cantidad" => $cantidad,
        "total" => round($cantidad * $producto["precio"] * 1.15, 2)
    ];
    return $orden;
}

function agregarAListaDeOrdenes($orden)
{
    $ordenes = [];
    if (isset($_SESSION["ordenes"])) {
        $ordenes = $_SESSION["ordenes"];
    }
    $ordenes[] = $orden;
    $_SESSION["ordenes"] = $ordenes;
}

function obtenerOrdenes()
{
    $ordenes = [];
    if (isset($_SESSION["ordenes"])) {
        $ordenes = $_SESSION["ordenes"];
    }
    return $ordenes;
}
