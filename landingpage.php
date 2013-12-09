<?php /*Template Name: landingpage */ ?>

<?php get_header(); ?>
 
<!-- <div class="row">
 <div class="bg large-12 columns first"> -->

<!-- Über Uns Bereich -->

  <div class="row first-container-landingpage bg">
    <div class="large-12 columns">
      <div class="row">
        <div class="large-7 medium-6 small-12 columns ueber-uns">
          <?php while(have_posts()):the_post();?>
          <h4><?php the_field('titel_box_ueber_uns'); ?></h4>
          <p><?php the_field('ueber_uns'); ?></p>
        <?php endwhile; ?>
        </div>
         <div class="large-5 medium-6 small-12 columns">
          <img class="avatar" src='<?php bloginfo('template_url'); ?>/img/borisch.jpg' alt="Harald Borisch"/>
        </div>
        
      </div>
    </div>
  </div>


<!-- Was wir bieten Trenner -->

<div class="row">
 <div class="bg large-12 columns">
  
<div class="row second-container">
    <div class="large-3 large-centered  columns">
        <h3>Was wir bieten</h3>
    </div>
</div>


<!-- Angebots Bereich -->
 
  <div class="row third-container">
    <div class="large-4 columns">
        <?php while(have_posts()):the_post();?>
          <h4><?php the_field('titel_box_kunstwerke'); ?></h4>

          <p><?php the_field('kunstwerke'); ?></p>
        <?php endwhile; ?>
        <a href="<?php echo get_permalink(40); ?>"><button>weitere Infos</button></a>
    </div>
    
    <div class="large-4 columns">
      <?php while(have_posts()):the_post();?>
          <h4><?php the_field('titel_box_bewertung'); ?></h4>

          <p><?php the_field('bewertung'); ?></p>
        <?php endwhile; ?>
    </div>
    
    <div class="large-4 columns">
        <?php while(have_posts()):the_post();?>
          <h4><?php the_field('titel_box_restaurierung'); ?></h4>

          <p><?php the_field('restaurierung'); ?></p>
        <?php endwhile; ?>
    </div>
  
    </div>



    
<?php get_footer(); ?>
 

