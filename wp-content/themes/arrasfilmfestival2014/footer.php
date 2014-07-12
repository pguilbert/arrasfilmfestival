	<?php
	/* Query Parameters */

	// Recent briefs
	$partner_query = array(
		'numberposts' 	=> 6,
		'orderby' 		=> 'rand',
		'post_type' 	=> 'partner',
		'post_status' 	=> 'publish'
	);

	/* Wordpress functions */
	$random_partners = wp_get_recent_posts($partner_query, ARRAY_A);
	?>
	<h2>Nos partenaires</h2>
	<?php foreach($random_partners as $partner): ?>
		<?php echo get_the_post_thumbnail($partner['ID']); ?>
	<?php endforeach; ?>
	<p>Site non officiel réalisé par les étudiants de l’EPSI. Tous droits réservés</p>
	<?php wp_footer(); ?>
	<body>
</html>