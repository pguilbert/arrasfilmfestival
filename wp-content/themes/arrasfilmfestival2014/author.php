<?php
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

get_header();
?>
<div class="w-row">
	<div class="w-col w-col-9">
		<h1>Articles publiés par <?php echo $curauth->display_name; ?></h1>
		<?php if(have_posts()): while(have_posts()) : the_post(); ?>
		<?php $id = get_the_ID(); ?>
		<?php $category = get_the_category($id); ?>
		<div class="article">
			<a class="w-inline-block thumbnail-link" href="<?php the_permalink(); ?>">
				<?php responsive_thumbnail(get_post_thumbnail_id($id), article_name(), article_class()); ?>
			</a>
			<a class="w-inline-block heading-link" href="<?php the_permalink(); ?>">
				<h3><?php the_title();?></h3>
			</a>
			<p>
				<?php echo get_field('hat', $id); ?>
			</p>
			<div class="separator"></div>
			<div class="w-row">
				<div class="w-col w-col-6">
					<p class="meta-datas">
						Publié par 
						<a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" class="link">
							<?php the_author(); ?>
						</a>dans 
						<a href="<?php echo get_category_link($category[0]->cat_ID); ?>" class="link">
							<?php echo $category[0]->name; ?>
						</a>
					</p>
				</div>
				<div class="w-col w-col-6">
					<p class="w-hidden-small w-hidden-tiny meta-date">
						<?php the_time('j F'); ?>
					</p>
				</div>
			</div>
		</div>
		<?php endwhile; endif; ?>
		<?php $paginate_links = paginate_links(pagination_settings()); ?>
		<?php if($paginate_links != null) :?>
		<ol class="w-list-unstyled pagination-list">
			<?php foreach($paginate_links as $link) : ?>
			<li class="pagination">
				<?php echo str_replace('page-numbers', 'pagination-item', $link); ?>
			</li>
			<?php endforeach; ?>
		</ol>
		<?php endif; ?>
	</div>
<?php 
get_sidebar();
get_footer(); 
?>