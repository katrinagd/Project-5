<?php
/**
 * POST TYPES
 *
 * @link  http://codex.wordpress.org/Function_Reference/register_post_type
 */

// Add your custom post types here...
// Register Custom Post Type
function leredbread_products_post_type() {

	$labels = array(
		'name'                => _x( 'Products', 'Post Type General Name' ),
		'singular_name'       => _x( 'Product', 'Post Type Singular Name'),
		'menu_name'           => __( 'Product' ),
		'name_admin_bar'      => __( 'Post Type' ),
		'parent_item_colon'   => __( 'Parent Product:' ),
		'all_items'           => __( 'All Products'),
		'add_new_item'        => __( 'Add New Product' ),
		'add_new'             => __( 'New Product' ),
		'new_item'            => __( 'New Item' ),
		'edit_item'           => __( 'Edit Product' ),
		'update_item'         => __( 'Update Product' ),
		'view_item'           => __( 'View Product' ),
		'search_items'        => __( 'Search products' ),
		'not_found'           => __( 'No products found' ),
		'not_found_in_trash'  => __( 'No products found in Trash' ),
	);
	$args = array(
		'description'         => 'Products are delicious items that Le Red Bread sells',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-cart',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'products',		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
			);
	register_post_type( 'product', $args );

}
add_action( 'init', 'leredbread_products_post_type', 0 );


// Add your custom post types here...
// Register Custom Post Type
function leredbread_testimonials_post_type() {

	$labels = array(
		'name'                => _x( 'Testimonials', 'Post Type General Name' ),
		'singular_name'       => _x( 'Testimonial', 'Post Type Singular Name' ),
		'menu_name'           => __( 'Testimonial' ),
		'name_admin_bar'      => __( 'Post Type' ),
		'parent_item_colon'   => __( 'Parent Testimonial:' ),
		'all_items'           => __( 'All Testimonials' ),
		'add_new_item'        => __( 'Add New Testimonial' ),
		'add_new'             => __( 'New Testimonial' ),
		'new_item'            => __( 'New Item' ),
		'edit_item'           => __( 'Edit Testimonial' ),
		'update_item'         => __( 'Update Testimonial' ),
		'view_item'           => __( 'View Testimonial' ),
		'search_items'        => __( 'Search testimonials' ),
		'not_found'           => __( 'No testimonials found' ),
		'not_found_in_trash'  => __( 'No testimonials found in Trash' ),
	);
	$args = array(
		'description'         => 'Testimonials from our customers',
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'author', 'thumbnail', 'revisions', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 8,
		'menu_icon'           => 'dashicons-heart',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => 'testimonials',		
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
	);
	register_post_type( 'testimonial', $args );

}
add_action( 'init', 'leredbread_testimonials_post_type', 0 );