<?php
/*
Template Name: Photos
*/

$recent_pictures 	= new WP_Query(picture_recent_query());

get_header(); 
?>

<h1>Le festival en image</h1>
<?php foreach($recent_pictures->posts as $picture): ?>
	<img src="<?php echo $picture->guid; ?>" />
<?php endforeach; ?>

<?php get_footer(); ?>