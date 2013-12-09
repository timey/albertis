<?php get_header(); ?>

<div class="row">
 <div class="bg large-12 columns">

  <div class="row first-container">
      <?php if(have_posts()): ?>
				<p class="info">Deine Suchergebnisse f&uuml;r <?php echo $s ?></p>

			<?php while(have_posts()):the_post();?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div id="meta">
					<p>erstellt am: <?php the_date('d.m.Y'); ?> | von <?php the_author(); ?> | Kategorie(n): <?php the_category(','); ?>
					</p>
				</div>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
				<p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
			<?php endif; ?>
  </div>


<?php get_footer(); ?>