<?php
/**
 * The template for displaying home page.
 *
 * @package RED_Starter_Theme
 */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<section class="hero">
				<span class="hero-text">Baked to Perfection</span>
			</section>

<section class="product-info container">
                     <div class="product-blocks">
                                 <div class="product-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/bread.png" alt="Bread"/>
                     <h3>Bread</h3>
                     <p>Bread is the ultimate comfort food! Our lust-worthy loaves will satisfy your most intense carb cravings. <a href="">See More...</a></p>
                  </div>
                                 <div class="product-wrapper">
                     <img src="<?php echo get_template_directory_uri();?>/images/coffee.png" alt="Coffee" />
                    <h3>Coffee</h3>
                     <p>Start your day with decadent cup o' joe, or pop in for a mid-afternoon pick me up. Caffeine FTW. <a href="">See More...</a></p>
                  </div>
                                 <div class="product-wrapper">
                    <img src="<?php echo get_template_directory_uri();?>/images/pretzels.png" alt="Pretzels" />
                     <h3>Pretzels</h3>
                     <p>Our soft-pretzels are available in a variety of flavours. When they taste this good, one is never enough! <a href="">See More...</a></p>
                  </div>
                                 <div class="product-wrapper">
                     <img src="<?php echo get_template_directory_uri();?>/images/sweets.png" alt="Sweets" />
                    <h3>Sweets</h3>
                     <p>Our sinfully delicious sweets are simply irresistible! These gourmet treats will keep you coming back. <a href="">See More...</a></p>
                  </div>
                           </div>
               </section>

      <section class="call-to-action clearfix">
         <p>
            <span>All our products are made fresh daily from locally-sourced ingredients. Our menu is updated frequently.</span>
            <a href="" class="btn">See Our Products</a>
         </p>
      </section>
<ul class="latest-news">
 
<?php
$args = array( 'posts_per_page' => 4 );
$lastposts = get_posts( $args );
foreach ( $lastposts as $post ) :
  setup_postdata( $post ); ?>
   <li>
 <div class="thumbnail-wrapper"><?php 
if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  the_post_thumbnail( 'medium');
} 
?></div>
<div class="post-info-wrapper"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
<p><?php the_time('M j, Y'); ?>
<!-- display the post's comments in numerical -->
<?php comments_number(__('/ 0 Comments'), __('/ 1 Comments'), __('/ % Comments')) ?></p></div>
<?php endforeach; 
wp_reset_postdata(); ?>
</li>
</ul>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer(); ?>