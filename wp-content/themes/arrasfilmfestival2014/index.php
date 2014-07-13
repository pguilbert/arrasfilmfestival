<?php
/* Query Parameters */

global $wp_query;
// Pagination settings
$pagination_settings = array(
	'base'		=> str_replace(999999999999, '%#%', esc_url(get_pagenum_link(999999999999))),
	'format'    => '?paged=%#%',
	'total'     => $wp_query->max_num_pages,
	'current'   => max(1, get_query_var('paged')),
	'end_size'  => 2,
	'mid_size'  => 2,
	'prev_next' => false,
	'type'      => 'array',
	'add_args'  => false
);

get_header(); 
?>

<h1>Dernières publications</h1>

<?php if(have_posts()): while(have_posts()) : the_post(); ?>
	<a href="<?php the_permalink(); ?>">
	<?php the_post_thumbnail(); ?>
	</a>
	<a href="<?php the_permalink(); ?>">
		<h3><?php the_title();?></h3>
	</a>
	<p><?php echo get_field('hat', get_the_ID()); ?></p>
	<p>Publié par <?php the_author(); ?> dans <?php the_category(', '); ?> <?php the_time('j F'); ?></p>
<?php endwhile; endif; ?>

<?php  var_dump(paginate_links($pagination_settings)); ?>

<?php 
get_sidebar();
get_footer(); 
?>