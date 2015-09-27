<?php 

require_once "inc/store.php";

session_start();

if( isset( $_SESSION["cartItems"] ) ){
	$cartItems = $_SESSION["cartItems"];
}else{
	header('Location: index.php');
}
$_SESSION["cartItems"] = array();
emptyCart($cartItems);
header('Location: index.php');