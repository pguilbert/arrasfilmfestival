	<?php
	// Queries, see inc/parameters for more infos
	$random_partners = wp_get_recent_posts(partner_query(), ARRAY_A);
	?>

	<h2>Nos partenaires</h2>

	<?php foreach($random_partners as $partner): ?>
	<a href="<?php echo get_field('link', $partner['ID']); ?>">
		<?php responsive_thumbnail($partner['ID'], footer_name(), footer_class()); ?>
	</a>
	<?php endforeach; ?>

	<p>Site non officiel réalisé par les étudiants de l’EPSI. Tous droits réservés</p>

	<?php wp_footer(); ?>

	<body>
</html>