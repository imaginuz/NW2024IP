<?php
require_once 'vendor/autoload.php';
session_start();

use Uch\Oop\Hotel\ColleccionReserva;

$reservas = [];
$reservas = ColleccionReserva::getReservas();
foreach ($reservas as &$reservaJson) {
    $reservaJson = json_decode($reservaJson, true);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla Ordenes</title>
</head>

<body>
    <h1>Listado de ordenes con tabla</h1>
    <a href="http://localhost/NegociosWeb/oop/index.php">Ir a Index</a>

    <?php if (empty($reservas)): ?>
        <p>No hay reservas registradas.</p>
    <?php else: ?>
        <table border="1" cellpadding="1">
            <tr>
                <th>Nombre del Cliente</th>
                <th>Correo</th>
                <th>Teléfono</th>
                <th>Identidad</th>
                <th>Tipo de Habitación</th>
                <th>Fecha de Inicio</th>
                <th>Fecha Final</th>
                <th>Total</th>
            </tr><?php foreach ($reservas as $reserva): ?>
                <?php
                $cliente = $reserva['cliente'];
                $habitacion = $reserva['habitaciones'][0]['habitacion'];
                $fechaInicio = $reserva['fechaInicio']['date'];
                $fechaFinal = $reserva['fechaFinal']['date'];
                $total = $reserva['total'];?>
                <tr>
                    <td><?php echo $cliente['nombre']; ?></td>
                    <td><?php echo $cliente['correo']; ?></td>
                    <td><?php echo $cliente['telefono']; ?></td>
                    <td><?php echo $cliente['identidad']; ?></td>
                    <td><?php echo $habitacion['tipo']; ?></td>
                    <td><?php echo $fechaInicio; ?></td>
                    <td><?php echo $fechaFinal; ?></td>
                    <td><?php echo $total; ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php endif; ?>
</body>

</html>