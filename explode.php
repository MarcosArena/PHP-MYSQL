<?php
	
	$url = "https://secure.php.net/manual/es/function.explode.php";

	$elements = explode("/", $url);

	foreach ($elements as $key => $value) {
		echo "$value";
		if ($key < count($elements)) {
			echo ", ";
		}
	}


	$implode = implode($elements, "/");
	echo "<p>" . $implode . "</p>";


?>