<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>Validate and Sanitize</title>
		<style>
			body { text-align: center; }
		</style>
	</head>
	<body>
	<div id="container">

		<h2>Validate and Sanitize</h2>

		<?php

		$out = "";
		$i = "";
		$input = "";

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST['input'])) {
				$out = "You must fill the textbox";
				$san = $out;
			} else {

				$input = $_POST['input'];
				$i = "Input: ".$input." (Sanitized: ".filter_var($_POST['input'], FILTER_SANITIZE_EMAIL).")";
				
				if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
					$out = "The content is an email";
				} else if (filter_var($input, FILTER_VALIDATE_IP)) {
					$out = "The content is an IP";
				} else if (filter_var($input, FILTER_VALIDATE_URL)) {
					$out = "The content is an URL";
				} else {
					$out = "The content is not an email nor ip nor url";
				}
			}
		} 

		echo "<p>".$out."</p>";
		echo "<p>".$i."</p>";

		?>

		<form action="" method="post">
			<p><input type="textbox" name="input" value="<?php if (isset($_POST['input'])) { echo $_POST['input']; }?>">
			<input type="submit" value="Check this!"></p>
		</form>

	</div>
</body>
</html>