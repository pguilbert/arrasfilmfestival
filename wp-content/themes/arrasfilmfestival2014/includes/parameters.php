<?php
// Principal menu settings
function menu_settings()
{
	return array(
		'menu'			=> 'principal',
		'container'		=> false,
		'echo'			=> false,
		'walker' 		=> new Custom_Walker_Nav_Menu()
	);
}

// Pagination settings
function pagination_settings() 
{ 
	global $wp_query;

	return array(
		'base'		=> str_replace(999, '%#%', esc_url(get_pagenum_link(999))),
		'format'    => '?paged=%#%',
		'total'     => $wp_query->max_num_pages,
		'current'   => max(1, get_query_var('paged')),
		'end_size'  => 1,
		'mid_size'  => 1,
		'prev_next' => false,
		'type'      => 'array',
		'add_args'  => false
	);
}

function categories_settings()  
{
	return array(
		'title_li'		=> '',
		'walker'		=> new Custom_Walker_Category(),
		'hide_empty'	=> 1
	);
}

// Last 10 briefs by DESC
function brief_query()
{
	return array(
		'numberposts' 	=> 8,
		'order' 		=> 'DESC',
		'orderby' 		=> 'post_date',
		'post_status' 	=> 'publish',
		'post_type' 	=> 'brief',
	);
}

// Random 3 articles
function post_sticky_random_query() {
	return array(
		'numberposts' 	=> 3,
		'orderby' 		=> 'rand',
		'post_status' 	=> 'publish',
		'post_type' 	=> 'post',
		'post__in'      =>  get_option( 'sticky_posts' ),
	);
}

// Last 5 articles by DESC
function post_recent_query()
{
	return array(
		'numberposts' 	=> 5,
		'order' 		=> 'DESC',
		'orderby' 		=> 'post_date',
		'post_status' 	=> 'publish',
		'post_type' 	=> 'post',
	);
}

// Random 5 photos
function picture_random_query()
{
	return array(
	    'post_type' 		=> 'attachment',
	    'post_mime_type' 	=> 'image',
	    'post_status' 		=> 'inherit',
	    'posts_per_page' 	=> 5,
	    'orderby' 			=> 'rand'
	);
}

// Random 6 partners
function partner_query() 
{
	return array(
		'numberposts' 	=> 6,
		'orderby' 		=> 'rand',
		'post_type' 	=> 'partner',
		'post_status' 	=> 'publish'
	);
}

// Author order by post count
function author_query()
{
	return new WP_User_Query(array('orderby' => 'post_count', 'order' => 'DESC'));
} 

// Recent pictures
function picture_recent_query()
{
	return array(
	    'post_type' 		=> 'attachment',
	    'post_mime_type' 	=> 'image',
	    'post_status' 		=> 'inherit',
	    'posts_per_page' 	=> 100,
	    'orderby' 			=> 'date',
	    'order'				=> 'DESC'
	);
}
?>