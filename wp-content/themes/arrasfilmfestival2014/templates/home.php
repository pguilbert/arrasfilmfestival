<?php
/*
Template Name: Home
*/

get_header(); 

// Queries, see inc/parameters for more infos
$recent_briefs 		= wp_get_recent_posts(brief_query(), ARRAY_A);
$random_posts 		= wp_get_recent_posts(post_random_query(), ARRAY_A);
$recent_posts 		= wp_get_recent_posts(post_recent_query(), ARRAY_A);
$random_pictures 	= new WP_Query(picture_random_query());
?>

<h2>En direct</h2>

<h2>Minute par Minute</h2>

<?php foreach($recent_briefs as $brief): ?>
	<div class="flash <?php echo is_today_class($brief['post_date']); ?>"><?php echo $brief['post_title']; ?></div>
<?php endforeach; ?>

<h2>A ne pas manquer</h2>

<?php foreach($random_posts as $post): ?>
	<?php responsive_thumbnail($post['ID'], dont_miss_name(), dont_miss_class()); ?>
	<h3><?php echo $post['post_title']; ?></h3>

	<p>
		<?php echo get_the_author_meta('display_name', $post['post_author']); ?>
		<?php echo nice_date($post['post_date']); ?>
	</p>

	<p><?php echo get_field('hat', $post['ID']); ?></p>
<?php endforeach; ?>

<h2>Dernières parutions</h2>

<?php foreach($recent_posts as $post): ?>
	<?php $category = get_the_category($post['ID']); ?>

	<?php responsive_thumbnail($post['ID'], dont_miss_name(), dont_miss_class()); ?>

	<h3><?php echo $post['post_title']; ?></h3>

	<p>
		Publié par <?php echo get_the_author_meta('display_name', $post['post_author']); ?>
		dans <?php echo $category[0]->name; ?>
		<?php echo nice_date($post['post_date']); ?>
	</p>

	<p><?php echo get_field('hat', $post['ID']); ?></p>
<?php endforeach; ?>

<h2>Le festival en image</h2>

<?php foreach($random_pictures->posts as $picture): ?>

	<?php responsive_thumbnail($picture->guid, dont_miss_name(), dont_miss_class()); ?>

<?php endforeach; ?>

<?php get_footer(); ?>