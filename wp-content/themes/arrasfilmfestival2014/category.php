<?php
get_header(); 
?>

<h1>Articles publiés dans : <?php single_cat_title( '', true ); ?></h1>

<?php if(have_posts()): while(have_posts()) : the_post(); ?>
	<a href="<?php the_permalink(); ?>">
		<?php responsive_thumbnail(get_the_ID(), footer_name(), footer_class()); ?>
	</a>

	<a href="<?php the_permalink(); ?>">
		<h3><?php the_title();?></h3>
	</a>
	
	<p><?php echo get_field('hat', get_the_ID()); ?></p>
	<p>Publié par <?php the_author(); ?> dans <?php the_category(', '); ?> <?php the_time('j F'); ?></p>
<?php endwhile; endif; ?>

<?php  var_dump(paginate_links(pagination_settings())); ?>

<?php 
get_sidebar();
get_footer(); 
?>