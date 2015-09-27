<?php

function printItems($items){

	foreach($items as $item){
		?>

		<div class="pure-u-1-3">
	    	<div class="padded-box image">
				<img src="<?php print $item->image; ?>" class="pure-img">
			</div>
		</div>
	    <div class="pure-u-2-3">
	    	<div class="pure-u-1">
	    		<div class="padded-box title">
					<h1><?php print $item->title; ?></h1>
				</div>
	    	</div>
	    	<div class="pure-u-1">
	    		<div class="padded-box">
					<p>Lagerstatus: <span id="quantity-<?php print $item->title; ?>"><?php print $item->quantity; ?></span></p>
					<p>Pris: <span><?php print $item->price; ?></span></p>
				</div>
	    	</div>
	    	<div class="pure-u-1">
		    	<div class="padded-box">
		    		<?php 
			    		if($item->quantity == 0) {
			    			?>
			    			<button class="buy-button pure-button pure-button-disabled">Lägg i varukorg</button>
			    			<?php
			    		}else {
			    			?>
			    			<button class="buy-button pure-button" data-item="<?php print $item->title; ?>">Lägg i varukorg</button>
			    			<?php
			    		}
		    		?>
	    		</div>
	    	</div>
		</div>

		<?php
	}

}