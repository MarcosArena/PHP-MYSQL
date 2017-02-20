<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>IP Validator</title>
		<style>
			body { text-align: center; }
		</style>
	</head>
	<body>
	<div id="container">

	<h1>IP Validator</h1>

		<?php

			$message = "";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (isset($_POST['strip'])) {
					if (preg_match('/^(\d{1,3}\.){3}\d{1,3}$/', $_POST['strip'])) {
						$arr = explode(".", $_POST['strip']);

						if ($arr[0] >= 0 && $arr[0] <= 10) {
							$message = "This is a private ip";
						}


					} else {
						$message = "The IP is not valid";
					}z
				} else {
					$message = "You must enter an IP";
				}
			}

			echo "<p>".$message."</p>";
			
		?>

		<form action="" method="POST">
			<input type="text" name="strip" value="<?php if (isset($_POST['strip'])) echo $_POST['strip'];?>" placeholder="Type any valid IP" autofocus>
			<input type="submit">
		</form>

	</div>
	</body>
</html>