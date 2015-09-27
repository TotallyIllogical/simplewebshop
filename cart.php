<?php
require_once "inc/store.php";
require_once "template/cart_template.php";

session_start();

// Temporary reset
// $_SESSION["cartItems"] = array();

if( isset( $_SESSION["cartItems"] ) ){
	$cartItems = $_SESSION["cartItems"];
}else{
	$cartItems = array();
}

if( isset( $_POST["item"] ) ){
	$itemname = $_POST["item"];

	putItemInCart($itemname);

	if( isset( $cartItems[$itemname] ) ){
		$cartItems[$itemname] += 1;
	}else{
		$cartItems[$itemname] = 1;
	}
	
	$_SESSION["cartItems"] = $cartItems;
}

// template/cart_template.php
printCart($cartItems);