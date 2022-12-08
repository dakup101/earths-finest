<?php
// Register Custom Taxonomy
function ingridient_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Ingridients', 'Taxonomy General Name', 'ef-theme' ),
		'singular_name'              => _x( 'Ingridient', 'Taxonomy Singular Name', 'ef-theme' ),
		'menu_name'                  => __( 'Ingridients', 'ef-theme' ),
		'all_items'                  => __( 'All Ingridients', 'ef-theme' ),
		'parent_item'                => __( 'Parent Ingridient', 'ef-theme' ),
		'parent_item_colon'          => __( 'Parent Ingridient:', 'ef-theme' ),
		'new_item_name'              => __( 'New Ingridient Name', 'ef-theme' ),
		'add_new_item'               => __( 'Add New Ingridient', 'ef-theme' ),
		'edit_item'                  => __( 'Edit Ingridient', 'ef-theme' ),
		'update_item'                => __( 'Update Ingridient', 'ef-theme' ),
		'view_item'                  => __( 'View Ingridient', 'ef-theme' ),
		'separate_items_with_commas' => __( 'Separate ingridients with commas', 'ef-theme' ),
		'add_or_remove_items'        => __( 'Add or remove ingridients', 'ef-theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'ef-theme' ),
		'popular_items'              => __( 'Popular Ingridients', 'ef-theme' ),
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
	register_taxonomy( 'ingridient', array( 'recipe' ), $args );

}
add_action( 'init', 'ingridient_taxonomy', 0 );