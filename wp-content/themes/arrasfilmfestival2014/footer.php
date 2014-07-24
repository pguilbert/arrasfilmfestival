<?php
// Queries, see inc/parameters for more infos
$random_partners = wp_get_recent_posts(partner_query(), ARRAY_A);
?>
			</div>
			<section class="section partners">
				<div class="w-container">
					<h2 class="responsive-margin-left">Nos partenaires</h2>
					<div class="w-row">
						<?php foreach($random_partners as $partner): ?>
						<div class="w-col w-col-2 w-col-small-2">
							<a class="w-inline-block thumbnail-link partner-margin" href="<?php echo get_field('link', $partner['ID']); ?>">
								<?php responsive_thumbnail(get_post_thumbnail_id($partner['ID']), footer_name(), footer_class()); ?>
							</a>
						</div>
						<?php endforeach; ?>
					</div>
				</div>
			</section>
			<div class="w-hidden-small w-hidden-tiny credits">
				<div class="w-container">
					<div class="w-row">
						<div class="w-col w-col-8 w-col-small-6">
							<p class="credits-datas">Site non officiel réalisé par les étudiants de l’EPSI.&nbsp;Tous droits réservés</p>
						</div>
						<div class="w-col w-col-4 w-col-small-6 w-hidden-tiny">
							<div class="w-row">
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"></div>
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"></div>
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"></div>
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2"></div>
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2">
									<a class="w-inline-block" target="_blank" href="https://www.facebook.com/polecom.arras">
										<img class="thumbnail social" src="<?php bloginfo('template_url'); ?>/images/facebook.jpg" width="10" alt="Facebook">
									</a>
								</div>
								<div class="w-col w-col-2 w-col-small-2 w-col-tiny-2">
									<a class="w-inline-block" target="_blank" href="https://twitter.com/polecom_arras">
										<img class="thumbnail social" src="<?php bloginfo('template_url'); ?>/images/twitter.jpg" width="24" alt="Twitter">
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php wp_footer(); ?>
		<script src="<?php bloginfo('template_url'); ?>/publics/js/app.js"></script>
		<?php if(is_page_template('templates/photos.php')) : ?>
		<script src="<?php bloginfo('template_url'); ?>/publics/js/settings.js"></script>
		<?php endif; ?>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-53148768-1', 'auto');
		ga('send', 'pageview');

		</script>
	<body>
</html>