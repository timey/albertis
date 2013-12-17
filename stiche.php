<?php /*Template Name: Stiche & Radierungen */ ?>

<?php get_header(); ?>
 
 <div class="row">
 <div class="bg large-12 columns">

<!-- Loop der letzten 21 Post aus dem Post Type albertis-kunstwerke  -->
  <div class="row first-container">
    <div class="large-12 columns">

      <div class="row">
  
        <?php
            // the query

          $page_link = get_permalink();
          $motive = get_terms( 'motive' );

          $args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
         
          if ( isset( $_GET['motive'] ) ) {
              $args['motive'] = $_GET['motive'];
              $page_link = add_query_arg( 'motive', $_GET['motive'], $page_link );
          } ;?>

          <div class="large-4 medium-4 columns">
            <h2><?php the_title() ?></h2>
          </div>
          <div class="filter_dropdown_wrapper large-4 medium-4 columns right">
              <a href="#">
                  <button>Filtern Sie hier nach Bildmotiv</button>
                      <?php 
                      if ( is_array( $motive ) ) {
                          echo '<div class="large-12 small-12 columns filter_dropdown_outermain"><ul class="filter_dropdown_main">';
                          foreach ( $motive as $motive ){
                          echo '<a href="' . htmlentities( add_query_arg( 'motive', $motive->slug, $page_link ) ) . '"><li class="filter_dropdown_tag">' . $motive->name . '</li></a>';
                          }
                          
                          echo '<a href="' . htmlentities( remove_query_arg( 'motive', $page_link ) ) . '"><li class="filter_dropdown_tag">Keinen Filter anwenden</li></a>'; 
                          }
                          ;?>
                    </ul></div>
              </a>
            </div>
            
      </div>

  <div class="row">

<?php 
  
  $args=array();
  $args['post_type'] = 'albertis-kunstwerke';
  $args['posts_per_page'] = '21';
  $args['kunstarten'] = 'stiche-und-radierungen';

  $the_query = new WP_Query( $args ); ?> 

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
  <!-- Abfrage, ob mehr als eine Seite vorhanden - wenn ja -> Button anzeigen -->
      <?php 

      $nextposts = get_next_posts_link();
      if( $nextposts == true ): ?>
        
       <div class="row">
        <div class="large-12 columns"> 
      
            <div class="row">
              <div class="large-4 small-8 small-centered columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo get_next_posts_link( 'weitere Kunstwerke', $the_query->max_num_pages );
                echo get_previous_posts_link( 'vorherige Kunstwerke' );
                ?>
                </button>
              </div>
            </div>
        </div>
      </div>
  
      <?php endif; ?>
  <!-- Ende Abfrage -->
        
      
            <div class="row">
              <div class="large-4 small-8 small-centered columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo get_next_posts_link( 'weitere Kunstwerke', $the_query->max_num_pages );
                echo get_previous_posts_link( 'vorherige Kunstwerke' );
                ?>
                </button>
              </div>
            </div>
  

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
 

