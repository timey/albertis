<!doctype html>
<html class="no-js" lang="en">
  <head profile="http://gmpg.org/xfn/11">

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <title><?php wp_title(); ?> - <?php bloginfo('name'); ?></title>
    <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri()?>/css/normalize.css" type="text/css" media="screen" title="alternate" />
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <script src="<?php bloginfo('template_url'); ?>/js/modernizr.js"></script>

    <?php wp_head(); ?>
  </head>
  <body>
    
  <div class="row">
    <div class="large-3 medium-3 columns logo">
      <a href="<?php echo get_option('home'); ?>"/><img src="<?php bloginfo('template_url'); ?>/img/logo_albertis.png"></a>
    </div>
    <div class="large-9 medium-6 columns topnav">

      <?php wp_nav_menu(array('container_class' => 'button-group right','theme_location'=>'header-menu')); ?>

    <!-- </div>
     <div class="large-3 medium-3 columns"> -->
      <?php get_search_form(array('container_class' => '')); ?>
     </div>
   </div>
  
<!-- End Header and Nav -->