<?php get_header(); ?>

<div class="row">
 <div class="bg large-12 columns">
<?php 
	$anzahl = $wp_query->found_posts;
	
	if($anzahl > 1) {
		echo '<h3>Ihre Suche nach <em>"'.$s.'"</em> ergab '.$anzahl.' Ergebnisse:</h3>';
	} else{	
		echo '<h3>Ihre Suche nach <em>"'.$s.'"</em> ergab '.$anzahl.' Ergebnis:</h3>';
	}
?>

  <div class="row first-container">
  	<?php   
	if(have_posts()): ?>
	<?php while(have_posts()):the_post();?>
		
	<div class="large-12 medium-12 search-result columns">
		
		<div class="row">
			<div class="large-3 search-info columns">
				<a href="<?php the_permalink(); ?>">
				<h3><?php the_title(); ?></h3>

                 <?php 
                    $post_id=$post->ID;
                    $post_artist_custom=get_post_meta($post_id, 'kuenstler', true);
                    $post_epoche_custom=get_post_meta($post_id, 'epoche', true);
 					$post_malgrund_custom=get_post_meta($post_id, 'malgrund', true);
 					$post_ort_custom=get_post_meta($post_id, 'ort', true); ?>

          			<h4 class="first"><?php echo $post_artist_custom; ?></h4>
          			<h4><?php if($post_malgrund_custom != false){
          				echo "Malgrund: ".$post_malgrund_custom; 
          			} ?></h4>
          			<h4><?php if($post_ort_custom != false){
          				echo "Ort: ".$post_ort_custom; 
          			} ?></h4>
          			<h4><?php if($post_epoche_custom != 0){
          				echo "Jahr: ".$post_epoche_custom; 
          			} ?></h4>

			</div>
            <div class="large-9 columns search_entryinfo">
				<?php the_post_thumbnail('index-categories'); ?>
            </div>
          </a>
		</div>
	</div>	
	<?php endwhile; ?>


<!-- pagination here -->
    <?php 

      $nextposts = get_next_posts_link('weitere Ergebnisse', $wp_query->max_num_pages);
      $prevposts = get_previous_posts_link('vorherige Ergebnisse');
      if( $nextposts == true && $prevposts == true ): ?>
      <div class="row">
        <div class="large-6 large-centered medium-6 small-12 small-centered columns"> 
      
            <div class="row">
              <div class="large-6 medium-6 small-6 columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo $prevposts;
                ?>
                </button>
              </div>
              <div class="large-6 large-uncentered medium-6 small-6 columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo $nextposts;
                ?>
                </button>
              </div>
            </div>
        </div>
      </div>


      <?php elseif( $nextposts == true ): ?>
        
       <div class="row">
        <div class="large-12 columns"> 
      
            <div class="row">
              <div class="large-6 small-8 small-centered columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo $nextposts;
                //echo get_previous_posts_link( 'vorherige Kunstwerke' );
                ?>
                </button>
              </div>
            </div>
        </div>
      </div>

      <?php elseif ($prevposts == true): ?>
      <div class="row">
        <div class="large-12 columns"> 
      
            <div class="row">
              <div class="large-6 small-8 small-centered columns">
                <button class="small button-center">
                <?php
                // usage with max_num_pages
                echo $prevposts;
                ?>
                </button>
              </div>
            </div>
        </div>
      </div>

      <?php else: ?>
        
    <?php endif; ?>

  <!-- end of the pagination -->
      

<!--
				<p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
	-->		
	<?php else:  ?>
		<p>'Sorry, leider keine Ergebnisse!'</p>
	<?php endif; ?>
</div>


<?php get_footer(); ?>