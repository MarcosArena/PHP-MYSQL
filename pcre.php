<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>PCRE</title>
		<style>
		#container { text-align: center; }
		#true { color: green; font-weight: bold; font-size: 1.6em; }
		#false { color: red; font-weight: bold; font-size: 1.6em; }
		input[type=text] {
			border: 1px dotted #999;
			font: 1.2em sans-serif;
			height: 1.5em;
			padding: 4px;
		}
		input[type=submit] {
			padding-left: 20px;
			padding-right: 20px;
			font: 1.2em sans-serif;
		}
		</style>
	</head>
	<body>

	<div id="container">

		<?php //;

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				$pattern = $_POST['pattern'];
				$subject = $_POST['subject'];
						
				echo "<p>The result of checking</p><p><strong>/".htmlentities($pattern)."/</strong></p>against<p>\"".htmlentities($subject)."\"</p><p>is ";
				
				if (preg_match("/$pattern/", $subject)) {
					echo "<span id=\"true\">TRUE!</span></p>";
				} else {
					echo "<span id=\"false\">FALSE!</span></p>";
				}	
			}

		?>

		<form action="" method="post">
			<p>/ <input type="text" name="pattern" value="<?php if (isset($pattern)) echo htmlentities($pattern); ?>" size="40" placeholder="Regular Expression"/> /</p>
			<p>^ <input type="text" name="subject" value="<?php if (isset($subject)) echo htmlentities($subject); ?>" size="40" placeholder="String to match" autofocus/> $</p>
			<input type="submit" name="submit" value="Check" />
		</form>

	</div>

</body>
</html>