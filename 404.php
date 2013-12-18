<?php 
/**
 * The template for displaying 404 pages (Not Found)
 */
get_header(); ?>

	<div class="row">
	 <div class="bg large-12 columns">
		<div class="row first-container">
			<h2><?php _e( '404 - Not Found :-(', 'albertis' ); ?></h2>

			<p><?php _e( "Huch?! Da scheint was schief gegangen zu sein - versuchs doch mal mit der Suche!", 'albertis' ); ?></ü>

			<?php get_search_form(); ?>

		</div>
	


<?php get_footer(); ?>