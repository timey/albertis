<?php /*Template Name: Übersicht-Ölgemälde */ ?>

<?php get_header(); ?>
 
 <div class="row">
 <div class="bg large-12 columns">

<!-- Loop der letzten 21 Post aus dem Post Type albertis-kunstwerke  -->
  <div class="row first-container">
    <div class="large-12 columns">

      
      <!--
      <li id="dropdown_test">
        <h2><?php _e('Categories:'); ?></h2>
        <form action="<?php bloginfo('url'); ?>" method="get">
          <div>
          <?php 
              wp_dropdown_categories(
                array(
                    'show_option_all'    => '',
                    'show_option_none'   => '',
                    'orderby'            => 'ID', 
                    'order'              => 'ASC',
                    'show_count'         => 0,
                    'hide_empty'         => 1, 
                    'child_of'           => 0,
                    'exclude'            => '',
                    'echo'               => 1,
                    'selected'           => 0,
                    'hierarchical'       => 0, 
                    'name'               => 'cat',
                    'id'                 => '',
                    'class'              => 'postform',
                    'depth'              => 0,
                    'tab_index'          => 0,
                    'taxonomy'           => 'motive',
                    'hide_if_empty'      => false,
                          'walker'             => '',
                  ));?>
          <input type="submit" name="submit" value="view" />
          </div>
        </form>
      </li> -->
      <div class="row">
  
  <?php
      // the query

  $the_query = new WP_Query( array ( 
                                    'post_type' => 'albertis-kunstwerke', 
                                    'posts_per_page' => '21', 
                                    'kunstarten' => 'oelgemaelde' ) ); ?> 

      <?php if ( $the_query->have_posts() ) : ?>

        <!-- pagination here -->
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
 

