<?php
setlocale(LC_ALL, 'fr_FR');
add_theme_support('post-thumbnails');
add_theme_support('menus');

/* Delete useless part */
function remove_menus()
{
  	remove_menu_page('edit-comments.php');
}
add_action('admin_menu', 'remove_menus');
?>