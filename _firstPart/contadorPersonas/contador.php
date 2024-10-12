<?php
require_once "libreria.php";

if(isset($_POST["btnIn"])){
    ingresaPersona();
}

if(isset($_POST["btnOut"])){
    salidaPersona();
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contador de Personas</title>
</head>
<body>
    <h1>Contador de Personas</h1>
    <form action="contador.php" method="post">
        <button type="submit" name="btnIn">Ingresa</button>
        &nbsp;
        <button type="submit" name="btnOut">Salida</button>
    </form>
    
</body>
</html>