<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package _s
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page" class="site-container">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', '_s' ); ?></a>
	
	<div class="before-header">
		<div class="column row">
		<?php
		if ( is_active_sidebar( 'before-header' ) ) {
			dynamic_sidebar( 'before-header' );
		} 
		?>
		</div><!-- .column.row -->
	</div>
	<header id="masthead" class="site-header" role="banner">
			
			<div class="site-branding">

				<?php		
				$logo = sprintf('<img src="%s" alt="%s"/>', THEME_IMG .'/logo.svg', get_bloginfo( 'name' ) );
				$site_url = site_url();
				printf('<div class="site-title"><a href="%s" title="%s">%s</a></div>', $site_url, get_bloginfo( 'name' ), $logo );
				?>

			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">

			<?php 
				$detect = new Mobile_Detect;
				if( $detect->isMobile() ):
					$phone_appleton = '<a href="tel:920-931-0022"><phone><img src="' . get_template_directory_uri() .'/assets/images/phone.svg" alt="Call Us">920-931-0022</phone></a>';
					$phone_neenah = '<a href="tel:920-931-0022"><phone><img src="' . get_template_directory_uri() . '/assets/images/phone.svg" alt="Call Us">920-725-4100</phone></a>';
				else:
					$phone_appleton ='<phone><img src="' . get_template_directory_uri() . '/assets/images/phone.svg" alt="Call Us">920-931-0022</phone>';
					$phone_neenah = '<phone><img src="' . get_template_directory_uri() . '/assets/images/phone.svg" alt="Call Us">920-931-0022</phone>';					
				endif;

			?>

			<div class="location">
				<div class="info">
					<span>APPLETON</span>
					<address>5601 W. Grande Market Ste C<br />Appleton, WI  54913</address>

				</div>


				<div class="contact">
					<?php echo $phone_appleton; ?>
					<!--<div class="directions"><a href="https://www.google.ca/maps/place/5601+W+Grande+Market+Dr+c,+Appleton,+WI+54913,+USA/@44.2636195,-88.4948845,17z/data=!3m1!4b1!4m5!3m4!1s0x8803c83bc91656d7:0xc0dbdaa014495896!8m2!3d44.2636195!4d-88.4926958">GET DIRECTIONS</a></div>-->
				</div>
			</div>

			<div class="location">
				<div class="info">
					<span>NEENAH</span>
					<address>188 Rockwood Lane<br />Neenah, WI 54956</address>					
				</div>

				<div class="contact">				
					<?php echo $phone_neenah; ?>
					<!--<div class="directions"><a href="https://www.google.ca/maps/place/188+Rockwood+Ln,+Neenah,+WI+54956,+USA/@44.189199,-88.5082127,17z/data=!3m1!4b1!4m5!3m4!1s0x8803c7104c22b023:0x19732846817b047e!8m2!3d44.189199!4d-88.506024">GET DIRECTIONS</a></div>-->
				</div>
			</div>


					<?php

					/*
					<div class="wrap">
						wp_nav_menu( array(
							'theme_location' => 'primary',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'menu dropdown',
							'link_before'	 => '<span>',
							'link_after'	 => '</span>'
						) );
					</div>
					*/
					?>
				
			</nav><!-- #site-navigation -->

	</header><!-- #masthead -->
	
	<div class="after-header">
		
		<div class="column row">
		<?php
		if ( is_active_sidebar( 'after-header' ) ) {
			dynamic_sidebar( 'after-header' );
		}
		?>
		</div><!-- .column.row -->
		
	</div>

	<div id="content" class="site-content">
