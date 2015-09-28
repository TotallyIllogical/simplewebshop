<?php
require_once "inc/store.php";
require_once "template/cart_template.php";

session_start();

// Hard reset to only be used in production, don't forget to reset db/products.json too
// $_SESSION["cartItems"] = array();

// Checks if the current session already has items in the cart. If it doesn't create an empty array
if( isset( $_SESSION["cartItems"] ) ){
	$cartItems = $_SESSION["cartItems"];
}else{
	$cartItems = array();
}

// Checks if it has received an item. If it does it uses it to run the function putItemInCart located in inc/store.php
if( isset( $_POST["item"] ) ){

	$itemname = $_POST["item"];
	putItemInCart($itemname);

	// Checks if the cart already has an item and add to it else it adds one
	if( isset( $cartItems[$itemname] ) ){
		$cartItems[$itemname] += 1;
	}else{
		$cartItems[$itemname] = 1;
	}

	// Adds $cartItems to the session
	$_SESSION["cartItems"] = $cartItems;
}

// Function comes from template/cart_template.php
printCart($cartItems);