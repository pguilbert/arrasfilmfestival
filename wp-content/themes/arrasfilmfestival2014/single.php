<?php get_header(); ?>
<div class="w-row">
    <div class="w-col w-col-9">
    <?php if (have_posts()) : ?><?php while (have_posts()) : the_post(); ?>
        <?php $id = get_the_ID(); ?>
        <?php $category = get_the_category($id); ?>
        <h1><?php the_title(); ?></h1>
        <div class="article">
            <div class="article-thumbnail">
                <?php responsive_thumbnail(get_post_thumbnail_id($id), single_name(), single_class()); ?>
            </div>
            <div class="w-row">
                <div class="w-col w-col-6">
                    <p class="meta-datas">
                        Publié par <a href="#" class="link"><?php the_author(); ?></a>dans 
                        <a href="<?php echo get_category_link($category[0]->cat_ID); ?>" class="link"><?php echo $category[0]->name; ?></a>
                    </p>
                </div>
                <div class="w-col w-col-6">
                    <p class="w-hidden-small w-hidden-tiny meta-date"><?php the_time('j F'); ?></p>
                </div>
            </div>
            <p class="hat"><?php echo get_field('hat', $id); ?></p>
            <?php the_content(); ?>
        </div>
        <div class="separator"></div>
        <h2>A propos de l'auteur</h2>
        <div class="w-row author-datas">
            <div class="w-col w-col-4 w-hidden-small">
                <?php display_author_avatar(get_the_author_meta('user_email'), article_author_size(), article_author_class()); ?>            
            </div>
            <div class="w-col w-col-8">
                <h3><?php the_author(); ?></h3>
                <p>
                    <?php the_author_meta( 'description' ); ?>                
                </p>
                <a class="link author-link-margin" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author">
                    Pressbook
                </a>
                <?php $website = esc_url(get_the_author_meta('user_url')); ?>
                <?php if($website) : ?>
                <a class="link author-link-margin" href="<?php echo esc_url(get_the_author_meta('user_url')); ?>" target="_blank" rel="website">
                    Site web
                </a> 
                <?php endif; ?>
                <?php echo get_the_author_meta('user_email'); ?>
            </div>
        </div>
    <?php endwhile; endif; ?>
    </div>
<?php comments_template('', true); ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>