<?php /*Template Name: landingpage */ ?>

<?php get_header(); ?>
 
<!-- First Band (Slider) -->
<div class="row">
 <div class="bg large-12 columns">

  <div class="row first-container">
    <div class="large-12 columns">
      <div class="row">
        <div class="large-6 large-offset-1 columns">
          <?php while(have_posts()):the_post();?>
          <h4><?php the_field('titel_box_ueber_uns'); ?></h4>
          <p><?php the_field('ueber_uns'); ?></p>
        <?php endwhile; ?>
        </div>
         <div class="large-4 columns">
          <img class="avatar" src='<?php bloginfo('template_url'); ?>/img/borisch.jpg' alt="Harald Borisch"/>
        </div>
         <div class="large-1 columns">
        </div>
      </div>
    </div>
  </div>
  
<div class="row second-container">
    <div class="large-3 large-centered  columns">
        <h3>Was wir bieten</h3>
    </div>
</div>


<!-- Three-up Content Blocks -->
 
  <div class="row third-container">
    <div class="large-4 columns">
        <?php while(have_posts()):the_post();?>
          <h2><?php the_field('titel_box_ueber_uns'); ?></h2>

          <p><?php the_field('kunstwerke'); ?></p>
        <?php endwhile; ?>
    </div>
    
    <div class="large-4 columns">
     <!-- <img src="http://placehold.it/400x300&text=[img]" /> -->
      <h4>Restaurierung</h4>
      <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
    </div>
    
    <div class="large-4 columns">
    <!--  <img src="http://placehold.it/400x300&text=[img]" /> -->
      <h4>Begutachtung</h4>
      <p>Bacon ipsum dolor sit amet nulla ham qui sint exercitation eiusmod commodo, chuck duis velit. Aute in reprehenderit, dolore aliqua non est magna in labore pig pork biltong. Eiusmod swine spare ribs reprehenderit culpa. Boudin aliqua adipisicing rump corned beef.</p>
    </div>
  
    </div>



    
<?php get_footer(); ?>
 

