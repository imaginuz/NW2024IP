<?php
$txtNombre = "";
$intEdad = 0;
$txtMensajeFinal = "";

if(isset($_POST['btnEnviar'])) {
    $txtNombre = $_POST['txtNombre'];
    $intEdad = intval($_POST["intEdad"]);   
    $txtMensajeFinal = "Hola, " . $txtNombre . " Tienes " . $intEdad . " Años!";
    
    if($intEdad < 18) {
        $txtMensajeFinal .= " Todavia estas pollo.";
    } else {
        $txtMensajeFinal .= " Ya estas betarro.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resgitro Nombre</title>
</head>
<body>
    <h1>Registro Nombre y Edad</h1>

    <form action="registro_nombre.php" method="POST">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre Completo" value="<?php echo $txtNombre; ?>" required>
        <br>

        <label for="intEdad">Edad</label>
        <input type="number" name="intEdad" id="intEdad" placeholder="0 ~ 100" value="<?php echo $intEdad; ?>" required>
        <br>

        <button type="submit" name="btnEnviar">Enviar</button>
    </form>

    <?php echo $txtMensajeFinal; ?>
</body>
</html>