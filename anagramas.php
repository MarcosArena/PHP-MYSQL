<!DOCTYPE html>
<html lang="es">
	<head>
	    <meta charset="UTF-8"/>
		<title>Anagramas</title>
		<style>
		body { background-color: #eee; text-align: center; }
		input[type=text] {
			border: 1px dotted #999;
			font: 1.2em sans-serif;
			height: 1.5em;
			width: 200px;
			padding: 2px;
		}
		</style>
	</head>
	<body>
	<div id="container">
		<h2>Anagramas</h2>
		<form action="anagramas.php" method="post">
			<?php
				if (isset($_REQUEST['pri'])) {
					$pri = $_REQUEST['pri'];
				} else {
					$pri = "";
				}
				if (isset($_REQUEST['seg'])) {
					$seg = $_REQUEST['seg'];
				} else {
					$seg = "";
				}
			?>
			<p>Introduce una palabra:<br /><input type="text" name="pri" placeholder="Primera palabra" value="<?php echo $pri?>" maxlength="15" required autofocus> </p>
			<p>Introduce otra palabra:<br /><input type="text" name="seg" placeholder="Segunda palabra" value="<?php echo $seg?>" maxlength="15" required></p>
			<input type="submit" value="Comprobar" >
		</form>
	</div>

<?php

	if ($pri && $seg) {
		$r = checkanagrama($pri, $seg);
	} elseif ($pri == "" && $seg == "") {
		$r = "";
	} else {
		$r = "Por favor, rellena las dos cajas de texto";
	}

	function checkanagrama($a, $b) {
		
		return $r;
	}
	
	echo "<p>".$r."</p>";

?>
	</body>
</html>