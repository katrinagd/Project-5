<?php
/**
 * The template for displaying archive pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>

	<div id="primary" class="container">
		
		<?php if ( have_posts() ) : ?>

		<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
				<p>We are a team of creative and talented individuals who love making delicious treats.</p>
				<hr class="decorative" />
			</header><!-- .page-header -->

			<section class="product-info">
			<?php
			        $terms = get_terms("product-type");
			        if ($terms) {?>
			            <ul class="product-blocks">
			            <?php foreach($terms as $term) { ?>
			                <li class="product-wrapper">
			                    <a href="<?php echo get_term_link( $term ); ?>"><img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $term->slug ?>.png"
			                         alt="<?php echo $term->slug ?>">
			                    <h3 class="entry-title"><?php echo $term->name ?></h3></a>
			                    </p>
			                </li><?php
			            }
			        } ?>

               </section>
</div>
<div class="product-grid">

			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>

				
					<div class="product-grid-item">	
					<?php if ( has_post_thumbnail() ) : ?>
								<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
							<?php endif; ?>
							<span class="product-info"><?php the_title(); ?></span>
							<span class='price'> Price: <?php echo esc_html( CFS()->get('price') ); ?></span>
					</div>
					
					
							
				

			<?php endwhile; ?>

			<?php the_posts_navigation(); ?>

		<?php else : ?>

			<?php get_template_part( 'template-parts/content', 'none' ); ?>

		<?php endif; ?>

</div>
</div>
		
<?php get_footer(); ?>

