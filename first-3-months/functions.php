<?php

// enqueue scripts.js
function f3m_adding_scripts() {
wp_enqueue_script('scripts', get_template_directory_uri() .'/scripts.js', array('jquery'), null, true);
wp_enqueue_script('scripts');
}
 
add_action( 'wp_enqueue_scripts', 'f3m_adding_scripts' );  


// register menus
register_nav_menus( array( 
	'primary' => 'Primary menu', 
	'footer' => 'Footer menu' 
) );

// read more after excerpt
function wpdocs_excerpt_more( $more ) {
    return '<a href="'.get_the_permalink().'" rel="nofollow" class="readmore-link link--pink-hover"> Read More...</a>';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

?>