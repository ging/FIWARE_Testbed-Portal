<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
  
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <title>
      FIWARE Testbed
    </title>
        
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- icons & favicons -->
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/images/icons/h/apple-touch-icon.png">
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/images/icons/m/apple-touch-icon.png">
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/images/icons/l/apple-touch-icon-precomposed.png">
    <!-- For Nokia -->
    <link rel="shortcut icon" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/images/icons/l/apple-touch-icon.png">
    <!-- For everything else -->
    <link rel="shortcut icon" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/images/favicon.ico">
        
    <!-- media-queries.js (fallback) -->
    <!--[if lt IE 9]>
      <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>     
    <![endif]-->
    
    <!-- google fonts -->


        <!-- html5.js -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

      <link rel="stylesheet/less" type="text/css" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/less/bootstrap.less">
      <link rel="stylesheet/less" type="text/css" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/library/less/responsive.less">

    <!-- wordpress head functions -->
    <?php wp_head(); ?>
    <!-- end of wordpress head -->

    <!-- theme options from options panel -->
    <?php get_wpbs_theme_options(); ?>

    <?php 

      // check wp user level
      get_currentuserinfo(); 
      // store to use later
      global $user_level; 

      // get list of post names to use in 'typeahead' plugin for search bar
      if(of_get_option('search_bar', '1')) { // only do this if we're showing the search bar in the nav

        global $post;
        $tmp_post = $post;
        $get_num_posts = 40; // go back and get this many post titles
        $args = array( 'numberposts' => $get_num_posts );
        $myposts = get_posts( $args );
        $post_num = 0;

        global $typeahead_data;
        $typeahead_data = "[";

        foreach( $myposts as $post ) :  setup_postdata($post);
          $typeahead_data .= '"' . get_the_title() . '",';
        endforeach;

        $typeahead_data = substr($typeahead_data, 0, strlen($typeahead_data) - 1);

        $typeahead_data .= "]";

        $post = $tmp_post;

      } // end if search bar is used

    ?>
       <link rel="stylesheet" type="text/css" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/css/bootstrap-rewrite.css"> 
       <link rel="stylesheet" type="text/css" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/css/fiware-OIL_portal.css">
       <link rel="stylesheet" type="text/css" href="http://testbed.fi-ware.org/wp-content/themes/wordpress-bootstrap/css/icons_and_fonts/fonts/fonts.css"> 
        
       <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
       <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

<script>
  $(function() {
    $( "#blueprints" ).click(function() {
      $( "#blueprints-video" ).show();
      $( "#blueprints-text" ).show( "fold", 1000 );
      $( "#instances-video" ).hide();
      $( "#o-storage-video" ).hide();
      $( "#instances-text" ).hide();
      $( "#o-storage-text" ).hide();
      $( "#blueprints" ).addClass( "sub-active" );
      $( "#li_button1" ).removeClass( "active");
      $( "#instances" ).removeClass( "sub-active" );
      $( "#o-storage" ).removeClass( "sub-active" );
      return true;
    });
  });
  $(function() {
    $( "#instances" ).click(function() {
      $( "#instances-video" ).show();
      $( "#instances-text" ).show( "fold", 1000 );
      $( "#blueprints-video" ).hide();
      $( "#o-storage-video" ).hide();
      $( "#blueprints-text" ).hide();
      $( "#o-storage-text" ).hide();
      $( "#instances" ).addClass( "sub-active" );
      $( "#li_button1" ).removeClass( "active");
      $( "#o-storage" ).removeClass( "sub-active" );
      $( "#blueprints" ).removeClass( "sub-active" );
      return false;
    });
  });
  $(function() {
    $( "#o-storage" ).click(function() {
      $( "#o-storage-video" ).show();
      $( "#o-storage-text" ).show( "fold", 1000 );
      $( "#blueprints-video" ).hide();
      $( "#instances-video" ).hide();
      $( "#blueprints-text" ).hide();
      $( "#instances-text" ).hide();
      $( "#o-storage" ).addClass( "sub-active" );
      $( "#li_button1" ).removeClass( "active");
      $( "#blueprints" ).removeClass( "sub-active" );
      $( "#instances" ).removeClass( "sub-active" );
      return false;
    });
  });
</script> 

      </head>
  
  <body <?php body_class(); ?>>
        

<header class="navbar">
      <nav class="navbar-inner">
        <div class="logo-header">
          <a href="http://testbed.fi-ware.org/" class="brand">
            <img class="filab-logo" src="wp-content/themes/wordpress-bootstrap/images/FI-WARE.png">
          </a>
        </div>

        <div class="dropdown mobile">
          <a href="#" class='dropdown-toggle' data-toggle="dropdown">
            <span class="caret"></span> 
          </a>

          <ul class="dropdown-menu dropdown-menu-header">
            <li class="cloud">
              <a href="http://cloud.testbed.fi-ware.org/">
                Cloud
              </a>
            </li>

            <li class="store">
              <a href="http://store.testbed.fi-ware.org/">
                Store
              </a>
            </li>
            <li class="mashup">
              <a href="http://mashup.testbed.fi-ware.org/">
                Mashup
              </a>
            </li>
            <li class="account">
              <a href="https://account.testbed.fi-ware.org/">
                Account
              </a>
            </li>
            <li class="help active">
              <a href="#">
                Help&info
              </a>
            </li>
          </ul>
        </div>


        <ul class="oil-portal hidden-phone hidden-tablet">
          <li class="cloud">
            <a href="http://cloud.testbed.fi-ware.org/">
              Cloud
            </a>
          </li>
          <li class="store">
            <a href="http://store.testbed.fi-ware.org/">
              Store
            </a>
          </li>
          <li class="mashup">
            <a href="http://mashup.testbed.fi-ware.org/">
              Mashup
            </a>
          </li>
          <li class="account">
            <a href="https://account.testbed.fi-ware.org/">
              Account
            </a>
          </li>
          <li class="help active">
            <a href="#">
              Help&info
            </a>
          </li>
        </ul>
      </nav> 
    </header> <!-- end #inner-header -->

    
    <div class="container-fluid">