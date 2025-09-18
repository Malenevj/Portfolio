<?php

/** add_action sætter i værk således at parent theme's stylesheet indlæses, når WordPress loader styles */
add_action( 'wp_enqueue_scripts', 'my_child_theme_enqueue_styles' );

/** Her er en funktion som linker til et stylesheet */
function my_child_theme_enqueue_styles() {

	/** Definerer to variable */
	$parent_handle = 'parent-style';
	$theme = wp_get_theme();

	/** Her linker jeg til mit style.css dokument som er placeret inde i mit modertema Astra */
	wp_enqueue_style( 
		'parent-style', 
		get_parent_theme_file_uri( 'style.css' )
	);

	/** Her linker jeg til mit style.css dokument som er placeret inde i child-temaet Astra */
	wp_enqueue_style(
		'astra-child-style', 
		get_stylesheet_uri(), array($parent_handle), $theme->get('Version')
	);
}