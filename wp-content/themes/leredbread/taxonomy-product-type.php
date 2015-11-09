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

			<header class="product-type-page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
    <div class="product-menu">
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="product-menu">
		<div class="product-menu-item">
			<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'thumbnail' ); ?>
		<?php endif; ?>
		<div class="product-menu-info">
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
			<p class="price">Price: <?php echo esc_html( CFS()->get( 'price' ) ); ?></p>
		</div>
	</div>
</div>

</article>
				

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</div>
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
