<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

	<div class="row">
	 <div class="bg large-12 columns">
		<div class="row first-container">
			<h1><?php _e( 'Not Found :-(', 'albertis' ); ?></h1>

			<h2><?php _e( "Ooops! Seem's like something went wrong!", 'albertis' ); ?></h2>
					
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'albertis' ); ?></p>

			<?php get_search_form(); ?>

		</div>
	


<?php get_footer(); ?>