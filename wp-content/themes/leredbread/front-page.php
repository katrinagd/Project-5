<?php
/**
 * The template for displaying home page.
 *
 * @package RED_Starter_Theme
 */
get_header(); ?>

<div id="primary">
  <main id="main" class="site-main" role="main">

   <section class="hero">
     <span class="hero-text">Baked to Perfection</span>
   </section>
    <div class="site-content">
      <section class="product-info">
        <?php
        $terms = get_terms("product-type");
        if ($terms) {?>
        <ul class="product-blocks">
          <?php foreach($terms as $term) { ?>
          <li class="product-wrapper">
            <img src="<?php echo get_template_directory_uri() ?>/images/<?php echo $term->slug ?>.png"
            alt="<?php echo $term->slug ?>">
            <h3 class="entry-title"><?php echo $term->name ?></h3>
            <p><?php echo $term->description;?>
              <a href="<?php echo get_term_link( $term ); ?>">See More...</a>
  </p>
            </li><?php
          }
        } ?>

      </section>
    </div>



  <div class="container">
    <div class="call-to-action clearfix">
     <p>
      <span>All our products are made fresh daily from locally-sourced ingredients. Our menu is updated frequently.</span>
      <a href="" class="btn">See Our Products</a>
    </p>
  </div>


  <h1 class="page-header">OUR LATEST NEWS</h1>
  <hr class="decorative"/>
  <ul class="latest-news">

    <?php
    $args = array( 'posts_per_page' => 4 );
    $lastposts = get_posts( $args );
    foreach ( $lastposts as $post ) :
      setup_postdata( $post ); ?>
    <li>
     <div class="thumbnail-wrapper"><?php 
        if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
          the_post_thumbnail();
        } 
        ?></div>
        <div class="post-info-wrapper"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <p class="entry-meta"><?php the_time('M j, Y'); ?>
            <!-- display the post's comments in numerical -->
            <?php comments_number(__('/ 0 Comments'), __('/ 1 Comments'), __('/ % Comments')) ?></p></div>
            <?php endforeach; 
            wp_reset_postdata(); ?>
          </li>
        </ul>
        <!-- testimonial -->
        <section class="testimonials">
            <div class="page-header">
              <h1>WHAT OTHERS SAY ABOUT US</h1>
            </div>
          <hr class="decorative"/>
          <ul>
            <?php
            $args = array( 
              'post_type'=>'testimonial',
              'posts_per_page' => 4,
              'order' => 'ASC' );
            $testimonial_posts = get_posts( $args );
            foreach ( $testimonial_posts as $post ) :
              setup_postdata( $post ); ?>
            <li>
              <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail( 'thumbnail' ); ?>
            <?php endif; ?>
            <div class="client-info">
              <?php the_content(); ?>
              <p class='client_name'><?php echo esc_html( CFS()->get('client_name') ); ?></p>
              <a href="/leredbread/testimonials/"><p class='client_title'><?php echo esc_html( CFS()->get('client_title') ); ?></p></a>
            </div>
          <?php endforeach; 
          wp_reset_postdata(); ?>
        </li>
      </ul>
    </section>


    
    <!-- .entry-content -->
   <!--  end of testimonial -->


  </div>
</main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>