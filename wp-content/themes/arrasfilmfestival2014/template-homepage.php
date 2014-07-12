<?php
/*
Template Name: Homepage
*/

/* Query Parameters */

// Last Briefs
$brief_query = array(
	'numberposts' => 10,
	'orderby' => 'post_date',
	'order' => 'DESC',
	'post_type' => 'brief',
	'post_status' => 'publish',
	'suppress_filters' => true 
);

/* Helpers functions */
function isToday($post_date) {
	if($post_date < date('Y-m-d')) {
		return null;
	}

	return 'important';
}

/* Wordpress functions */
$recent_briefs = wp_get_recent_posts( $brief_query, ARRAY_A );

get_header(); 
?>

<h2>En direct</h2>
<h2>Minute par Minute</h2>
<?php foreach($recent_briefs as $brief): ?>
	<div class="flash <?php echo isToday($brief['post_date']); ?>"><?php echo $brief['post_title']; ?></div>
<?php endforeach; ?>
<h2>A ne pas manquer</h2>
<h2>Dernières parutions</h2>
<h2>Le festival en image</h2>