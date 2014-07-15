<?php
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
?>