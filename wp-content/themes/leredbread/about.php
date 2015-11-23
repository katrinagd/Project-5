<?php /* Template Name: Full width */ ?>

	<?php
/**
 * The template for displaying all pages.
 *
 * @package RED_Starter_Theme
 */

get_header(); ?>
<div class="site-content">
	<div id="primary">
		
		<!-- <main id="main" class="site-main" role="main"> -->

			<?php while ( have_posts() ) : the_post(); ?>


				
				<?php echo CFS()->get('subtitle'); ?>
				<div class="about-block">

					<div class="about-block-item">
                  <img src="<?php echo get_template_directory_uri() . '/images/team.jpg'; ?>" alt="Le Red Bread team" />
                  <h3>Le Red Bread Team</h3>
                  <p class="sub-head">Baking up a storm every day.</p>
                  <?php echo CFS()->get( 'team' ); ?>
               </div>

               <div class="about-block-item">
                  <img src="<?php echo get_template_directory_uri() . '/images/bakery.jpg'; ?>" alt="Le Red Bread bakery space" />
                  <h3>Le Red Bread Bakery</h3>
                  <p class="sub-head">A home away from home.</p>
                  <?php echo CFS()->get( 'bakery' ); ?>
               </div>

				</div>

				<?php echo CFS()->get('story'); ?>
			
				 <section class="call-to-action clearfix">
            <p>
               <span>Feel free to contact us with any questions coments or suggestions. We even take custom orders!</span>
               <a href="/contact/" class="btn">Contact Us</a>
            </p>
         </section>
			<?php endwhile; // End of the loop. ?>

		<!-- </main> --><!-- #main -->
	</div>

	<!-- #primary -->

<?php get_footer(); ?>
 