<?php /*Template Name: Singlepost */ ?>

<?php get_header(); ?>
 
<div class="row">
 <div class="bg large-12 columns">

  <div class="row first-container">
      <?php if(have_posts()):while(have_posts()):the_post();?>
      <div class="large-12 medium-12 columns">
         <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      </div>
  </div>
  
<div class="row image-container">
  <div class="large-12 large-centered medium-12 medium-centered small-12 columns">
     <?php the_post_thumbnail('page-single'); ?>
  </div>   
</div>

<div class="row imagedata-container">
  <div class="large-6 medium-6 columns">
    <h4>Bildinformationen</h4>
   
      <?php 
 
        $fields = get_field_objects(); ?>
 
          <?php if( $fields ): ?>
            <table>
              <?php foreach( $fields as $field ): ?>
             
                 <?php if( $field['value'] ): ?>
          
                    <?php if($field['name'] !== 'bildbeschreibung') :?>
                      <?php if($field['name'] !== 'technik') :?>
                         <?php if($field['name'] !== 'herkunftsnachweis') :?>
                      <tr><td><?php echo $field['label']; ?>:</td> <td><?php echo $field['value']; ?></td></tr>
                    
                    <?php else: 
                      ;
                    ?> 

                        <?php endif; ?>
                       <?php endif; ?>
                      <?php endif; ?>
                    <?php endif; ?>
     
              <?php endforeach; ?>
            </table>
          <?php endif; ?>

  </div>

  <div class="large-6 medium-6 columns">
    <h4>Interesse geweckt?</h4>
    <?php echo do_shortcode( '[contact-form-7 id="170" title="Kontaktformular 1"]'); ?>
  </div>
</div>   

<div class="row imagedata-container">
  <div class="large-12 medium-12 small-12 columns">
      <?php 
      $fields = get_field_objects();
      if( $fields ){
        foreach( $fields as $field ){
          if( $field['value'] && $field['name'] === 'bildbeschreibung' ) {
            echo "<h4>".$field['label']."</h4>";
            echo "<p class='imagedata'>".$field['value']."</p>";
          }
          
        } 
      }
      ?>
  </div>
</div>   
      <?php endwhile; ?>
      <?php endif; ?>
    

    
<?php get_footer(); ?>
 

