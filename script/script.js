$(document).ready(function(){

	// Loads cart.php and adds it to the div with the cart id
	$("#cart").load("cart.php");

	// Reacts when a buy-button is clicked
	$('.buy-button').click(function(e) {
		e.preventDefault();

		// Sets the item connected to the button to the variable
		var currentItem = $(this).data("item");
		// Makes so the quantity is changed when the button are clicked
		var calculatedQuantity = $("#quantity-" + currentItem).html() -1;

		// Checks if the quantity is 0 and disables the button if it is
		if(calculatedQuantity === 0 ){
			$(this).addClass("pure-button-disabled").attr("disabled", "disabled");
		}
		// See the variables currentItem and calculatedQuantity
		$("#quantity-" + currentItem).html(calculatedQuantity);

		// POSTs the item to cart.php
		$.post("cart.php", {item: currentItem}).done(function(data){
			
		});

	});


});