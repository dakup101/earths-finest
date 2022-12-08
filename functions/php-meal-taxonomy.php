<?php
// Register Custom Taxonomy
function meal_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Meals', 'Taxonomy General Name', 'ef-theme' ),
		'singular_name'              => _x( 'Meal', 'Taxonomy Singular Name', 'ef-theme' ),
		'menu_name'                  => __( 'Meals', 'ef-theme' ),
		'all_items'                  => __( 'All Meals', 'ef-theme' ),
		'parent_item'                => __( 'Parent Meal', 'ef-theme' ),
		'parent_item_colon'          => __( 'Parent Meal:', 'ef-theme' ),
		'new_item_name'              => __( 'New Meal Name', 'ef-theme' ),
		'add_new_item'               => __( 'Add New Meal', 'ef-theme' ),
		'edit_item'                  => __( 'Edit Meal', 'ef-theme' ),
		'update_item'                => __( 'Update Meal', 'ef-theme' ),
		'view_item'                  => __( 'View Meal', 'ef-theme' ),
		'separate_items_with_commas' => __( 'Separate meals with commas', 'ef-theme' ),
		'add_or_remove_items'        => __( 'Add or remove meals', 'ef-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ef-theme' ),
		'popular_items'              => __( 'Popular Meals', 'ef-theme' ),
		'search_items'               => __( 'Search Items', 'ef-theme' ),
		'not_found'                  => __( 'Not Found', 'ef-theme' ),
		'no_terms'                   => __( 'No items', 'ef-theme' ),
		'items_list'                 => __( 'Items list', 'ef-theme' ),
		'items_list_navigation'      => __( 'Items list navigation', 'ef-theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'rewrite'                    => false,
	);
	register_taxonomy( 'meal', array( 'recipe' ), $args );

}
add_action( 'init', 'meal_taxonomy', 0 );