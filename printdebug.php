<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>Print debug</title>
	</head>
	<body>

		<h2>Debug</h2>

		<?php 

			$debug = true;

			if (1 < 2) {
				$a = 1 + 1;
				if ($debug) { echo "Result: " . showdebug($a, $debug); }
			}

			function showdebug($str, $debug) {
				if ($debug) { echo $str; }
			}

		?>

	</body>
</html>