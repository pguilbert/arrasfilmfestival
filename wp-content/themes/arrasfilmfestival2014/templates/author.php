<?php
/*
Template Name: Author
*/

$author_list = author_query();
$i = 1;

get_header();
?>
<div class="section menu-padding">
	<div class="w-container">
		<h1 class="responsive-margin-left">L’équipe</h1>
		<?php foreach ($author_list->results as $author) : ?>
		<?php if($i == 1) : ?>
		<div class="w-row author-line">
		<?php endif; ?>
			<div class="w-col w-col-3 w-col-small-3">
				<?php display_author_avatar($author->user_email, author_size(), author_class()); ?>
				<a class="w-inline-block us-author-link w--current" href="<?php echo esc_url(get_author_posts_url($author->ID)); ?>">
					<p class="us-author-name"><?php echo $author->display_name; ?></p>
				</a>
			</div>
		<?php if($i == 4) : ?>
		</div>
		<?php $i = 0; ?>
		<?php endif; ?>
		<?php $i++; ?>
		<?php endforeach; ?>
		<?php if($i <= 4) : ?>
			<?php while($i < 5) : ?>
				<div class="w-col w-col-3 w-col-small-3">
				</div>
				<?php $i++; ?>
			<?php endwhile; ?>
	</div>
	<?php endif; ?>
</div>
<?php get_footer(); ?>