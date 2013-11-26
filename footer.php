  <!-- Footer -->
  <footer>
    <div class="row">
      <!--<div class="large-12 columns"> -->
        <hr />
        <?php get_sidebar( 'footer' ); ?>
      <!--</div> -->
    </div>

    <div class="row">
        <hr />
        <p class="clearfix">&copy; 2013 - <?php echo date("Y"); echo " "; echo bloginfo('name'); ?>.</p>  

    </div>
  </footer>

    <script src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

</body>
</html>