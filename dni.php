<!DOCTYPE html>
<html lang="es">
	<head>
	    <meta charset="UTF-8"/>
		<title>Comprobador de letra de DNI</title>
		<style>
		body { background-color: #eee; text-align: center; }
		input[type=text] {
			border: 1px dotted #999;
			font: 1.2em sans-serif;
			height: 1.5em;
			padding: 2px;
		}
		#footer {
		   position:fixed;
		   bottom:0px;
		   height:10px;
		   font-size: 0.6em;
		   width:100%;
		}
		</style>
	</head>
	<body>
	<div id="container">
		<h2>Validez de letra de DNI</h2>
		<form action="dni.php" method="post">
			<?php
				if (isset($_REQUEST['entrada'])) {
					$dni = $_REQUEST['entrada'];
				} else {
					$dni = "";
					$resultado = "Introducir DNI";
				}
			?>
			<p><input type="text" name="entrada" placeholder="Escribe aqui el DNI" value="<?php echo $dni?>" size="9" maxlength="9" pattern="[0-9]{8}[A-Za-z]" required autofocus>
			<input type="submit" value="Comprobar" ></p>
		</form>
	</div>

	<?php

		$startTime = microtime(true);

		$dni = preg_replace('/[^0-9A-Z]/', '', $dni);
		$dni = strtoupper($dni);

		if (preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {

			$resultado = "La letra del DNI <strong>$dni</strong> es ";

			if (dnicheck($dni)) {
				$resultado .= "correcta";
			} else {
				$resultado .= "erronea";
			}

		} elseif ($dni == "") {
			$resultado = "Introducir DNI";
		} else {
			$resultado = "El DNI introducido no es valido"; 
		}

		function dnicheck($dni) {

			$letras = "TRWAGMYFPDXBNJZSQVHLC";
			$mod = substr($dni, 0,8) % 23;

			if (substr($dni, 8,1) == $letras[$mod]) {
				return true;
			} else {
				return false;
			}

		}

		echo $resultado;

		echo "<p id='footer'>Calculado en <strong>" . number_format(( microtime(true) - $startTime), 8) . "</strong> seg.</p>";

	?>
	</body>
</html>