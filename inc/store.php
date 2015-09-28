<?php

// Gets the db and decodes it
function getItems(){
	$result = array();

	// Fetches the data from the db and decode it 
	$data = file_get_contents('db/products.json');
	$data = utf8_encode($data);
	$data = json_decode($data);

	// Adds the decoded data to an array
	foreach ($data as $value) {
		$result[] = $value;
	}
	return $result;
}

function putItemInCart($item){
	// Fetches the array from getItems
	$items = getItems();

	// Goes through the array and if it matches the parameter sent to the function lowers the matching item quantity by one
	foreach ($items as &$value) {
		if ( $value->title == $item ) {
			$value->quantity = $value->quantity -1;
	    }
	}

	// Encode the array back to JSON and saves the db with the new data
	$newJsonString = json_encode($items);
	file_put_contents('db/products.json', $newJsonString);
}

function getItemPrice($title){
	// Fetches the array from getItems
	$items = getItems();

	// Goes through the array and fetches the price of the item that the parameter matches 
	foreach ($items as $value) {
		if ( $value->title == $title ) {
			return $value->price;
	    }
	}
}

function calculateCart($cartItems){
	$sum = 0;

	// Goes through the items sent to the function and uses the quantity and price to calculate the total sum
	foreach ($cartItems as $title => $quantity) {
		$price = getItemPrice($title);
		$sum += $price * $quantity;
	}

	return $sum;
}

function emptyCart($cartItems){
	// Fetches the array from getItems
	$items = getItems();

	// Loop the parameter
	foreach ($cartItems as $title => $quantity) {
		// Loop data from the getItems function
		foreach ($items as &$item) {
			// If the  data received from $items matches data received from $cartItems adds the quantity of $cartItems to the quantity of $items
			if ( $item->title == $title ) {
				$item->quantity = $item->quantity + $quantity;
		    }
		}
	}

	// Encodes the data back to JSON and saves the db with the new data
	$newJsonString = json_encode($items);
	file_put_contents('db/products.json', $newJsonString);
}