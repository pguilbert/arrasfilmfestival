<?php 
/* Theme settings */
setlocale(LC_ALL, 'fr_FR');
add_theme_support('post-thumbnails');
add_theme_support('menus');

/* Custom Post Type */
function custom_post_type()
{
	register_post_type('brief', array(
		'labels' 			=> array(
				'name' 					=> 'Brèves',
				'singular_name' 		=> 'Brève',
				'add_new'				=> 'Publier',
				'add_new_item'			=> 'Ajouter une nouvelle brève',
				'edit_item'				=> 'Modifier une brève',
				'new_item'				=> 'Nouvelle brève',
				'search_items'			=> 'Rechercher une brève',
				'not_found'				=> 'Aucune brève trouvé',
				'not_found_in_trash'	=> 'Aucune brève trouvé dans la corbeille',
		),
		'menu_icon'			=> 'dashicons-format-quote',
		'public'			=> true,
		'show_ui'			=> true,
		'capability_type'	=> array('brief', 'briefs'),
		'capabilities'		=> array(
				'edit_post'             	=> 'edit_brief',
	        	'read_post'					=> 'read_brief',
	            'delete_post' 				=> 'delete_brief',

	            'create_posts'				=> 'create_briefs',

	            'edit_posts' 				=> 'edit_briefs',
	            'edit_others_posts'  		=> 'manage_briefs',
	            'publish_posts' 			=> 'manage_briefs',
	            'read_private_posts'		=> 'read',

	            'read'						=> 'read',
	            'delete_posts'				=> 'manage_briefs',
	            'delete_private_posts'		=> 'manage_briefs',
	            'delete_published_posts'	=> 'manage_briefs',
	            'delete_others_posts'		=> 'manage_briefs',
	            'edit_private_posts'		=> 'edit_briefs',
	            'edit_published_posts'		=> 'edit_briefs',
		),
		'hierarchical'		=> false,
		'supports'			=> array('title'),
		'menu_position'		=> 5,
		'map_meta_cap'		=> true,
	));

	register_post_type('partner', array(
		'labels' 			=> array(
				'name' 					=> 'Partenaires',
				'singular_name' 		=> 'Partenaire',
				'add_new'				=> 'Publier',
				'add_new_item'			=> 'Ajouter un nouveau partenaire',
				'edit_item'				=> 'Modifier un partenaire',
				'new_item'				=> 'Nouveau partenaire',
				'search_items'			=> 'Rechercher un partenaire',
				'not_found'				=> 'Aucun partenaire trouvé',
				'not_found_in_trash'	=> 'Aucun partenaire trouvé dans la corbeille',
		),
		'menu_icon'			=> 'dashicons-nametag',
		'public'			=> true,
		'show_ui'			=> true,
		'capability_type'	=> array('partner', 'partners'),
		'capabilities'		=> array(
				'edit_post'             	=> 'edit_partner',
	        	'read_post'					=> 'read_partner',
	            'delete_post' 				=> 'delete_partner',

	            'create_posts'				=> 'create_partners',

	            'edit_posts' 				=> 'edit_partners',
	            'edit_others_posts'  		=> 'manage_partners',
	            'publish_posts' 			=> 'manage_partners',
	            'read_private_posts'		=> 'read',

	            'read'						=> 'read',
	            'delete_posts'				=> 'manage_partners',
	            'delete_private_posts'		=> 'manage_partners',
	            'delete_published_posts'	=> 'manage_partners',
	            'delete_others_posts'		=> 'manage_partners',
	            'edit_private_posts'		=> 'edit_partners',
	            'edit_published_posts'		=> 'edit_partners',
		),
		'hierarchical'		=> false,
		'supports'			=> array('title', 'thumbnail'),
		'menu_position'		=> 15,
		'map_meta_cap'		=> true,
	));
}

add_action('init', 'custom_post_type');

/* Delete useless part */
function remove_menus()
{
  	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

class Custom_Walker_Nav_Menu extends Walker_Nav_Menu {
	function start_el ( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$atts = array();
		$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
		$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
		$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
		$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

		$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );

		$attributes = '';
		foreach ( $atts as $attr => $value ) {
			if ( ! empty( $value ) ) {
				$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
				$attributes .= ' ' . $attr . '="' . $value . '"';
			}
		}

		$item_output = $args->before;
		$item_output .= '<a '. $class_names .' '. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}