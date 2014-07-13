<?php get_header(); ?>

<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php the_post_thumbnail(); ?>
        <h1><?php the_title(); ?></h1>
        <p>Posté par le <?php the_author(); ?> dans <?php the_category(', '); ?> <?php the_time('j F'); ?></p>
        <p><?php echo get_field('hat', get_the_ID()); ?></p>
        <?php the_content(); ?>
        <h2>A propos de l'auteur</h2>
        <img class="author-picture" src="<?php echo get_avatar_url(get_avatar(get_the_author_meta('user_email'), 430)); ?>" />
        <?php the_author(); ?>
        <?php the_author_meta( 'description' ); ?>
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
            Pressbook
        </a> 
        <a href="<?php echo esc_url(get_the_author_meta('user_url')); ?>" rel="website">
            Site web
        </a> 
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('user_email'))); ?>" rel="email">
            Adresse mail
        </a> 
    <?php endwhile; ?>
<?php endif; ?>

<?php comments_template('', true); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>