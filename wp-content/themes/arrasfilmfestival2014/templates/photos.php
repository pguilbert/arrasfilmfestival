<?php
/*
Template Name: Photos
*/

$recent_pictures 	= new WP_Query(picture_recent_query());

get_header(); 
?>

	<h1 class="responsive-margin-left">Le festival en image</h1>
	<div id="gallery">
	<?php foreach($recent_pictures->posts as $picture): ?>
		<?php $random = random_size(array(376, 574)); ?>
		<div class="item">
			<a title="<?php echo $picture->post_excerpt; ?>" class="w-inline-block thumbnail-link fancybox" rel="Galerie" href="<?php echo wp_get_attachment_image_src($picture->ID, '800x600')[0]; ?>">
				<img class="thumbnail" src="<?php echo wp_get_attachment_image_src($picture->ID, '376x' . $random)[0]; ?>" width="178" height="<?php echo $random / 2; ?>">
			</a>
		</div>
	<?php endforeach; ?>
	</div>
</div>
<?php get_footer(); ?>