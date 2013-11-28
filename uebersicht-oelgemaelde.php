<?php /*Template Name: Übersicht-Ölgemälde */ ?>

<?php get_header(); ?>
 
 <div class="row">
 <div class="bg large-12 columns">

<!--  <div class="row first-container">
    <div class="large-12 columns">
      <div class="row">

        <?php query_posts('showposts=21'); ?>
          <?php while (have_posts()) : the_post(); ?>
          <div class="large-4 medium-4 columns imagefeed">
           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-categories'); ?></a>
          </div>
          <?php endwhile;?> 
      <div class="clearfix">
      </div>
    </div>
  </div>
  </div> -->

<!-- Loop der letzten 21 Post aus dem Post Type albertis-kunstwerke  -->
  <div class="row first-container">
    <div class="large-12 columns">
      <div class="row">

          <?php 
      // the query
  $the_query = new WP_Query( array ( 'post_type' => 'albertis-kunstwerke', 'posts_per_page' => '21', '$meta_value' => 'Ölgemälde' ) ); ?> 





      <?php if ( $the_query->have_posts() ) : ?>

        <!-- pagination here -->

        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
           <div class="large-4 medium-4 columns imagefeed">
           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('index-categories'); ?></a>
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
 

