<?php
session_start();
require_once 'libreria.php';

$ordenes = obtenerOrdenes();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Reservas</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Orden Número</th>
                <th>Cliente</th>
                <th>Producto</th>
                <th>Precio Base</th>
                <th>Personas</th>
                <th>Habitaciones</th>
                <th>Días</th>
                <th>Vista</th>
                <th>Desayuno</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ordenes as $orden) { ?>
                <tr>
                    <td><?php echo $orden["uuid"]; ?></td>
                    <td><?php echo $orden["nombre"]; ?></td>
                    <td><?php echo $orden["producto"]["nombre"]; ?></td>
                    <td><?php echo $orden["producto"]["precio"]; ?></td>
                    <td><?php echo $orden["personas"]; ?></td>
                    <td><?php echo $orden["cantidad"]; ?></td>
                    <td><?php echo $orden["dias"]; ?></td>
                    <td><?php echo $orden["vista"]; ?></td>
                    <td><?php echo $orden["desayuno"]; ?></td>
                    <td><?php echo $orden["total"]; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>