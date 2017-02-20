<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>Username</title>
		<style>
			body { text-align: center; }
		</style>
	</head>
	<body>
	<div id="container">

	<h1>Username</h1>
	
	<!--

	a) Write a form that asks for the full name (name plus surnames) of the user in a single text box. (0.5 pt)

	b) In the file that will process the form, write the code needed to process the full name word by word. It is mandatory to split the full name in each word and to use a loop. (1 pt)

	c) Build a username by taking the first two letters of each word and joining them. (1 pt)

	d) Convert the username to lower case letters (0.5 pts)

	e) Modify b) to take into account only those words with at least three or more characters. Tip: The easiest way is to add a conditional inside the loop. (1 pt)

	f) As a final step, show both the original full name and the generated username

	-->
	<?php
	
	$startTime = microtime(true);

	// Checking if form is sent
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if (empty($_POST['input'])) {

			// If form is empty, show warning message
			$output = "You must fill up the textbox"; 

		} else { 

			// If not, process the value of input textbox

			// Change the value of $input variable from POST, trimmed and sanitized
			$input = trim(filter_var($_POST['input'], FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH));

			// Convert $input to an array to save the words of the textbox
			$inputarr = explode(" ", $input);

			// Loop to work with each word of array
			$username = "";
			foreach ($inputarr as $key => $value) {
				// Take only words of 3 or more chars
				if (strlen($value) >= 3) {
					// Get only the first 2 chars of the word
					$username .= substr($value, 0, 2);
				}
			}
			// Switch lo lowercase all characters
			$output = strtolower($username);

			// And show the results
			echo "<p>Your new username generated is: " . $output . "</p>";
			echo "<p>Your sanitized input value was: " . $input . "</p>";
		}
	} 

	?>

	<!-- Asking for the fullname in a single textbox -->
	<fieldset>
		<legend>Username generator</legend>
	<form action="" method="post"> 
		<p>Please, put your fullname: <br /> 
		<input type="textbox" name="input" value="<?php if (isset($_POST['input'])) { echo $_POST['input']; }?>"><br />
		<input type="submit" value="Get username"></p>
	</form>
	</fieldset>
	<p>Generated in <?php echo number_format(( microtime(true) - $startTime), 8); ?> seconds</p>
	</div>
</body>
</html>