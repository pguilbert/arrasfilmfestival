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
	<body>
</html>