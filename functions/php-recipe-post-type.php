<?php
// Register Custom Post Type
function recipe_post_type() {

	$labels = array(
		'name'                  => _x( 'Recipes', 'Post Type General Name', 'ef-theme' ),
		'singular_name'         => _x( 'Recipe', 'Post Type Singular Name', 'ef-theme' ),
		'menu_name'             => __( 'Recipes', 'ef-theme' ),
		'name_admin_bar'        => __( 'Recipes', 'ef-theme' ),
		'archives'              => __( 'Recipes Archive', 'ef-theme' ),
		'attributes'            => __( 'Recipe Attributes', 'ef-theme' ),
		'parent_item_colon'     => __( 'Parent Recipe', 'ef-theme' ),
		'all_items'             => __( 'All Recipes', 'ef-theme' ),
		'add_new_item'          => __( 'Add New Recipe', 'ef-theme' ),
		'add_new'               => __( 'Add New', 'ef-theme' ),
		'new_item'              => __( 'New Recipe', 'ef-theme' ),
		'edit_item'             => __( 'Edit Recipe', 'ef-theme' ),
		'update_item'           => __( 'Update Recipe', 'ef-theme' ),
		'view_item'             => __( 'View Recipe', 'ef-theme' ),
		'view_items'            => __( 'View Recipes', 'ef-theme' ),
		'search_items'          => __( 'Search Recipe', 'ef-theme' ),
		'not_found'             => __( 'Not found', 'ef-theme' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'ef-theme' ),
		'featured_image'        => __( 'Featured Image', 'ef-theme' ),
		'set_featured_image'    => __( 'Set featured image', 'ef-theme' ),
		'remove_featured_image' => __( 'Remove featured image', 'ef-theme' ),
		'use_featured_image'    => __( 'Use as featured image', 'ef-theme' ),
		'insert_into_item'      => __( 'Insert into Recipe', 'ef-theme' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Recipe', 'ef-theme' ),
		'items_list'            => __( 'Recipes list', 'ef-theme' ),
		'items_list_navigation' => __( 'Recipes list navigation', 'ef-theme' ),
		'filter_items_list'     => __( 'Filter Recipes list', 'ef-theme' ),
	);
	$args = array(
		'label'                 => __( 'Recipe', 'ef-theme' ),
		'description'           => __( 'EF Recipes', 'ef-theme' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'revisions', 'custom-fields', 'excerpt' ),
		'taxonomies'            => array( 'recipe_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-food',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => 'recipes',
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'recipe', $args );

}
add_action( 'init', 'recipe_post_type', 0 );