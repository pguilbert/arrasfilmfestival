<?php
$categories_settings = array(
	'title_li'		=> '',
	'walker'		=> new Custom_Walker_Category(),
	'hide_empty'	=> 1
);
?>
<h3>Catégories</h3>
<ul>
<?php wp_list_categories($categories_settings); ?>
</ul>

<h3>Qui sommes nous ?</h3>
<p> On verra après. </p>

<h3>Discutons !</h3>
<p>Liens des réseaux sociaux.</p>