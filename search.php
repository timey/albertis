<?php get_header(); ?>

<div class="row">
 <div class="bg large-12 columns">
	
	<div class="row first-container">
      <?php if(have_posts()): ?>
				<p class="info">Ihre Suchergebnisse f&uuml;r "<?php echo $s ?>"</p>

			<?php while(have_posts()):the_post();?>
				<a href="<?php the_permalink(); ?>">
					<h2><?php the_title(); ?></h2>
					<div class="entry">
						<?php the_post_thumbnail('index-categories'); ?>
					<!--	<?php the_content(); ?> -->
					</div>
				</a>
			<?php endwhile; ?>


				<p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
			
			<?php else:  ?>
			 	<p>'Sorry, leider keine Ergebnisse!' </p>
			<?php endif; ?>
  </div>


<?php get_footer(); ?>