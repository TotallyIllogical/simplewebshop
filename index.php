<?php 
	require_once "inc/store.php";
	require_once "template/store_template.php";
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
		<div class="padded-box" id="cart">
		</div>
	</div>

	<!-- Items -->
	<?php printItems($items); ?>
    
</div>
	
</body>
</html>