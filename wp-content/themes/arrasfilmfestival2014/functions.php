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

// Get just the avatar URL
function get_avatar_url($get_avatar)
{
    preg_match("/src='(.*?)'/i", $get_avatar, $matches);
    return $matches[1];
}

/* Delete useless part */
function remove_menus()
{
  	remove_menu_page( 'edit-comments.php' );
}
add_action( 'admin_menu', 'remove_menus' );

// Overide Walker Nav for add our class to a tag 
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

// Overide Walker Nav for add our class to a tag 
class Custom_Walker_Category extends Walker_Category {
	function start_el( &$output, $category, $depth = 0, $args = array(), $id = 0 ) {
		extract($args);

		$cat_name = esc_attr( $category->name );

		$cat_name = apply_filters( 'list_cats', $cat_name, $category );

		$link = '<a class="sidebar-link" href="' . esc_url( get_term_link($category) ) . '" ';
		if ( $use_desc_for_title == 0 || empty($category->description) ) {
			$link .= 'title="' . esc_attr( sprintf(__( 'View all posts filed under %s' ), $cat_name) ) . '"';
		} else {
			$link .= 'title="' . esc_attr( strip_tags( apply_filters( 'category_description', $category->description, $category ) ) ) . '"';
		}

		$link .= '>';
		$link .= $cat_name . '</a>';

		if ( !empty($feed_image) || !empty($feed) ) {
			$link .= ' ';

			if ( empty($feed_image) )
				$link .= '(';

			$link .= '<a href="' . esc_url( get_term_feed_link( $category->term_id, $category->taxonomy, $feed_type ) ) . '"';

			if ( empty($feed) ) {
				$alt = ' alt="' . sprintf(__( 'Feed for all posts filed under %s' ), $cat_name ) . '"';
			} else {
				$title = ' title="' . $feed . '"';
				$alt = ' alt="' . $feed . '"';
				$name = $feed;
				$link .= $title;
			}

			$link .= '>';

			if ( empty($feed_image) )
				$link .= $name;
			else
				$link .= "<img src='$feed_image'$alt$title" . ' />';

			$link .= '</a>';

			if ( empty($feed_image) )
				$link .= ')';
		}

		if ( !empty($show_count) )
			$link .= ' (' . number_format_i18n( $category->count ) . ')';

		if ( 'list' == $args['style'] ) {
			$output .= "\t<li";
			$class = 'sidebar-list-item cat-item cat-item-' . $category->term_id;
			if ( !empty($current_category) ) {
				$_current_category = get_term( $current_category, $category->taxonomy );
				if ( $category->term_id == $current_category )
					$class .=  ' current-cat';
				elseif ( $category->term_id == $_current_category->parent )
					$class .=  ' current-cat-parent';
			}
			$output .=  ' class="' . $class . '"';
			$output .= ">$link\n";
		} else {
			$output .= "\t$link<br />\n";
		}
	}
}