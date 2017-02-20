<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8"/>
    <style>
    h2 { padding-top: 20px; }
    table { border-collapse: collapse; }
	th, td { border: 1px solid #bbb; padding: 3px;}
	tr:nth-child(even) {background-color: #f2f2f2}

    </style>
    <body>

	<?php

	/*
	 * substr();
	 * 
	 * name (10), surname (10), telf(9)
	 * 
	 */

	echo "<h2>Ejercicio substr()</h2>";

	$text1 = "     Diego:     Ortiz:971123445";

	echo "<p>String: <pre>$text1</pre></p>";

	echo "Name: " . substr($text1, 5,5) . "<br />";
	echo "Surname: " . substr($text1, 16,5) . "<br />";
	echo "Telf: " . substr($text1, 22,9) . "<br />";


	/*
	 * str_replace();
	 *
	 * ocultar tacos de un texto ñ.ñ
	 * también sirve para eliminar espacios
	 * o cualquier otro caracter
	 *
	 */ 

	echo "<h2>Ejercicio str_replace()</h2>";

	$text2 = "Arbeloa es un cono";
	$text2r = str_replace("cono", "<strong>gran jugador y mejor persona</strong>", $text2);

	echo "<p>Mensaje: $text2</p>";
	echo "<p>No, no: $text2r</p>";


	/*
	 * tabla hexadecimal
	 *
	 */

	echo "<h2>Ejercicio tabla hexadecimal</h2>";

	$table = "<table>";

	$n = 16;

	for ($i=-1; $i<$n; $i++) {
		$table .= "<tr>";
		for ($j=-1; $j<$n; $j++) {
			$table .= "<td>";
			if ($i==-1 && $j==-1) {
				$table .= "";
			} elseif ($i==-1) {
				$table .= "<strong>".dechex($j)."</strong>";
			} elseif ($j==-1) {
				$table .= "<strong>".dechex($i)."</strong>";
			} else {
				$x = dechex($i).dechex($j);
				$table .= hexdec($x);
				//$table .= 16*$i+$j;
			}
			$table .= "</td>";
		}
		$table .= "</tr>";
	}
	$table .= "</table>";

	echo $table;

	?>

    </body>
</html>
