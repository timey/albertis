
<!-- Footer -->
  <footer>
    <div class="row">
        <hr />
        <?php get_sidebar( 'footer' ); ?>
    </div>

    <div class="row">

    <hr />

      <div class="large-4 large-centered medium-4 small-4 small-centered columns">
        <small class="clearfix">&copy; 2013 - <?php echo date("Y"); echo " "; echo bloginfo('name'); ?></small>  
      </div>
    </div>
  </footer>


<?php wp_footer(); ?>

  <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
  <script>$(document).foundation();</script>

</body>
</html>