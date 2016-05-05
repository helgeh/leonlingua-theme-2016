<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">

    <title>
      <?php if ( !is_front_page() ) { echo wp_title( ' ', true, 'left' ); echo ' | '; }
      echo bloginfo( 'name' ); echo ' - '; bloginfo( 'description', 'display' );  ?> 
    </title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php endif; ?>
		<?php wp_head(); ?>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../js/html5shiv.js"></script>
      <script src="../js/respond.min.js"></script>
    <![endif]-->
    <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-42954013-1', 'leonlingua.com');
		  ga('send', 'pageview');
		</script>
	</head>

	<body <?php body_class(); ?>>
	
		<a class="skip-link sr-only" href="#content">'Skip to content'</a>

		<div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a class="brand navbar-brand" id="logo" title="<?php echo get_bloginfo('description'); ?>" href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          
          <?php 
      //     	wp_nav_menu( array(
						// 	'theme_location' => 'primary',
						// 	'menu_class'     => 'nav navbar-nav',
						// ) );
            leonlingua_main_nav();
					?>

          <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="http://builtwithbootstrap.com/" target="_blank">Built With Bootstrap</a></li>
            <li><a href="https://wrapbootstrap.com/?ref=bsw" target="_blank">WrapBootstrap</a></li>
          </ul> -->

        </div>
      </div>
    </div>

		<?php if ( is_front_page()  ) : ?>
		<div class="frontpage_image"> 
			<img src="http://test.leonlingua.com/wp-content/uploads/2013/06/schoolbus.jpg">
		</div>
		<?php endif; ?>

    <div id="content" class="container">
