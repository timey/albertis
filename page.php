<?php get_header(); ?>

	<div class="row">
	 <div class="bg large-12 columns">
		<div class="row first-container">
			<?php if(have_posts()):while(have_posts()):the_post();?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<div class="entry">
					<?php the_content(); ?>
				</div>
			<?php endwhile; endif; ?>

		</div>
	


<?php get_footer(); ?>