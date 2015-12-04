<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>
	<head>
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<?php print $scripts; ?>
	</head>
	<body data-spy="scroll" data-target="#site-nav" class="<?php print $classes; ?>" <?php print $attributes; ?>>
		<?php print $page_top; ?>
		<?php print $page; ?>
		<?php print $page_bottom; ?>
		<?php # javascripts ?>
		<?php if ($is_front): ?>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/bower_components/jquery/dist/jquery.min.js'; ?>">
			</script>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>">
			</script>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/bower_components/smooth-scroll/dist/js/smooth-scroll.min.js'; ?>">
			</script>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/assets/js/main.js'; ?>">
			</script>	
			<!-- Script to Activate the Carousel -->
	    <script>
	    $('#myCarousel').carousel({
	    	interval: 3000 //changes the speed
	    });
	    </script>	
	    <script type="text/javascript" src="<?php print base_path() 
	    	. drupal_get_path('theme', 'opc_theme') . '/bower_components/wowjs/wow.js'; ?>">
			</script>	
		<?php else: ?>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/bower_components/jquery/dist/jquery.min.js'; ?>">
			</script>
			<script type="text/javascript" src="<?php print base_path() 
				. drupal_get_path('theme', 'opc_theme') . '/bower_components/bootstrap/dist/js/bootstrap.min.js'; ?>">
			</script>
		<?php endif; ?>
	</body>
</html>