<!doctype html>
<?php global $brew_options;?>
<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<?php // Google Chrome Frame for IE ?>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php if (is_front_page()) { bloginfo('name'); } else { wp_title(''); } ?></title>

		<?php // mobile meta (hooray!) ?>
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
		<link rel="apple-touch-icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png?v=2">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<?php // or, set /favicon.ico for IE10 win ?>
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_stylesheet_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link href='http://fonts.googleapis.com/css?family=Satisfy' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDGRI_lIjdk4SfPEB_BvySlHCwAaPPYT2Y&sensor=FALSE"></script>
		<?php // wordpress head functions ?>
		<?php wp_head(); ?>
		<?php // end of wordpress head ?>

		<?php // drop Google Analytics Here ?>
		<?php // end analytics ?>

	</head>

	<body <?php body_class(); ?>>

    <header class="header">

      <nav role="navigation">
        <div class="navbar navbar-fixed-top navbar-inverse">
          <div class="container">
            <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            <?php if ( ( '' != $brew_options['site_logo']['url'] ) ) {
					$logo_url = $brew_options['site_logo']['url'];
					$site_url = get_bloginfo('url');
					$site_name = get_bloginfo('name');
					$site_description = get_bloginfo('description');
				if ( is_ssl() ) $logo_url = str_replace( 'http://', 'https://', $logo_url );
					echo '<a class="navbar-brand logo" href="' . esc_url( $site_url ) . '" title="' . esc_attr( $site_description ) . '"><img class="img-responsive" src="'.$brew_options['site_logo']['url'].'" alt="'.esc_attr($site_name).'"/></a>' . "\n";
				} // End IF Statement */
			?>
            </div>

            <div class="navbar-collapse collapse navbar-responsive-collapse">
            	
              		
              		<?php secondary_nav(); ?>
              	
            </div>
            <div class="search navbar-inverse">
		      	<div class="row">
		      		<div class="col-md-9 col-md-offset-3">
						<form method="get" class="search-form" action="<?php echo get_bloginfo('url');?>" role="search">
						    <div class="input-group">
						      <input type="text" name="s" class="form-control">
						      <span class="input-group-btn">
						        <button class="btn btn-primary" type="button">Search</button>
						      </span>
						    </div><!-- /input-group -->
						</form>
					</div>
				</div>
			</div>
          </div>
        </div> 
      	</nav>
      
</header> <?php // end header ?>
