<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title( '|', true, 'right' ); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" type="image/x-icon">
    <?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
    <?php wp_head(); ?>
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){ n.callMethod? n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n; n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0; t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window, document,'script','https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '1250543134977242');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none" src="https://www.facebook.com/tr?id=1250543134977242&ev=PageView&noscript=1" /></noscript>
    <!-- End Facebook Pixel Code -->
</head>
<body <?php body_class(); ?>>

<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" >
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
		</div>
      
		<div class="brand-centered">
			<a class="navbar-brand" href="/">
				<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-aline-lange.png">
			</a>
		</div>
      
		<div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left visible-lg">
                <li><a href="https://www.facebook.com/alinelangeFOTOGRAFIE/" target="_blank"><i class="fab fa-facebook-square"></i></a></li>
                <li><a href="https://pinterest.com/alinelange/" target="_blank"><i class="fab fa-pinterest-square"></i></a></li>
                <li><a href="https://plus.google.com/112133270589428047534/posts/" target="_blank"><i class="fab fa-google-plus-square"></i></a></li>
                <li><a href="https://www.instagram.com/alinelangefotografie/" target="_blank"><i class="fab fa-instagram"></i></a></li>
            </ul>

        	<?php
		        wp_nav_menu( array(	
		        	'menu'				=> 'primary',
		        	'theme_location' 	=> 'primary',
		            'depth' 			=> 2,
		            'container' 		=> false,
		            'menu_class' 		=> 'nav navbar-nav navbar-right',
		            'fallback_cb' 		=> 'wp_page_menu',
					'walker' 			=> new wp_bootstrap_navwalker())
		        );
	        ?>
		</div>
	</div>
</nav>