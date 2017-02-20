<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>Regex and forms</title>
		<style>
			/* Some styling... */
			body { text-align: center; margin-top: 50px; }
			p { padding: 0px; }
			input[type=text] {
				border: 1px dotted #999;
				font: 1.2em sans-serif;
				height: 1.5em;
				width: 300px;
				padding: 2px;
				margin: 0px;
			}
		</style>
	</head>
	<body>
	<div id="container">

		<?php

			// Execute this only if the form is sent
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {

				// Set in a variable the trimmed and sanitized input form
				$input = trim(filter_var($_POST['fullname']), FILTER_SANITIZE_SPECIAL_CHARS);

				// Check if the sanitized input matches the specified format
				if (preg_match('/^(?\'name\'([A-Z][a-z]+ ?){1,3}), \g\'name\'$/', $input)) {

					// Save in an array the surname and firstname, divided by the comma
					$arrFullname = explode(", ", $input);

					// Save in firstName the value of the input after the comma (firstname)
					$firstName = $arrFullname[1];

					// Save in surname the value of the input before the comma (surname)
					$surname   = trim($arrFullname[0]);

					// Create a new varaible wich contains the content of firstName
					$msg  = "First Name: <strong>".$firstName."</strong><br />";

					// And append the value of surname
					$msg .= "Surname: <strong>".$surname."</strong><br />";

				} else {

					// If the input does not match the regex, create a variable with the error message
					$msg = "<strong>The input is NOT valid</strong>";
				}

				// Print the content of the result
				echo $msg;
			}

		?>

		<p>Please, write in the following text box your Full Name in format 'Surname1 Surname2, Name'</p>
		<form action="" method="POST">
			<input type="text" name="fullname" value="<?php if (isset($_POST['fullname'])) echo trim($_POST['fullname']);?>" placeholder="Surname, Name" autofocus><br />
			<input type="submit" value="Check!">
		</form>

	</div>
	</body>
</html>