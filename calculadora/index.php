<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8">
	    <title>Calculadora</title>
	</head>
	<body>

	<?php

		$a = $_POST["a"];
	    $b = $_POST["b"];
	    $op = $_POST["operacao"];

	    function somar(int $a, int $b) {
	        return $a + $b;
	    }

	    function subtrair(int $a, int $b) {
	        return $a - $b;
	    }

	    function multiplicar(int $a, int $b) {
	        return $a * $b;
	    }

	    function dividir(int $a, int $b) {
	        return $a / $b;
	    }

	    switch ($op){
	      case "soma":
	        $resultado = somar($a, $b);
	        break;
	      case "sub":
	        $resultado = subtrair($a, $b);
	        break;
	      case "multi":
	        $resultado = multiplicar($a, $b);
	        break;
	      case "divi":
	        $resultado = dividir($a, $b);
	        break;
	      default:
	    }


	?>

	<h2>Calculadora</h2>
	<form action="index.php" method="post">
    <label>Valor 1 </label><br />
		<input type="number" name="a" /> <br />
	  <label>Valor 2 </label><br />
    <input type="number" name="b" /> <br /><br />
	  
    <input type="radio" id="soma" name="operacao" value="soma">
	  <label for="soma">Soma</label><br />
	  <input type="radio" id="sub" name="operacao" value="sub">
	  <label for="sub">Subtração</label><br />
	  <input type="radio" id="multi" name="operacao" value="multi">
	  <label for="multi">Multiplicação</label><br />
	  <input type="radio" id="divi" name="operacao" value="divi">
	  <label for="divi">Divisão</label><br /><br />
	  <input type="submit" value="enviar" /><br /><br />
	</form>
	<?php
    echo "<label>Resultado </label><br />";
	  echo "<input type='number' name='resultado' value='$resultado'/>"; 
	?>
	</body>
</html>
