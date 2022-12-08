<?php
// Register Custom Taxonomy
function diet_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Diets', 'Taxonomy General Name', 'ef-theme' ),
		'singular_name'              => _x( 'Diet', 'Taxonomy Singular Name', 'ef-theme' ),
		'menu_name'                  => __( 'Diets', 'ef-theme' ),
		'all_items'                  => __( 'All Diets', 'ef-theme' ),
		'parent_item'                => __( 'Parent Diet', 'ef-theme' ),
		'parent_item_colon'          => __( 'Parent Diet:', 'ef-theme' ),
		'new_item_name'              => __( 'New Diet Name', 'ef-theme' ),
		'add_new_item'               => __( 'Add New Diet', 'ef-theme' ),
		'edit_item'                  => __( 'Edit Diet', 'ef-theme' ),
		'update_item'                => __( 'Update Diet', 'ef-theme' ),
		'view_item'                  => __( 'View Diet', 'ef-theme' ),
		'separate_items_with_commas' => __( 'Separate diets with commas', 'ef-theme' ),
		'add_or_remove_items'        => __( 'Add or remove diets', 'ef-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ef-theme' ),
		'popular_items'              => __( 'Popular diets', 'ef-theme' ),
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
	register_taxonomy( 'diet', array( 'recipe' ), $args );

}
add_action( 'init', 'diet_taxonomy', 0 );