<?php /*Template Name: Kategorienseite */ ?>

<?php get_header(); ?>
 
 <div class="row">
 <div class="bg large-12 columns">


<!-- Loop der letzten 21 Post aus dem Post Type albertis-kunstwerke  -->

  <div class="row first-container">
    <div class="large-12 columns">
      <div class="row">

          <?php 
          $get_page_id = get_the_ID(); 
      // the query
      $the_query = new WP_Query( array ( 'post_type' => 'page', 'post_parent' => $get_page_id, 'posts_per_page' => '21' ) ); ?>

      <?php if ( $the_query->have_posts() ) : ?>

        <!-- pagination here -->

        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="large-4 medium-4 columns imagefeed">
            <a href="<?php the_permalink(); ?>">
              <?php the_post_thumbnail('index-categories'); ?>

              <!--Contents that are only shown on HOVER -->
              <div class="category_information columns absolute_center">
                <h3 class="absolute_center"><?php echo $post->post_title ?></h3>
              </div>

          </div>
        <?php endwhile; ?>
        <!-- end of the loop -->

        <!-- pagination here -->

        <?php wp_reset_postdata(); ?>

      <?php else:  ?>
        <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
      <?php endif; ?>

      <div class="clearfix">
      </div>
    </div>
  </div>
  </div>

    
<?php get_footer(); ?>
 

