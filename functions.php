<?php
/**
 * _s functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package _s
 */

if ( ! function_exists( '_s_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function _s_setup() {
		
		/****************************************
		Define Child Theme Definitions
		*****************************************/
		define( 'THEME_DIR', get_template_directory() );
		define( 'THEME_URL', get_template_directory_uri() );
		define( 'THEME_LANG', THEME_URL . '/languages' );
		define( 'THEME_ASSETS', THEME_URL . '/assets' );
		define( 'THEME_LIB', THEME_URL . '/lib' );
		define( 'THEME_CSS', THEME_ASSETS . '/css' );
		define( 'THEME_IMG', THEME_ASSETS . '/images' );
		define( 'THEME_JS', THEME_ASSETS . '/scripts' );
		
		
		define( 'THEME_NAME', sanitize_title( wp_get_theme() ) );
		define( 'THEME_VERSION', '1.0' );	
		
		
		/**
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on _s, use a find and replace
		 * to change '_s' to the name of your theme in all the template files.
		 * You will also need to update the Gulpfile with the new text domain
		 * and matching destination POT file.
		 */
		load_theme_textdomain( '_s', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/**
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary Menu', '_s' ),
			'mobile'  => esc_html__( 'Optional Mobile Menu', '_s' ),
		) );

		/**
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		
		/****************************************
		Include WordPress Cleanup functions
		*****************************************/
		include( THEME_DIR . '/lib/wp-cleanup.php' );
		
		
		/****************************************
		Theme Settings
		*****************************************/
		
		include( THEME_DIR . '/lib/theme-settings.php' );
		
		
		/****************************************
		Theme Functions
		*****************************************/
		
		include( THEME_DIR . '/lib/functions/init.php' );


		/****************************************
		Theme Post Types
		*****************************************/
		
		include( THEME_DIR . '/lib/functions/post-types.php' );

		/****************************************
		Theme Taxonomy
		*****************************************/
		
		include( THEME_DIR . '/lib/functions/taxonomy.php' );

		/****************************************
		Theme Ajax
		*****************************************/
		
		include( THEME_DIR . '/lib/functions/ajax.php' );


		/****************************************
		Theme Mobile Detect
		*****************************************/
		
		include( THEME_DIR . '/lib/functions/mobile_detect.php' );

	}
endif; // _s_setup




add_action ('wp_footer','fa_trackers');

function fa_trackers() {

echo <<< EOT
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '160580954364145'); // Insert your pixel ID here.
fbq('track', 'PageView');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=160580954364145&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-44281803-7', 'auto');
  ga('send', 'pageview');

</script>

EOT;
}


add_action( 'after_setup_theme', '_s_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function _s_content_width() {
	$GLOBALS['content_width'] = apply_filters( '_s_content_width', 640 );
}
add_action( 'after_setup_theme', '_s_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function _s_widgets_init() {

	// Define sidebars.
	$sidebars = array(
		'sidebar-1'  => esc_html__( 'Sidebar 1', '_s' ),
		// 'sidebar-2'  => esc_html__( 'Sidebar 2', '_s' ),
		// 'sidebar-3'  => esc_html__( 'Sidebar 3', '_s' ),
	);

	// Loop through each sidebar and register.
	foreach ( $sidebars as $sidebar_id => $sidebar_name ) {
		register_sidebar( array(
			'name'          => $sidebar_name,
			'id'            => $sidebar_id,
			'description'   => sprintf( esc_html__( 'Widget area for %s', '_s' ), $sidebar_name ),
			'before_widget' => '<aside class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

}
add_action( 'widgets_init', '_s_widgets_init' );



  /**
     * Add mobile detect to body classes
     *
     * @param Object $classes
     * @return void
     */


function add_body_classes( $classes ) {

  $detect = new Mobile_Detect;

  if ( $detect->isMobile() ) {
    $classes[] = 'is-mobile';
  } 
 
 // if ($detect->isMobile() && $detect->isTablet()) {
 //   $classes[] = 'is-tablet';
 // } 

  if (!$detect->isMobile()) {
    $classes[] = 'is-desktop';
  }

  return $classes;
}
//add_filter( 'post_class', 'category_id_class' );
add_filter( 'body_class', 'add_body_classes' );


add_action('wp_head', 'myplugin_ajaxurl');

function myplugin_ajaxurl() {

   echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}


  /**
     * Add the wp-editor back into WordPress after it was removed in 4.2.2.
     *
     * @param Object $post
     * @return void
     */

/*
if( ! function_exists( 'fix_no_editor_on_posts_page' ) ) {

  
    function fix_no_editor_on_posts_page( $post ) {
        if( isset( $post ) && $post->ID != get_option('page_for_posts') ) {
            return;
        }

        remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
        add_post_type_support( 'page', 'editor' );
    }
    add_action( 'edit_form_after_title', 'fix_no_editor_on_posts_page', 0 );
 }
 */