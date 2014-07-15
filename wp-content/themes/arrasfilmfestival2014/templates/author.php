<?php
/*
Template Name: Author
*/

$author_list = get_users(author_query());

get_header();
?>

<?php foreach ($author_list as $author) : ?>
	<?php display_author_avatar($author->user_email, author_size(), author_class()); ?>
	<a href="<?php echo esc_url(get_author_posts_url($author->ID)); ?>" rel="author">
        <?php echo $author->display_name; ?>
    </a> 
<?php endforeach; ?>

<?php get_footer(); ?>