<?php
    // Código PHP
    /**
     * Este es un comentario de varias líneas
     * $intEdadComercial = 100;
     * $_POST
    */
 
    $txtNombre = "";
    $intEdad = 0;
    $txtMensajeFinal = "";

    if(isset($_POST['btnEnviar'])) {
        $txtNombre = $_POST['txtNombre'];
        $intEdad = intval($_POST["intEdad"]);   
        $txtMensajeFinal = "Hola, " . $txtNombre . $intEdad . "!";
        
    }
    if(isset($_POST['btnEnviar2'])) {
        $txtNombre = $_POST['txtNombre'];
        $intEdad = intval($_POST['intEdad']);
        $txtMensajeFinal = "Hola Dummy, " . $txtNombre . $intEdad . "!";
    }
?>


<!-- Código HTML -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primer Script PHP</title>

</head>

<body>
    <h1>Formulario de Datos Generales</h1>
    <form action="primer_script.php" method="POST">
        <label for="txtNombre">Nombre Completo</label>
        <input type="text" name="txtNombre" id="txtNombre" placeholder="Nombre Completo" value="<?php echo $txtNombre; ?>" required>   
        <br>

        <label for="intEdad">Edad</label>
        <input type="number" name="intEdad" id="intEdad" placeholder="0 ~ 100" value="<?php echo $intEdad; ?>" required>   
        <br>

        <button type="submit" name="btnEnviar">Enviar</button>
        <button type="submit" name="btnEnviar2">Enviar Dummy</button>

    </form>

    <?php echo $txtMensajeFinal; ?>
</body>

</html>