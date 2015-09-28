<?php 
	require_once "inc/store.php";
	require_once "template/store_template.php";
	
	// getItems() located in inc/store.php
	$items = getItems();
?>

<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Skilltest for Caupo">
    <script src="script/script.min.js"></script>
    <link rel="stylesheet" href="style/style.css">
	
	<title>Caupos Arbetsprov</title>
</head>
<body>
<div class="pure-g">

	<!-- Cart -->
	<div class="pure-u-1 cart">
		<div class="menu-box">
		<!-- Cart content comes from cart.php -->
			<div id="cart">
			</div>
		</div>
	</div>

	<!-- Items -->
	<div class="content-box">
	<!-- printItems() located in template/store_template.php -->
		<?php printItems($items); ?>
	</div>
    
</div>
	
</body>
</html>