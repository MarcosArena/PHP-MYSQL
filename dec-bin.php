<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>Bin-Dec converter</title>
		<style>
			body { text-align: center; }
		</style>
	</head>
	<body>
	<div id="container">

		<h2>Converter</h2>

		<?php

			$out    = "";
			$result = "";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				if (empty($_REQUEST['dec']) && empty($_REQUEST['bin'])) {
					$out .= "At least one field must be filled in correct format";
				} else if (is_numeric($_REQUEST['bin']) && empty($_REQUEST['dec'])) {
					$result = bindec((int)$_REQUEST['bin']);
					$out .= $_REQUEST['bin']." binary equals <strong>".$result."</strong> decimal";
				} else if (is_numeric($_REQUEST['dec']) && empty($_REQUEST['bin'])) {
					$result = decbin((int)$_REQUEST['dec']);
					$out .= $_REQUEST['dec']." decimal equals <strong>".$result."</strong> binary";
				} else {
					$out .= "At least one field must be empty";
				}
				
				echo $out;

			} else {
				echo "Please, fill up the fields";
			}

		?>

		<form action="dec-bin.php" method="post">

			<p>Decimal: <input type="textbox" name="dec" value="<?php if (isset($_POST['dec'])) { echo $_POST['dec']; }?>"></p>
			<p>Binary:  <input type="textbox" name="bin" value="<?php if (isset($_POST['bin'])) { echo $_POST['bin']; }?>"></p>

			<input type="submit" value="Conv">

		</form>

	</div>
	</body>
</html>