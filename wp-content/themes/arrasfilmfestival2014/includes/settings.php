<?php
setlocale(LC_ALL, 'fr_FR');
add_theme_support('post-thumbnails');
add_theme_support('menus');
show_admin_bar(false);

function seo_editor($arr){
	$arr['block_formats'] = 'Heading 3=h3;Paragraph=p';
	return $arr;
  }
add_filter('tiny_mce_before_init', 'seo_editor');

/* Delete useless part */
function remove_menus()
{
  	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_menus');
?>