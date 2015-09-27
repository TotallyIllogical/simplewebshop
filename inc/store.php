<?php

function getItems(){
	$result = array();
	$data = file_get_contents('db/products.json');
	$data = utf8_encode($data);
	$data = json_decode($data);

	foreach ($data as $value) {
		$result[] = $value;
	}
	return $result;
}

function putItemInCart($item){
	$items = getItems();

	foreach ($items as &$value) {
		if ( $value->title == $item ) {
			$value->quantity = $value->quantity -1;
	    }
	}

	$newJsonString = json_encode($items);
	file_put_contents('db/products.json', $newJsonString);
}

function getItemPrice($title){
	$items = getItems();
	foreach ($items as $value) {
		if ( $value->title == $title ) {
			return $value->price;
	    }
	}
}

function calculateCart($cartItems){
	$sum = 0;

	foreach ($cartItems as $title => $quantity) {
		$price = getItemPrice($title);
		$sum += $price * $quantity;
		
	}

	return $sum;
}
function emptyCart($cartItems){
	$items = getItems();

	foreach ($cartItems as $title => $quantity) {
		foreach ($items as &$item) {
			if ( $item->title == $title ) {
				$item->quantity = $item->quantity + $quantity;
		    }
		}
	}

	$newJsonString = json_encode($items);
	file_put_contents('db/products.json', $newJsonString);
}