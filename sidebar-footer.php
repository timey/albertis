<?php
/**
* Footer widget area
*/
?>

<?php	if (	! is_active_sidebar( 'first-footer-widget-area' )
		&& ! is_active_sidebar ( 'second-footer-widget-area')
		&& ! is_active_sidebar ( 'third-footer-widget-area')
	)
		return;
?>

<div id="footer-widget-area" role="complementary">

	<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
		<div id="first" class="widget-area large-4 medium-4 small-12 columns">
			<ul>
			<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
		<div id="second" class="widget-area large-4 medium-4 small-12 columns">
			<ul>
			<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
			</ul>
		</div>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
		<div id="third" class="widget-area large-4 medium-4 small-12 columns">
			<ul>
			<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
			</ul>
		</div>
	<?php endif; ?>

</div>