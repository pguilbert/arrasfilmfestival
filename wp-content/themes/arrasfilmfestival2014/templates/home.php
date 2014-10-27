<?php
/*
Template Name: Home
*/

get_header(); 

// Queries, see inc/parameters for more infos
$recent_briefs    = wp_get_recent_posts(brief_query(), ARRAY_A);
$random_sticky_posts     = wp_get_recent_posts(post_sticky_random_query(), ARRAY_A);
$recent_posts     = wp_get_recent_posts(post_recent_query(), ARRAY_A);
$random_pictures  = new WP_Query(picture_random_query());
$live_posts = new WP_Query(live_query());
?>
<div class="w-hidden-tiny section hero">
    <div class="hero-text">Du 7 Novembre 2014 jusqu'au 16 Novembre 2014 </div>
</div>
<div class="section">
  <div class="w-container">
    <div class="w-row">
        <div class="w-col w-col-7 w-col-stack">
          <?php 
            if($live_posts->have_posts()): 
              $live_posts->the_post();
          ?>
            <h2><span class="live-icon <?php echo get_field('is_live') ? 'live' : '' ?>">&bull;</span>En direct <small><?php echo get_field('additional_text'); ?></small></h2>
            <div class="responsive-video">
                  <?php echo the_content(); ?>
            </div>
          <?php endif; ?>
        </div>
        <div class="w-col w-col-5 w-col-stack">
          <h2>Minute par Minute</h2>
          
          <ul class="w-list-unstyled">
            <?php foreach($recent_briefs as $brief): ?>
            <li>
              <div class="flash <?php echo is_today_class($brief['post_date']); ?>">
                <div class="date"><?php echo relative_date($brief['post_date']) . ', '. nice_hour($brief['post_date']); ?></div> 
                <?php echo substr($brief['post_title'], 0, 140); ?>
              </div>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>
  </div>
</div>

<div class="section">
    <div class="w-container">
        <h2 class="responsive-margin-left">&Agrave; ne pas manquer ce jour</h2>
    <div class="w-row">
      <?php foreach($random_sticky_posts as $post): ?>
      <?php $permalink = get_permalink($post['ID']); ?>
          <div class="w-col w-col-4">
            <a class="w-inline-block home-thumbnail-link" href="<?php echo $permalink ?>">
              <?php responsive_thumbnail(get_post_thumbnail_id($post['ID']), dont_miss_name(), dont_miss_class()); ?>
            </a>
              <a class="w-inline-block heading-link" href="<?php echo $permalink ?>">
                <h3><?php echo $post['post_title']; ?></h3>
              </a>
              <div class="w-row">
                <div class="w-col w-col-6 w-col-small-6 w-col-tiny-6">
                    <p>
                      <a class="link" href="<?php echo esc_url(get_author_posts_url($post['post_author'])); ?>">
                        <?php echo get_the_author_meta('display_name', $post['post_author']); ?>
                      </a>
                    </p>
                </div>
                <div class="w-col w-col-6 w-col-small-6 w-col-tiny-6">
                    <p class="meta-date"><?php echo nice_date($post['post_date']); ?></p>
                </div>
              </div>
              <p><?php echo get_field('hat', $post['ID']); ?></p>
              <div class="w-hidden-main w-hidden-medium w-hidden-small responsive-separator"></div>
          </div>
      <?php endforeach; ?>
    </div>
    <div class="w-row">
      <div class="w-col w-col-8 w-col-stack">
        <h2>Dernières parutions</h2>
        <?php foreach($recent_posts as $post): ?>
        <?php $category = get_the_category($post['ID']); ?> 
        <?php $permalink = get_permalink($post['ID']); ?> 
        <div class="w-row">
          <div class="w-col w-col-6 w-col-stack">
              <a class="w-inline-block home-thumbnail-link" href="<?php echo $permalink; ?>">
                <?php responsive_thumbnail(get_post_thumbnail_id($post['ID']), home_name(), home_class()); ?>
              </a>
          </div>
          <div class="w-col w-col-6 w-col-stack">
            <a class="w-inline-block heading-link" href="<?php echo $permalink; ?>">
              <h4><?php echo $post['post_title']; ?></h4>
            </a>
              <p class="resume">
                <?php echo get_field('hat', $post['ID']); ?>
              </p>
          </div>
        </div>
        <div class="separator"></div>
        <div class="w-row meta">
          <div class="w-col w-col-6 w-col-small-6">
              <p class="meta-datas">
                Publié par 
                <a href="<?php echo esc_url(get_author_posts_url($post['post_author'])); ?>" class="link">
                  <?php echo get_the_author_meta('display_name', $post['post_author']); ?>
                </a>dans 
                <a href="<?php echo get_category_link($category[0]->cat_ID); ?>" class="link"><?php echo $category[0]->name; ?></a>
              </p>
          </div>
          <div class="w-col w-col-6 w-col-small-6">
              <p class="w-hidden-tiny meta-date"><?php echo nice_date($post['post_date']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="w-col w-col-4 w-col-stack">
            <h2>Le festival en images</h2>
            <?php foreach($random_pictures->posts as $picture): ?>
            <a class="w-inline-block home-thumbnail-link" href="/photos">
              <?php responsive_thumbnail($picture->ID, home_name(), home_class()); ?>
            </a>
            <div class="separator"></div>
              <p class="meta">
                Publiée par <a href="<?php echo esc_url(get_author_posts_url($post['post_author'])); ?>" class="link"><?php echo get_the_author_meta('display_name', $picture->post_author); ?></a>
              </p>
            <?php endforeach; ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>