<?php /*Template Name: Übersicht-Ölgemälde */ ?>

<?php get_header(); ?>
 
 <div class="row">
 <div class="bg large-12 columns">

<!-- Loop der letzten 21 Post aus dem Post Type albertis-kunstwerke  -->
  <div class="row first-container">
    <div class="large-12 columns">

      <div class="row">
  
        <?php
            // the query

         $args=array();
         $args['post_type'] = 'albertis-kunstwerke';
         $args['posts_per_page'] = '21';
         $args['kunstarten'] = 'oelgemaelde';

         $page_link = get_permalink();
          $motive = get_terms( 'motive' );

          $args['paged'] = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
         
          if ( isset( $_GET['motive'] ) ) {
              $args['motive'] = $_GET['motive'];
              $page_link = add_query_arg( 'motive', $_GET['motive'], $page_link );
          }

          if ( is_array( $motive ) ) {
              echo '<div class="large-4 medium-4 columns">';
              echo '<a href="#" data-dropdown="drop1" data-options="is_hover:true">Filtern Sie hier nach Bildmotiv';
              echo "<ul id="drop1" class="f-dropdown" data-dropdown-content>";
              foreach ( $motive as $motive ){
                  echo "<li><a href="'.htmlentities( add_query_arg( 'motive', $motive->slug, $page_link ) ).'">'.$motive->name.'</a></li>";
              }
              echo "<li class=""><a href="'.htmlentities( remove_query_arg( 'motive', $page_link ) ).'">Keinen Filter anwenden</a></li>";
              echo "</ul>";
              echo "</a>";
              echo "</div>";
            } ;?>
      </div>

  <div class="row">

<?php 
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
 

