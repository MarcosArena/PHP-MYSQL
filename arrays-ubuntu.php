<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    </head>
    <body>

	<?php
		$ub410 = ["4.10", "Warty Warthog", "2004-10-20", "2006-04-30", "2.6.8"];
		$ub504 = ["5.04", "Hoary Hedgehog", "2006-10-31", "2.6.10"];
		$ub510 = ["5.10", "Breezy Badger", "2007-04-13", "2007-04-13", "2.6.12"];

		echo "Debug array: ";
		print_r($ub410);

		echo "<p>Ubuntu version history</p>";

		echo "Version: " . $ub410[0];
		echo "<br />Codename: " . $ub410[1];
		echo "<br />Release date: " . $ub410[2];
		echo "<br />Supported until: " . $ub410[3];
		echo "<br />Kernel version: " . $ub410[4];


		$ubuntults = ["Version" => "6.06 LTS",
			"Codename" => "Dapper Drake",
			"Release date" => "2006-06-01",
			"Supported until" => "2011-06-01",
			"Kernel version" => "2.6.15"];
		
		echo "<br /><br />Array foreach:<br />";
		$tver = "<table border=1>";
		foreach ($ubuntults as $key => $val) {
			$tver .= "<tr><td>".$key."</td><td>".$val."</td></tr>";
		}
		$tver .= "</table>";
		echo $tver;


		echo "<p>Array range: "
;		foreach (range(0, 90, 3) as $numero) {
		    echo $numero.", ";
		}
		echo "</p>";



		
	?>

    </body>
</html>