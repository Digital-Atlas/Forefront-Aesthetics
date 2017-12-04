<?php

//add_filter( 'template_include', 'sk_template_redirect' );
function sk_template_redirect( $template ) {
	if ( is_category() || is_tag() || is_date() )
		$template = get_query_template( 'home' );
	return $template;
}


