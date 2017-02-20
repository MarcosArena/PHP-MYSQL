<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>PHPCrypter</title>
	</head>
	<body>

		<h2>PHPCrypter</h2>

		<?php 

			$options = ["Encrypt", "Decrypt"];
			$cryptvalues = [
				"a" => "e", "b" => "j", "c" => "r", "d" => "f", "e" => "w",
				"f" => "v", "g" => "l", "h" => "m", "i" => "a", "j" => "o",
				"k" => "u", "l" => "2", "m" => " ", "n" => "0", "o" => "s",
				"p" => "b", "q" => "y", "r" => "6", "s" => "4", "t" => "h", 
				"u" => "k", "v" => "9", "w" => "c", "x" => "q", "y" => "n", 
				"z" => "3", "1" => "d", "2" => "g", "3" => "i", "4" => "z", 
				"5" => "t", "6" => "p", "7" => "5", "8" => "x", "9" => "1",
				"0" => "7", " " => "8"
			];
			$msg = "";

			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				if (isset($_POST['string'])) {
					$str = trim(strtolower($_POST['string']));
					if (preg_match('/^[a-z0-9 ]+$/', $str)) {
						if ($_POST['option'] == $options[0]) {
							$msg = encrypt($str, $cryptvalues);
						} elseif ($_POST['option'] == $options[1]) {
							$msg = decrypt($str, $cryptvalues);
						} else { 
							$msg = "Error"; 
						}
						echo "<p>Text to (de)crypt: " . $_POST['string'] . "</p>\n";
						echo "<p>(De)crypted text: " . $msg . "</p>\n";
					} else {
						echo "<p>Text to (de)crypt must contain a-z, 0-9 and at least one space</p>\n";
					}
				} else {
					echo "<p>You must enter a text to (de)crypt</p>\n";
				}
			}


			echo "<form action=\"\" method=\"post\">\n\t<textarea name=\"string\" cols=\"50\" rows=\"4\" placeholder=\"Put your text here\">";
			if (isset($_POST['string'])) { echo $_POST['string']; }
			echo "</textarea>\n";

			echo "\t<p>Select a function to execute:\n\t<select name=\"option\">\n";
			foreach ($options as $key) {
				echo "\t\t<option value=\"" . $key . "\">" . $key . "</option>\n";
			}
			echo "\t</select>\n</p>\n<input type=\"submit\" value=\"Do\"></form>\n";


			function encrypt ($str, $arr_crypt) {
				global $out;
				for ($i=0; $i<strlen($str); $i++) {
					$letra = $arr_crypt[$str[$i]];
					$out .= $letra;
				}
				return $out;
			}

			function decrypt ($str, $arr_crypt) {
				global $out;
				$arr_crypt = array_flip($arr_crypt);
				for ($i=0; $i<strlen($str); $i++) {
					$letra = $arr_crypt[$str[$i]];
					$out .= $letra;
				}
				return $out;
			}

		?>
		

	</body>
</html>