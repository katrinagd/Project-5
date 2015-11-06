<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<h1 class="page-title">Our Products Are Made Fresh Daily</h1>
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->


<div class="site-content">
<section class="product-info">
<?php
        $terms = get_terms("product-type");
        if ($terms) {?>
            <ul class="product-blocks">
            <?php foreach($terms as $term) { ?>
                <li class="product-wrapper">
                    <a href="<?php echo get_term_link( $term ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $term->slug ?>.png"
                         alt="<?php echo $term->slug ?>">
                    <h3><?php echo $term->name ?></h3></a>
                    </p>
                </li><?php
            }
        } ?>

               </section>
</div>


			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				<div class="product-grid">
					<div class="product-grid-item">	
					<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium' ); ?></a>
							<?php endif; ?>
					</div>
					<div class="product-info"><p><?php the_title(); ?><!-- </p><p class='price'> --> Price: <?php echo esc_html( CFS()->get('price') ); ?></p>
					</div>
							
				</div>

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>

