<?php /*Template Name: landingpage */ ?>

<?php get_header(); ?>
 
<div class="row">
 <div class="bg large-12 columns">

  <div class="row first-container">
      <?php if(have_posts()):while(have_posts()):the_post();?>
        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="entry">
          <?php the_content(); ?>
        </div>
      <?php endwhile; ?>
       <!-- <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p> -->
      <?php endif; ?>
  </div>
  


    
<?php get_footer(); ?>
 

