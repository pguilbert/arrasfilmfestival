<?php
/*
Template Name: Author
*/
?>
<?php
$args = array(
	'order_by'	=> 'post_count',
	'order'		=> 'DESC'
);

$author_list = get_users();

get_header();
?>

<?php foreach ($author_list as $author) : ?>
	<img class="author-picture" src="<?php echo get_avatar_url(get_avatar($author->ID, 430)); ?>" />
	<a href="<?php echo esc_url(get_author_posts_url($author->ID)); ?>" rel="author">
        <?php echo $author->display_name; ?>
    </a> 
<?php endforeach; ?>

<?php get_footer(); ?>