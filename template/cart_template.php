<?php 

function printCart($items){

	if(empty($items)){
		print "Varukorgen är tom.";
		return;
	}

	foreach ($items as $key => $value) {
		$item = $key . " " . $value . " st";
		$all[] = $item;
	}
	$arraytostring = implode(', ', $all);

	$cost = calculateCart($items);

	$list = $arraytostring . ' - ';

	$all = $list . $cost . ' kr <a href="emptycart.php"><button class="empty-cart-button button-xsmall pure-button">Töm</button></a>';

	print $all;
}