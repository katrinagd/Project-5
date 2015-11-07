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
				<div class="about-block"><div class="about-block-item">
					<?php echo CFS()->get('team'); ?></div>
				    <div class="about-block-item"><?php echo CFS()->get('bakery'); ?></div></div>

				<?php echo CFS()->get('story'); ?>
				<div class="call-to-action clearfix"><p>Feel free to contact us with any questions coments or suggestions. We even take custom orders!  <a class="btn" href="http://localhost:3000/leredbread/contact/">Contact Us</a></p></div>
			<?php endwhile; // End of the loop. ?>

		<!-- </main> --><!-- #main -->
	</div>

	<!-- #primary -->

<?php get_footer(); ?>
