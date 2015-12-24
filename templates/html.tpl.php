<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN"
 "http://www.w3.org/TR/html4/strict.dtd">
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>" <?php print $rdf_namespaces; ?>>
	<head>
		<?php print $head; ?>
		<title><?php print $head_title; ?></title>
		<?php print $styles; ?>
		<link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.1/normalize.css">
		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
	    	interval: 4000 //changes the speed
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