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
  $the_query = new WP_Query( array ( 
                                    'post_type' => 'albertis-kunstwerke', 
                                    'posts_per_page' => '21', 
                                    'kunstarten' => 'oelgemaelde' ) ); ?> 



      <?php if ( $the_query->have_posts() ) : ?>

        <!-- pagination here -->
<!-- ALTER QUERY 
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="large-4 medium-4 columns imagefeed">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('index-categories'); ?>
          
            Pull Title and Artist

            <div class="category_information columns absolute_center">
              <h3 class="absolute_center">
                <?php 
                $post_id=$post->ID;
                $post_title_custom=get_post_meta($post_id, 'bildname', true); 
                echo $post_title_custom;
                ?>
              </h3>
            </div>

          </a>

          </div> 
        <?php endwhile; ?>-->

<!-- 2. Version des Loops -->

        <!-- the loop -->
        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
          <div class="large-4 medium-4 columns imagefeed kunstwerke">
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail('index-categories'); ?>
       
         
            <!-- Pull Titel and Artist -->
             <div class="info">
                  <?php 
                    $post_id=$post->ID;
                    $post_title_custom=get_post_meta($post_id, 'bildname', true);
                    $post_artist_custom=get_post_meta($post_id, 'kuenstler', true); ?>
                    <h3><?php echo $post_title_custom; ?></h3>
                    <h4><?php echo $post_artist_custom; ?></h4>
              </div>
          </a>

          </div> 
        <?php endwhile; ?>
        <!-- end of the loop -->

<!-- ENDE 2. Version -->


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
 

