<?php

add_action( 'init', 'register_cpt_service', 0 );

// Register Custom Post Type
function register_cpt_service() {

    $labels = array(
        'name'                  => _x( 'Services', 'service' ),
        'singular_name'         => _x( 'Service', 'service' ),
        'add_new'               => _x( 'Add New', 'service' ),
        'add_new_item'          => _x( 'Add New Service', 'service' ),
        'edit_item'             => _x( 'Edit Service', 'service' ),
        'new_item'              => _x( 'New Service', 'service' ),
        'view_item'             => _x( 'View Service', 'service' ),
        'search_items'          => _x( 'Search Services', 'service' ),
        'not_found'             => _x( 'No services found', 'service' ),
        'not_found_in_trash'    => _x( 'No services found in Trash', 'service' ),
        'parent_item_colon'     => _x( 'Parent Service:', 'service' ),
        'menu_name'             => _x( 'Services', 'service' ),
    );
    $args = array(
        'label'                 => __( 'Service', 'text_domain' ),
        'description'           => __( 'Conditions & Treatments', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor'),
        'taxonomies'            => array(),
        'hierarchical'          => false,
        'public'                => true,
		'rewrite' 				=> array('slug'=> 'services' ), 
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-heart',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,        
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'service', $args );

}