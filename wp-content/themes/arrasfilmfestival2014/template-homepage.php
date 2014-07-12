<?php
/*
Template Name: Homepage
*/

/* Query Parameters */

// Recent briefs
$brief_query = array(
	'numberposts' 	=> 10,
	'orderby' 		=> 'post_date',
	'order' 		=> 'DESC',
	'post_type' 	=> 'brief',
	'post_status' 	=> 'publish'
);

// Random articles
$post_random_query = array(
	'numberposts' 	=> 3,
	'orderby' 		=> 'rand',
	'post_type' 	=> 'post',
	'post_status' 	=> 'publish'
);

// Recent articles
$post_recent_query = array(
	'numberposts' 	=> 5,
	'orderby' 		=> 'post_date',
	'order' 		=> 'DESC',
	'post_type' 	=> 'post',
	'post_status' 	=> 'publish'
);

// Random pictures
$picture_random_query = array(
        'post_type' 		=> 'attachment',
        'post_mime_type' 	=> 'image',
        'post_status' 		=> 'inherit',
        'posts_per_page' 	=> 5,
        'orderby' 			=> 'rand'
);

/* Helpers functions */
function isToday($post_date) 
{
	if($post_date < date('Y-m-d')) {
		return null;
	}

	return 'important';
}

function niceDate($date) 
{
	return strftime('%d %B %Y');
}

/* Wordpress functions */
$recent_briefs 		= wp_get_recent_posts($brief_query, ARRAY_A);
$random_posts 		= wp_get_recent_posts($post_random_query, ARRAY_A);
$recent_posts 		= wp_get_recent_posts($post_recent_query, ARRAY_A);
$random_pictures 	= new WP_Query($picture_random_query);

get_header(); 
?>

<h2>En direct</h2>

<h2>Minute par Minute</h2>
<?php foreach($recent_briefs as $brief): ?>
	<div class="flash <?php echo isToday($brief['post_date']); ?>"><?php echo $brief['post_title']; ?></div>
<?php endforeach; ?>

<h2>A ne pas manquer</h2>
<?php foreach($random_posts as $post): ?>
	<?php echo get_the_post_thumbnail($post['ID']); ?> 
	<h3><?php echo $post['post_title']; ?></h3>
	<p>
		<?php echo get_the_author_meta('display_name', $post['post_author']); ?>
		<?php echo niceDate($post['post_date']); ?>
	</p>
	<p><?php echo get_field('hat', $post['ID']); ?></p>
<?php endforeach; ?>

<h2>Dernières parutions</h2>
<?php foreach($recent_posts as $post): ?>
	<?php $category = get_the_category($post['ID']); ?>
	<?php echo get_the_post_thumbnail($post['ID']); ?> 
	<h3><?php echo $post['post_title']; ?></h3>
	<p>
		Publié par <?php echo get_the_author_meta('display_name', $post['post_author']); ?>
		dans <?php echo $category[0]->name; ?>
		<?php echo niceDate($post['post_date']); ?>
	</p>
	<p><?php echo get_field('hat', $post['ID']); ?></p>
<?php endforeach; ?>

<h2>Le festival en image</h2>
<?php foreach($random_pictures->posts as $picture): ?>
	<img src="<?php echo $picture->guid; ?>" />
<?php endforeach; ?>