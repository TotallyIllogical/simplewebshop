<?php 

function printCart($items){
	// If the cart is empty print string
	if(empty($items)){
		print "Varukorgen är tom.";
		return;
	}

	// Loop items and add text
	foreach ($items as $key => $value) {
		$item = $key . " " . $value . " st";
		$all[] = $item;
	}

	$arraytostring = implode(', ', $all);

	// calculateCart located in inc/store.php
	$cost = calculateCart($items);

	$list = $arraytostring . ' - ';

	// Concatenate the strings
	$all = $list . $cost . ' kr <a href="emptycart.php"><button class="empty-cart-button button-xsmall pure-button">Töm</button></a>';

	print $all;
}