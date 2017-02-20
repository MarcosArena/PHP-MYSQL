<!DOCTYPE html>
<html lang="es">
	<head>
	    <meta charset="UTF-8"/>
		<title>Calculo del Indice de Masa Corporal (IMC)</title>
		<style>
		body { background-color: #eee; text-align: center; }
		input[type=text] {
			border: 1px dotted #999;
			font: 1.2em sans-serif;
			height: 1.5em;
			width: 100px;
			padding: 2px;
		}
		</style>
	</head>
	<body>
	<div id="container">
		<h2>Calculo de IMC</h2>
		<form action="imc.php" method="post">
			<?php
				if (isset($_REQUEST['peso'])) {
					$peso = $_REQUEST['peso'];
				} else {
					$peso = "";
					$resultado = "Introducir peso";
				}
				if (isset($_REQUEST['altura'])) {
					$altura = $_REQUEST['altura'];
				} else {
					$altura = "";
					$resultado = "Introducir altura";
				}
			?>
			<p>Introduce el peso:<br /><input type="text" name="peso" placeholder="kg" value="<?php echo $peso?>" maxlength="3" pattern="[0-9]{2,3}" required autofocus> </p>
			<p>Introduce la altura:<br /><input type="text" name="altura" placeholder="cm" value="<?php echo $altura?>" maxlength="3" pattern="[0-9]{2,3}" required></p>
			<input type="submit" value="Comprobar" >
		</form>
	</div>

<?php

	/*
	 * Esto en teoria no hace falta porque ya 
	 * se hace la comprobacion en el html
	 */
	$peso = preg_replace('/[^0-9]/', '', $peso);
	$altura = preg_replace('/[^0-9]/', '', $altura);

	if ($peso && $altura) {
		$imc = imccheck($peso, $altura);
		$r = "Tu IMC es ".$imc." (".showresult($imc).")";
	} elseif ($peso == "" && $altura == "") {
		$r = "";
	} else {
		$r = "Faltan datos por introducir";
	}

	function imccheck($p, $a) {
		$r = ($p / (($a/100)^2));
		return (int)$r;
	}

	function showresult($imc) {
		if ($imc < 18.50) {
			return "Bajo peso";
		} elseif ($imc < 25) {
			return "Normal";
		} elseif ($imc < 30) {
			return "Sobrepeso";
		} else {
			return "Obesidad";
		}
	}
	
	echo "<p>".$r."</p>";

?>
	</body>
</html>