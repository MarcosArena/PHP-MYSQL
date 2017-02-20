<!DOCTYPE html>
<html lang="en">
	<head>
	    <meta charset="UTF-8"/>
		<title>PHPizza</title>
		<style>
			#container { font-size: 0.8em; }
			.errormsg { color: red; font-weight: bold; }
			td,tr,th { margin: 2px; padding: 2px; border: 0px dotted;}
		</style>
	</head>
	<body><!--

	a) Save a list of the possible ingredients for a pizza with their prices in an associative array. Take the keys and 
	values from the following table. (0.5 pts)

	Ingredient 			Price (€)
	Italian-Sausage 	0.90
	Green-Peppers* 		0.75
	Onions* 			0.65
	Beef 				1.05
	Mushrooms* 			1.00
	Chicken 			0.95
	Pepperoni 			0.85
	Black-olives* 		0.70

	b) Build a form where the list of the ingredients and their prices are presented to the user as check-boxes, in 
	order to allow him/her to choose his/her preferred ingredients for the pizza. You must use the associative array 
	built before and a loop. (1 pt)

	c) Add two radio buttons (yes/no) in order to ask the user whether (s)he is vegan. (0.5 pt)

	d) In the file processing the form (if you are using a different file) copy the line where the associative array 
	is defined. Then show in a bullet list all the ingredients that (s)he has chosen. (1 pts)

	e) If he has not chosen any ingredient, show a message inviting him/her to choose some of them in order to have a 
	more delicious pizza. (0.5 pt)

	f) In the table, the stars mark the vegan ingredients. If the user has marked that (s)he is vegan and (s)he has 
	chosen any of the non-vegan ingredients, present a warning telling him/her whether (s)he is sure about his/her 
	order as it contains meat. Tip: if it is easier for you, you can build an auxiliary simple array containing the 
	non-vegan ingredients. Another way to do this is to check 
	whether the star is present in the selected ingredients. (1.5 pts)

	g) Calculate the final price for the pizza taking 4 € as the base price and then adding the price of each 
	ingredient. Show it in the page. (1 pts)

	-->
	
	<?php
		
		$message	= "";
		$total		= "";
		$vegan		= "";

		$ingredients = [
			"Italian-Sausage" 	=> [0.90, 0],
			"Green-Peppers" 	=> [0.75, 1],
			"Onions" 			=> [0.65, 1],
			"Beef" 				=> [1.05, 0],
			"Mushrooms" 		=> [1.00, 1],
			"Chicken" 			=> [0.95, 0],
			"Pepperoni"			=> [0.85, 0],
			"Black-olives"		=> [0.70, 1]
		];

		// Checking if form is sent
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if (empty($_POST['ingredients'])) {
				$message = "<div class=\"errormsg\">You have not selected any ingredient. Select some ingredients to 
				enjoy a more delicious pizza!</div>";
				$total   = "<p>The total price is: <strong>4 euros</strong></p>";
			} else { 
				if (empty($_POST['vegan'])) {
					$message = "<div class=\"errormsg\">You must specify if you are vegan or not</div>";
				} else {
					if ($_POST['vegan'] == "yes") {
						if (isVegan($ingredients, $_POST['ingredients'])) {
							$vegan = "<div class=\"errormsg\">Some of the ingredients that you chosen contains meat. 
							Are you sure that you want it?</div>";
						}
					}
					$message = "<p>You have chosen the following ingredients: <strong>" . checkedIngredients($_POST['ingredients']) . "</strong></p>";
					$total   = "<p>The total price is: <strong>" . totalPrice($ingredients, $_POST['ingredients']) . " euros</strong></p>";
				}
				
			}
		}

		function createTable($ing) {
			$table = "<table><tr><th></th><th>Ingredient</th><th>Price</th></tr>\n";
			foreach ($ing as $name => $options) {

				// Print ingredient names row
				$table .= "\t\t\t\t<tr><td><input type=\"checkbox\" name=\"ingredients[]\" value=\"" . $name . "\"></td><td>" . $name;
				
				foreach (array_reverse($options) as $key => $value) {
					if ($key == 0) {
						// Print vegan's star
						if ($value) { $table .= " (*)"; }
						$table .= "</td>";
					} else if ($key == 1) {
						// Print price of each ingredient
						$table .= "<td>" . $value . "</td>\n";
					} 
				}
			}
			$table .= "\t\t\t</table>\n";
			return $table;
		}

		function checkedIngredients($ing) {
			$chkIng = "";
			foreach ($ing as $key => $value) { 
				$chkIng .= $value; 
				if ($key < count($ing)-1) {
					$chkIng .= ", ";
				}
			}
			return $chkIng;
		}

		function isVegan($ing, $selected) {
			foreach ($selected as $value) {
				foreach ($ing as $name => $options) {
					if ($value == $name) {
						foreach ($options as $key => $vegan) {
							if ($vegan == 0) {
								return true;
							}
						}
					}
				}
			}
		}

		function totalPrice($ing, $selected) {
			$total = "";
			foreach ($selected as $value) {
				foreach ($ing as $name => $options) {
					if ($value == $name) {
						foreach ($options as $key => $price) {
							if ($key == 0) {
								$total += $price;
							}
						}
					}
				}
			}
			$total += 4;
			return $total;
		}

	?>

	<div id="container">

		<h1>PHPizza</h1>

		<p>In this page you can select the ingredients of your pizza. Just check what you want and we will prepare it. <br />
		You can also specify if you are vegan.</p>

		<form action="" method="POST"> 
			<p><strong>Select your ingredients</strong></p>
				<?php echo createTable($ingredients) ?>
			<p><strong>Are you vegan?</strong>
				<input type="radio" name="vegan" value="yes">Yes
				<input type="radio" name="vegan" value="no">No</p>
			<p><input type="submit" value="Calculate total price"></p>
		</form>

		<?php 
			echo $vegan;
			echo $message;
			echo $total;
		?>

	</div>


</body>
</html>