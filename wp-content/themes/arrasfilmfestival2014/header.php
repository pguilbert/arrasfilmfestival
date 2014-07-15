<!DOCTYPE html>
<html>
	<head <?php language_attributes(); ?>>
		<meta charset="<?php bloginfo('charset'); ?>">

		<title><?php the_title(); ?></title>

		<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css">

		<?php wp_head(); ?>
	</head>
	<body>
		<header>
			<h1><?php bloginfo('name'); ?></h1>

			<h2><?php bloginfo('description'); ?></h2>

			<nav>
			<?php echo strip_tags(wp_nav_menu(menu_settings()), '<a>'); ?>	
			</nav>

			<nav>
			<?php echo strip_tags(wp_nav_menu(responsive_menu_settings()), '<a>'); ?>	
			</nav>
		</header>