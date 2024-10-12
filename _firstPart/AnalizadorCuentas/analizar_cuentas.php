<?php
require_once 'funciones.php';

$texto = '';
$cuentas = [];

if (isset($_POST["btnProcesar"])) {
    $texto = $_POST["texto"];
    $cuentas = extraerNumerosDeCuenta($texto);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Analizador de Cuentas</title>
</head>

<body>

    <h1>Extracción de numeros de Cuenta</h1>
    <form action="analizar_cuentas.php" method="post">
        <label for="texto">Introduzca el registro de meetings:</label><br>
        <textarea name="texto" id="texto" cols="60" rows="10"><?php echo ($texto); ?></textarea><br>
        <button type="submit" name="btnProcesar">Extraer Cuentas</button>
    </form>

    <hr>
    <h2>Numeros de cuenta eextraídos:</h2>
    <div>
        <?php
        if (!empty($cuentas)) {
            foreach ($cuentas as $cuenta) {
                echo $cuenta . "<br>";
            }
        } else {
            echo "No hay numeros de cuenta";
        }
        ?>
    </div>

</body>

</html>