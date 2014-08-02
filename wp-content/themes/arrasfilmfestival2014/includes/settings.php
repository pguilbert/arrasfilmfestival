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

function remove_admin_bar_links() 
{
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');          
    $wp_admin_bar->remove_menu('about');            
    $wp_admin_bar->remove_menu('wporg');            
    $wp_admin_bar->remove_menu('documentation');    
    $wp_admin_bar->remove_menu('support-forums');   
    $wp_admin_bar->remove_menu('feedback');         
    $wp_admin_bar->remove_menu('view-site');        
    $wp_admin_bar->remove_menu('updates');          
    $wp_admin_bar->remove_menu('comments');         
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_links');

function remove_screen_options_tab() 
{
    return false;
}
add_filter('screen_options_show_screen', 'remove_screen_options_tab');

function hide_help() 
{
    echo 
    '<style type="text/css">
        #contextual-help-link-wrap { display: none !important; }
    </style>';
}
add_action('admin_head', 'hide_help');

function remove_dashboard_meta() 
{
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
        remove_meta_box('dashboard_primary', 'dashboard', 'normal');
        remove_meta_box('dashboard_secondary', 'dashboard', 'normal');
        remove_meta_box('dashboard_incoming_links', 'dashboard', 'normal');
        remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
        remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal');
}
add_action('admin_init', 'remove_dashboard_meta');

function remove_post_capability() 
{
	remove_post_type_support('post', 'comments');
	remove_post_type_support('post', 'keywords');
}
add_action('init', 'remove_post_capability');

if(strstr($_SERVER['REQUEST_URI'], 'wp-admin/post.php')) {
	ob_start('one_category_only');
}

function one_category_only($content) 
{
	$content = str_replace('type="checkbox" name="post_category', 'type="radio" name="post_category', $content);
	return $content;
}

function my_hide_permalinks($in){
    global $post;
    $out = '';
    if($post->post_type == 'brief')
        $out = preg_replace('~<div id="edit-slug-box".*</div>~Ui', '', $in);
    return $out;
}
add_filter('get_sample_permalink_html', 'my_hide_permalinks');

function remove_mime_type( $existing_mimes ) {
    unset($existing_mimes['tif|tiff']);

    return $existing_mimes;
}
add_filter( 'mime_types', 'remove_mime_type' );

function hide_yoastseo() {
if (!current_user_can('administrator')) :
    remove_action('admin_bar_menu', 'wpseo_admin_bar_menu',95);
    remove_menu_page('wpseo_dashboard');
endif;
}
add_action('admin_init', 'hide_yoastseo');
?>