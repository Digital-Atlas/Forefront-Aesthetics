<?php 
/** 
* Services Post Type Taxonomy  
**/

add_action( 'init', 'service_custom_taxonomy', 0 );

function service_custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Service Categories', 'Service Category' ),
		'singular_name'              => _x( 'Service Category', 'Service Category' ),
		'menu_name'                  => __( 'Service Categories', 'Service Category' ),
		'all_items'                  => __( 'All Items', 'Service Category' ),
		'parent_item'                => __( 'Parent Item', 'Service Category' ),
		'parent_item_colon'          => __( 'Parent Item:', 'Service Category' ),
		'new_item_name'              => __( 'New Item Name', 'Service Category' ),
		'add_new_item'               => __( 'Add New Item', 'Service Category' ),
		'edit_item'                  => __( 'Edit Item', 'Service Category' ),
		'update_item'                => __( 'Update Item', 'Service Category' ),
		'view_item'                  => __( 'View Item', 'Service Category' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'Service Category' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'Service Category' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'Service Category' ),
		'popular_items'              => __( 'Popular Items', 'Service Category' ),
		'search_items'               => __( 'Search Items', 'Service Category' ),
		'not_found'                  => __( 'Not Found', 'Service Category' ),
		'no_terms'                   => __( 'No items', 'Service Category' ),
		'items_list'                 => __( 'Items list', 'Service Category' ),
		'items_list_navigation'      => __( 'Items list navigation', 'Service Category' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
	);
	register_taxonomy( 'service_category', array( 'service' ), $args );
}
