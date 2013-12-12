
   </div>
  </div>
  <!-- Footer -->
<footer>
  <div class="row">
    <div class="large-12 medium-12 -small-12 columns footer">
      <div class="row">
          <?php get_sidebar( 'footer' ); ?>
      </div>
     
      <div class="row">
        <div class="large-4 large-centered medium-6 small-12 small-centered columns impressum">
          <small class="clearfix">&copy; 2013 - <?php echo date("Y"); echo " "; echo bloginfo('name'); ?> - seit 1865 - <a href="<?php echo get_permalink( get_page_by_path( 'impressum' ) ); ?>">Impressum</a></small> 
        </div>
      </div>

    </div>
  </div>

</footer>

<?php wp_footer(); ?>

  <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
  <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
  <script>$(document).foundation();</script>

</body>
</html>