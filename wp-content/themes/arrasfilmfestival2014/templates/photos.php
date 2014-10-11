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
		<?php 
		if(empty($picture->post_excerpt)) {
			$title = 'Publié par ' . get_the_author_meta('first_name', $picture->post_author). ' ' . get_the_author_meta('last_name', $picture->post_author);
		} else {
			$title = $picture->post_excerpt . ' - ' . get_the_author_meta('first_name', $picture->post_author) . ' ' . get_the_author_meta('last_name', $picture->post_author);
		}

		$random = random_size(array(376, 574)); 
		$pictureUrl = wp_get_attachment_image_src($picture->ID, '376x' . $random)[0]; 

		$size = getimagesize(str_replace('http://' . $_SERVER['HTTP_HOST'] . '/', '', $pictureUrl));
		?>
		<div class="item">
			<a title="<?php echo $title; ?>" class="w-inline-block thumbnail-link fancybox" rel="Galerie" href="<?php echo wp_get_attachment_image_src($picture->ID, '800x600')[0]; ?>">
			<?php
			if($size[1] < $random) :
				$newHeight = (178 / $size[0]) * $size[1];
	        ?>
				<img class="thumbnail" src="<?php echo $pictureUrl; ?>" width="178" height="<?php echo $newHeight; ?>">
	        <?php
	        else :
	        ?>
				<img class="thumbnail" src="<?php echo $pictureUrl; ?>" width="178" height="<?php echo $random / 2; ?>">
	        <?php
	        endif;
	        ?>
	        </a>
        </div>
	<?php endforeach; ?>
	</div>
</div>
<?php get_footer(); ?>