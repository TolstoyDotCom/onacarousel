
<?php

function createTile( $i ) {
	if ( $i % 2 ) {
		$tn = '20231121_124528tn.jpg';
		$image = '20231121_124528.jpg';
	}
	else {
		$tn = '20231121_152447tn.jpg';
		$image = '20231121_152447.jpg';
	}

$s = <<< PRE
			<div class="slide-content" data-fullimage="{$image}">
				<img src="{$tn}" alt="Thumbnail {$i}" class="tile-image">
				<input type="checkbox" class="tile-checkbox" id="tile_checkbox{$i}">
				<label for="tile_checkbox{$i}"></label>
			</div>
PRE;
return $s;
}

?><!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/tiny-slider.css">
		<!--[if (lt IE 9)]><script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.4/min/tiny-slider.helper.ie8.js"></script><![endif]-->
		<title>On a carousel</title>
	</head>
	<body>
		<p>On a carousel.</p>

		<div class="my-slider">
			<?php for ( $i = 0; $i < 20; $i++ ) echo createTile( $i ); ?>
		</div>

		<div id="bigimage">
		</div>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js"></script>

	<script type="module">
		var slider = tns({
			container: '.my-slider',
			items: 20,
			slideBy: 'page',
			autoplay: false
		});

		document.querySelectorAll( '.slide-content' ).forEach( element => element.addEventListener( 'click', e => {
			const img = document.createElement( 'img' );
			img.src = e.currentTarget.dataset.fullimage;
			const bigimage = document.getElementById( 'bigimage' );
			while ( bigimage.hasChildNodes() ) {
				bigimage.removeChild( bigimage.lastChild );
			}

			bigimage.appendChild( img );
		}));
		</script>
</html>
