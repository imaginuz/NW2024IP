<?php

$intOperador1 = 0;
$intOperador2 = 0;
$intOperador3 = 0;
$cmbOperacion = "add";
$resultado = '';

if (isset($_POST["intOperador1"])) {
  $intOperador1 = floatval($_POST["intOperador1"]);
  $intOperador2 = floatval($_POST["intOperador2"]);
  $intOperador3 = floatval($_POST["intOperador3"]);
  $cmbOperacion = $_POST["cmbOperacion"];
}


if (isset($_POST["btnAdd"])) {
  $resultado = "La suma de " . $intOperador1 .
    " + " . $intOperador2 .
    " + " . $intOperador3 . " es igual a " . ($intOperador1 + $intOperador2 + $intOperador3) . "";
}
if (isset($_POST["btnSubs"])) {
  $resultado = "La resta de " . $intOperador1 .
    " - " . $intOperador2 .
    " - " . $intOperador3 . " es igual a " . ($intOperador1 - $intOperador2 - $intOperador3) . "";
}
if (isset($_POST["btnMult"])) { }
if (isset($_POST["btnDiv"])) { }
if (isset($_POST["btnCmb"])) {
  switch ($cmbOperacion) {
    case "add":
      $resultado = "La suma de " . $intOperador1 .
        " + " . $intOperador2 .
        " + " . $intOperador3 .
        " es igual a " . ($intOperador1 + $intOperador2 + $intOperador3);
      break;
    case "subs":
      $resultado = "La resta de " . $intOperador1 .
        " - " . $intOperador2 .
        " - " . $intOperador3 .
        " es igual a " . ($intOperador1 - $intOperador2 - $intOperador3);
      break;
    case "mult":
      break;
    case "div":
      break;
    default:
      break;
  }
}

?>
  <!DOCTYPE html>
  <html>

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condicionantes</title>
  </head>

  <body>
    <h1>Ejemplo de Condicionantes</h1>
    <form action="p2_estructuras_control.php" method="post">
      <fieldset>
        <legend>Operadores</legend>
        <label for="intOperador1">Operador 1</label>
        <input type="number" name="intOperador1" id="intOperador1" value="<?php echo $intOperador1; ?>" />
        <br />
        <label for="intOperador2">Operador 2</label>
        <input type="number" name="intOperador2" id="intOperador2" value="<?php echo $intOperador2; ?>" />
        <br />
        <label for="intOperador3">Operador 3</label>
        <input type="number" name="intOperador3" id="intOperador3" value="<?php echo $intOperador3; ?>" />
        <br />
        <label for="cmbOperacion">Operación: </label>
        <select id="cmbOperacion" name="cmbOperacion">
          <option value="add" <?php echo ($cmbOperacion == "add") ? "selected" : ""; ?>>Sumar</option>
          <option value="subs" <?php echo ($cmbOperacion == "subs") ? "selected" : ""; ?>>Restar</option>
          <option value="mult" <?php echo ($cmbOperacion == "mult") ? "selected" : ""; ?>>Multiplicar</option>
          <option value="div" <?php echo ($cmbOperacion == "div") ? "selected" : ""; ?>>Dividir</option>
        </select>
      </fieldset>
      <fieldset>
        <legend>Acciones</legend>
        <input type="submit" name="btnAdd" value="Sumar" />
        <br />
        <input type="submit" name="btnSubs" value="Restar" />
        <br />
        <input type="submit" name="btnMult" value="Multiplicar" />
        <br />
        <input type="submit" name="btnDiv" value="Dividir" />
        <br />
        <input type="submit" name="btnCmb" value="Procesar por Combo" />
        <br />
      </fieldset>
    </form>
    <div style="border:solid 1px #000; padding:1em">
      <?php echo $resultado; ?>
    </div>
  </body>

  </html>
