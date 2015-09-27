$(document).ready(function(){
	$("#cart").load("cart.php");

	$('.buy-button').click(function(e) {
		e.preventDefault();

		var currentItem = $(this).data("item");
		var calculateQuantity = $("#quantity-" + currentItem).html() -1;
		if(calculateQuantity === 0 ){
			$(this).addClass("pure-button-disabled");
			$(this).attr("disabled", "disabled");
		}
		$("#quantity-" + currentItem).html(calculateQuantity);
		$.post("cart.php", {item: currentItem}).done(function(data){
			$("#cart").html(data);
		});

	});


});