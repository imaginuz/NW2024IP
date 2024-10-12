<?php
require_once 'libreria.php';

session_start();
$txtCodigo = 'HB001';
$txtNombre = '';
$txtCantidad = 1;
$numPersonas = 1;
$conVista = 'No';
$conDesayuno = 'No';
$diasReserva = 1;
$txtMessage = '';

if (isset($_POST["btnEnviar"])) {
    $txtCodigo = $_POST["txtCodigo"];
    $txtNombre = $_POST["txtNombre"];
    $txtCantidad = intval($_POST["txtCantidad"]);
    $numPersonas = intval($_POST["numPersonas"]);
    $conVista = $_POST["conVista"];
    $conDesayuno = $_POST["conDesayuno"];
    $diasReserva = intval($_POST["diasReserva"]);

    $producto = findProductoByCodigo($txtCodigo);
    if ($producto !== null && !empty($txtNombre) && $txtCantidad > 0 && $diasReserva > 0) {
        $miOrden = construirOrden(
            $txtNombre,
            $txtCantidad,
            $numPersonas,
            $conVista,
            $conDesayuno,
            $diasReserva,
            $producto
        );
        agregarAListaDeOrdenes($miOrden);
        $txtMessage = "Habitación Reservada Satisfactoriamente";
    } else {
        $txtMessage = "Datos inválidos.";
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservar Habitaciones</title>
</head>

<body>
    <h1>Reserva de Habitación</h1>
    <form action="orden.php" method="post">
        <label for="cmbProductos">Seleccionar tipo de habitación</label>
        <select id="cmbProductos" name="txtCodigo">
            <?php foreach ($productos as $producto) { ?>
                <option value="<?php echo $producto['codigo']; ?>" <?php echo ($producto['codigo'] == $txtCodigo) ? 'selected' : ''; ?>>
                    <?php echo $producto['nombre']; ?> (<?php echo $producto['precio']; ?>)
                </option>
            <?php } ?>
        </select>
        <br />

        <label for="txtNombre">Nombre del Cliente</label>
        <input type="text" name="txtNombre" id="txtNombre" value="<?php echo $txtNombre; ?>" required />
        <br />

        <label for="txtCantidad">Cantidad de Habitaciones</label>
        <input type="number" name="txtCantidad" id="txtCantidad" value="<?php echo $txtCantidad; ?>" required />
        <br />

        <label for="numPersonas">Número de Personas</label>
        <input type="number" name="numPersonas" id="numPersonas" value="<?php echo $numPersonas; ?>" required />
        <br />

        <label for="conVista">Con Vista</label>
        <select name="conVista" id="conVista">
            <option value="Si" <?php echo ($conVista == 'Si') ? 'selected' : ''; ?>>Sí</option>
            <option value="No" <?php echo ($conVista == 'No') ? 'selected' : ''; ?>>No</option>
        </select>
        <br />

        <label for="conDesayuno">Con Desayuno Incluido</label>
        <select name="conDesayuno" id="conDesayuno">
            <option value="Si" <?php echo ($conDesayuno == 'Si') ? 'selected' : ''; ?>>Sí</option>
            <option value="No" <?php echo ($conDesayuno == 'No') ? 'selected' : ''; ?>>No</option>
        </select>
        <br />

        <label for="diasReserva">Días de Reserva</label>
        <input type="number" name="diasReserva" id="diasReserva" value="<?php echo $diasReserva; ?>" required />
        <br />
        <button type="submit" name="btnEnviar">Enviar</button>
    </form>

    <hr />
    <div>
        <a href="listados.php">Ir a Reservas</a>
        <?php echo $txtMessage; ?>
    </div>
</body>

</html>