<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * @package RED_Starter_Theme
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function red_starter_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'red_starter_body_classes' );

function le_red_bread_logo() {
    echo '<style type="text/css">
        .login h1 a { background-image:url('.get_template_directory_uri().'/images/lrb-logo.svg);
		              background-size:269px 62px;
					  width:269px;
					  height:62px; }
    </style>';
}

add_action('login_head', 'le_red_bread_logo');

function le_red_bread_logo_url(){
	return home_url();
}

add_filter('login_headerurl', 'le_red_bread_logo_url');


function le_red_bread_login_title(){
	return "Le Red Bread";
}
add_filter('login_headertitle', 'le_red_bread_login_title');

/**
 * Filter the Product post type archive.
 */
 function lrb_modify_archive_queries( $query ) {
	if ( is_post_type_archive( array( 'product' ) ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
		$query->set( 'posts_per_page', 12 );
	} elseif ( $query->is_tax( 'product-type' ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	} elseif ( is_post_type_archive( array( 'testimonial' ) ) && !is_admin() && $query->is_main_query() ) {
		$query->set( 'orderby', 'title' );
		$query->set( 'order', 'ASC' );
	}
 }
 add_action( 'pre_get_posts', 'lrb_modify_archive_queries' );


 /**
 * Customize excerpt length and style.
 *
 * @param  string The raw post content.
 * @return string
 */
function red_wp_trim_excerpt( $text ) {
	$raw_excerpt = $text;

	if ( '' == $text ) {
		// retrieve the post content
		$text = get_the_content('');

		// delete all shortcode tags from the content
		$text = strip_shortcodes( $text );

		$text = apply_filters( 'the_content', $text );
		$text = str_replace( ']]>', ']]&gt;', $text );

		// indicate allowable tags
		$allowed_tags = '<p>,<a>,<em>,<strong>,<blockquote>,<cite>';
		$text = strip_tags( $text, $allowed_tags );

		// change to desired word count
		$excerpt_word_count = 50;
		$excerpt_length = apply_filters( 'excerpt_length', $excerpt_word_count );

		// create a custom "more" link
		$excerpt_end = '<span>[...]</span><p><a href="' . get_permalink() . '" class="read-more">Read more &rarr;</a></p>'; // modify excerpt ending
		$excerpt_more = apply_filters( 'excerpt_more', ' ' . $excerpt_end );

		// add the elipsis and link to the end if the word count is longer than the excerpt
		$words = preg_split( "/[\n\r\t ]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY );

		if ( count( $words ) > $excerpt_length ) {
			array_pop( $words );
			$text = implode( ' ', $words );
			$text = $text . $excerpt_more;
		} else {
			$text = implode( ' ', $words );
		}
	}
	return apply_filters( 'wp_trim_excerpt', $text, $raw_excerpt );
}

remove_filter( 'get_the_excerpt', 'wp_trim_excerpt' );
add_filter( 'get_the_excerpt', 'red_wp_trim_excerpt' );


/**
 * Customize the Product archive title
 */
function red_archive_title( $title ) {
     if ( is_post_type_archive( 'product' ) ) {
		  $title = 'Our Products Are Made Fresh Daily';
     } elseif ( is_tax( 'product-type' ) ) {
		  $title = sprintf( '%1$s', single_term_title( '', false ) );
	  } elseif ( is_post_type_archive( 'testimonial' ) ) {
		  $title = 'Testimonials';
	  }

     return $title;
 }
 add_filter( 'get_the_archive_title', 'red_archive_title' );


 /**
 * Restrict HTML tags in comment text.
 */
function lrb_filter_comment_text( $content ) {
	$comment_text = wp_kses(
		$content,
		array(
			'p' => array(),
		)
	);

	return $comment_text;
}
add_filter( 'comment_text', 'lrb_filter_comment_text', 99 );

/**
 * Redirect single testimonial URLs to the testimonials archive page.
 */
function lrb_redirect_single_testmonials() {
	$queried_post_type = get_query_var( 'post_type' );

	if ( is_single() && 'testimonial' ==  $queried_post_type ) {
		wp_redirect( get_post_type_archive_link( 'testimonial' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'lrb_redirect_single_testmonials' );
