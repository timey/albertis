<?php /*Template Name: Singlepost */ ?>

<?php get_header(); ?>
 
<div class="row">
 <div class="bg large-12 columns">

  <div class="row first-container">
      <?php if(have_posts()):while(have_posts()):the_post();?>
      <div class="large-12 medium-12 columns">
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
         <h2><?php the_field('bildname'); ?></h2>
      </div>
  </div>
  
<div class="row image-container">
  <div class="large-12 large-centered medium-12 medium-centered small-12 columns">
     <?php the_post_thumbnail('page-single'); ?>
  </div>   
</div>

<div class="row imagedata-container">
<!--  <div class="large-6 medium-6 columns">
    <?php get_template_part( 'content', get_post_format() ); ?>
        <p class="imagedata">Bildname: <?php the_field('bildname'); ?></p>
        <p class="imagedata">Künstlername: <?php the_field('kuenstler'); ?></p>
        <p class="imagedata">Erscheinungsjahr: <?php the_field('jahr'); ?></p>
        <p class="imagedata">Malgrund: <?php the_field('malgrund'); ?></p>
        <p class="imagedata">Ort: <?php the_field('entstehungsort'); ?></p>
        <p class="imagedata">Maße: <?php the_field('breite'); ?> x <?php the_field('hoehe'); ?> cm</p>
        <p class="imagedata">Herkunftsnachweis: <?php the_field('herkunftsnachweis'); ?></p>
  </div>
-->
  <div class="large-6 medium-6 columns">
    <?php get_template_part( 'content', get_post_format() ); ?>
        <table>
          <tr>
            <td>
              Bildname:
            </td> 
            <td>
              <?php the_field('bildname'); ?>
            </td> 
          </tr>
           <tr>
            <td>
              Künstlername:
            </td> 
            <td>
              <?php the_field('kuenstler'); ?>
            </td> 
          </tr>
           <tr>
            <td>
              Erscheinungsjahr:
            </td> 
            <td>
              <?php the_field('jahr'); ?>
            </td> 
          </tr>
           <tr>
            <td>
              Malrgrund:
            </td> 
            <td>
              <?php the_field('malgrund'); ?>
            </td> 
          </tr>
           <tr>
            <td>
              Ort:
            </td> 
            <td>
              <?php the_field('entstehungsort'); ?>
            </td> 
          </tr>
          <tr>
            <td>
              Maße:
            </td> 
            <td>
              <?php the_field('breite'); ?> x <?php the_field('hoehe'); ?> cm
            </td> 
          </tr>

        </table>
  </div>

  <div class="large-6 medium-6 columns">
    <button>Ich will den shit!</button>
  </div>
</div>   

<div class="row imagedata-container">
  <div class="large-6 medium-6 columns">
      <h4>Bildbeschreibung</h4>
      <p class="imagedata"><?php the_field('bildbeschreibung'); ?></p>
  </div>
</div>   
      <?php endwhile; ?>
      <?php endif; ?>
    

    
<?php get_footer(); ?>
 

