<?php
$productos = [
    ["codigo" => "HB001", "nombre" => "Habitación Económica", "precio" => 500],
    ["codigo" => "HB002", "nombre" => "Habitación Mediana", "precio" => 1100],
    ["codigo" => "HB003", "nombre" => "Habitación Suite Presidencial", "precio" => 2000],
];

function findProductoByCodigo($codigo)
{
    global $productos;
    foreach ($productos as $prod) {
        if ($prod["codigo"] == $codigo) {
            return $prod;
        }
    }
    return null;
}

function construirOrden($nombre, $cantidad, $numPersonas, $conVista, $conDesayuno, $diasReserva, $producto)
{
    $precioBase = $producto["precio"];
    if ($conVista == 'Si') $precioBase += 200;
    if ($conDesayuno == 'Si') $precioBase += 100;
    $subtotal = $cantidad * $diasReserva * $precioBase;

    // para aplicar impuestos a la orden completa
    $impuestoRenta = 0.15 * $subtotal;
    $impuestoHotel = 0.18 * $subtotal;
    $total = round($subtotal + $impuestoRenta + $impuestoHotel, 2);

    return [
        "uuid" => time(),
        "nombre" => $nombre,
        "producto" => $producto,
        "cantidad" => $cantidad,
        "personas" => $numPersonas,
        "vista" => $conVista,
        "desayuno" => $conDesayuno,
        "dias" => $diasReserva,
        "total" => $total
    ];
}

function agregarAListaDeOrdenes($orden)
{
    if (!isset($_SESSION["ordenes"])) {
        $_SESSION["ordenes"] = [];
    }
    $_SESSION["ordenes"][] = $orden;
}

function obtenerOrdenes()
{
    return isset($_SESSION["ordenes"]) ? $_SESSION["ordenes"] : [];
}
