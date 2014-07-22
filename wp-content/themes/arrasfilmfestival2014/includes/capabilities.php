<?php
// Contributors roles
function add_contributor_caps()
{
	$role = get_role('contributor');

	$new_caps = array(
		'delete_brief',
		'delete_post',
		'edit_brief',
		'edit_briefs',
		'edit_post',
		'edit_posts',
		'edit_published_briefs',
		'edit_published_posts',
		'publish_briefs',
		'read',
		'read_brief',
		'read_post',
		'upload_files',
	);

	foreach($new_caps as $cap) {
		$role->add_cap($cap);
	}

	$old_caps = array(
		'activate_plugins',
		'delete_briefs',
		'delete_others_briefs',
		'delete_others_pages',
		'delete_others_partners',
		'delete_others_posts',
		'delete_pages',
		'delete_partner',
		'delete_partners',
		'delete_plugins',
		'delete_posts',
		'delete_private_briefs',
		'delete_private_pages',
		'delete_private_partners',
		'delete_private_posts',
		'delete_published_briefs',
		'delete_published_pages',
		'delete_published_partners',
		'delete_published_posts',
		'edit_dashboard',
		'edit_files',
		'edit_other_pages',
		'edit_others_briefs',
		'edit_others_partners',
		'edit_others_posts',
		'edit_pages',
		'edit_partner',
		'edit_partners',
		'edit_private_briefs',
		'edit_private_pages',
		'edit_private_partners',
		'edit_private_posts',
		'edit_published_pages',
		'edit_published_partners',
		'edit_theme_options',
		'export',
		'import',
		'list_users',
		'manage_categories',
		'manage_links',
		'manage_options',
		'moderate_comments',
		'promote_users',
		'publish_pages',
		'publish_partners',
		'publish_posts',
		'read_partner',
		'read_private_briefs',
		'read_private_pages',
		'read_private_partners',
		'read_private_posts',
		'remove_users',
		'switch_themes',
	);

	foreach($old_caps as $cap) {
		$role->remove_cap($cap);
	}
}

add_action('init', 'add_contributor_caps');

// Editeurs roles
function add_editor_caps()
{
	$role = get_role('editor');

	$new_caps = array(
		'delete_brief',
		'delete_post',
		'delete_published_briefs',
		'delete_published_posts',
		'edit_brief',
		'edit_briefs',
		'edit_others_briefs',
		'edit_others_posts',
		'edit_post',
		'edit_posts',
		'edit_published_briefs',
		'edit_published_posts',
		'manage_categories',
		'publish_briefs',
		'publish_posts',
		'read',
		'read_brief',
		'read_post',
		'upload_files',
	);

	foreach($new_caps as $cap) {
		$role->add_cap($cap);
	}

	$old_caps = array(
		'activate_plugins',
		'delete_briefs',
		'delete_others_briefs',
		'delete_others_pages',
		'delete_others_partners',
		'delete_others_posts',
		'delete_pages',
		'delete_partner',
		'delete_partners',
		'delete_plugins',
		'delete_posts',
		'delete_private_briefs',
		'delete_private_pages',
		'delete_private_partners',
		'delete_private_posts',
		'delete_published_pages',
		'delete_published_partners',
		'edit_dashboard',
		'edit_files',
		'edit_other_pages',
		'edit_others_partners',
		'edit_pages',
		'edit_partner',
		'edit_partners',
		'edit_private_briefs',
		'edit_private_pages',
		'edit_private_partners',
		'edit_private_posts',
		'edit_published_pages',
		'edit_published_partners',
		'edit_theme_options',
		'export',
		'import',
		'list_users',
		'manage_links',
		'manage_options',
		'moderate_comments',
		'promote_users',
		'publish_pages',
		'publish_partners',
		'read_partner',
		'read_private_briefs',
		'read_private_pages',
		'read_private_partners',
		'read_private_posts',
		'remove_users',
		'switch_themes',
	);

	foreach($old_caps as $cap) {
		$role->remove_cap($cap);
	}
}

add_action('init', 'add_editor_caps');

// Administrators roles
function add_administrator_caps()
{
	$role = get_role('administrator');

	$new_caps = array(
		'activate_plugins',
		'delete_brief',
		'delete_briefs',
		'delete_others_briefs',
		'delete_others_pages',
		'delete_others_partners',
		'delete_others_posts',
		'delete_pages',
		'delete_partner',
		'delete_partners',
		'delete_plugins',
		'delete_post',
		'delete_posts',
		'delete_private_briefs',
		'delete_private_pages',
		'delete_private_partners',
		'delete_private_posts',
		'delete_published_briefs',
		'delete_published_pages',
		'delete_published_partners',
		'delete_published_posts',
		'edit_brief',
		'edit_briefs',
		'edit_dashboard',
		'edit_files',
		'edit_other_pages',
		'edit_others_briefs',
		'edit_others_partners',
		'edit_others_posts',
		'edit_pages',
		'edit_partner',
		'edit_partners',
		'edit_post',
		'edit_posts',
		'edit_private_briefs',
		'edit_private_pages',
		'edit_private_partners',
		'edit_private_posts',
		'edit_published_briefs',
		'edit_published_pages',
		'edit_published_partners',
		'edit_published_posts',
		'edit_theme_options',
		'export',
		'import',
		'list_users',
		'manage_categories',
		'manage_links',
		'manage_options',
		'moderate_comments',
		'promote_users',
		'publish_briefs',
		'publish_pages',
		'publish_partners',
		'publish_posts',
		'read',
		'read_brief',
		'read_partner',
		'read_post',
		'read_private_briefs',
		'read_private_pages',
		'read_private_partners',
		'read_private_posts',
		'remove_users',
		'switch_themes',
		'upload_files',
	);

	foreach($new_caps as $cap) {
		$role->add_cap($cap);
	}
}

add_action('init', 'add_administrator_caps');
?>