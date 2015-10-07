<?php 

require_once "inc/store.php";

session_start();

// Checks if the sessions has items in the cart, if it doesn't it redirect
if( isset( $_SESSION["cartItems"] ) ){
	$cartItems = $_SESSION["cartItems"];
}else{
	header('Location: index.php');
}

// Sets the sessions cart items to an empty array
$_SESSION["cartItems"] = array();

// Function located in inc/store.php
emptyCart($cartItems);

// Redirect
header('Location: index.php');