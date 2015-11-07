<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<div class="site-content">
	<div id="primary" class="content-area">
		

		<?php if ( have_posts() ) : ?>

			<header class="page-header-product-type">
				<?php
					the_archive_title( '<h1 class="entry-title-product-type">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description-product-type">', '</div>' );
				?>
			</header><!-- .page-header -->
    <div class="product-menu">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	        <header class="entry-header">

			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'thumbnail' ); ?>
			<?php endif; ?>
	<div class="product-info">

			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

	</div>
		<?php if ( 'post' === get_post_type() ) : ?>
				<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->
	<span class='price'> Price: <?php echo esc_html( CFS()->get('price') ); ?></span>
</article><!-- #post-## -->
				

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
