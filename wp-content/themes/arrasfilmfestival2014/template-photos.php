<?php
/*
Template Name: Photos
*/

/* Query Parameters */

// Recent pictures
$picture_recent_query = array(
    'post_type' 		=> 'attachment',
    'post_mime_type' 	=> 'image',
    'post_status' 		=> 'inherit',
    'posts_per_page' 	=> 5,
    'orderby' 			=> 'date',
    'order'				=> 'DESC'
);

$recent_pictures 	= new WP_Query($picture_recent_query);

get_header(); 
?>

<h1>Le festival en image</h1>
<?php foreach($recent_pictures->posts as $picture): ?>
	<img src="<?php echo $picture->guid; ?>" />
<?php endforeach; ?>

<?php get_footer(); ?>