<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title><?php the_title(); ?></title>

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/publics/css/app.css" type="text/css">
		
		<?php wp_head(); ?>
	</head>
	<body>
	<nav class="w-nav nav" data-collapse="medium" data-animation="default" data-duration="400" data-contain="1" data-easing="ease-in" data-easing2="ease-out">
		<div class="w-container">
			<nav class="w-nav-menu responsive-background" role="navigation" style="-webkit-transform: translateX(0px) translateY(0px);">
				<?php echo strip_tags(wp_nav_menu(menu_settings()), '<a>'); ?>	
			</nav>
			<div class="w-nav-button responsive-background">
				<div class="w-icon-nav-menu icon"></div>
			</div>
			<div class="w-clearfix brand">
				<h2 class="title">Arras Film Festival 2014&nbsp;</h2>
				<div class="subtitle">Réalisé par les étudiants de l’EPSI Arras</div>
			</div>
		</div>
		<div class="w-nav-overlay" data-wf-ignore=""></div>
	</nav>
	<div class="section menu-padding">
		<div class="<?php echo (is_404()) ? 'w-container _404-container' : 'w-container'; ?>">