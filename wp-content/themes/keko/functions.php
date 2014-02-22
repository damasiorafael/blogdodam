<?php
define('TEMPLATE_DOMAIN', 'keko');
define('REMOVE_UNWATED_ADD', 'yes');

////////////////////////////////////////////////////////////////////////////////
// load text domain
////////////////////////////////////////////////////////////////////////////////
load_theme_textdomain( TEMPLATE_DOMAIN, get_template_directory() . '/languages' );

////////////////////////////////////////////////////////////////////////////////
// new thumbnail code for wp 2.9+
////////////////////////////////////////////////////////////////////////////////
if ( function_exists( 'add_theme_support' ) ) {

// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();
// Adds RSS feed links to <head> for posts and comments.
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
add_image_size( 'featured-post-img', 480, 280, true );
add_image_size( 'featured-slider-img', 750, 450, true );
add_image_size( 'folio-1-col', 1024, 380, true );
add_image_size( 'folio-2-col', 480, 280, true );
add_image_size( 'folio-3-col', 350, 350, true );
add_image_size( 'folio-4-col', 250, 250, true );
// new nav menus for wp 3.0
add_theme_support( 'menus' );
// This theme uses wp_nav_menu() in one location.
register_nav_menus( array(
'main-nav' => __( 'Main Navigation', TEMPLATE_DOMAIN )
) );


if( REMOVE_UNWATED_ADD != 'yes' ) {
// Add support for custom background
$custom_background_support = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);
add_theme_support( 'custom-background', $custom_background_support );
}

// Add support for custom headers
$custom_header_support = array(
// The default header text color.
		'default-text-color' => '',
        'default-image' => get_template_directory_uri() . '/images/default.jpg',
        'header-text'  => false,
		// The height and width of our custom header.
		'width' => 1280,
		'height' => 150,
		// Support flexible heights.
		'flex-height' => true,
		// Random image rotation by default.
	   'random-default'	=> false,
		// Callback for styling the header.
		'wp-head-callback' => '',
		// Callback for styling the header preview in the admin.
		'admin-head-callback' => '',
		// Callback used to display the header preview in the admin.
		'admin-preview-callback' => '',
);
add_theme_support( 'custom-header', $custom_header_support );

if ( ! isset( $content_width ) ) $content_width = 550;


function revert_wp_menu_page($args) {
global $bp;
$pages_args = array(
		'depth'      => 0,
		'echo'       => false,
		'exclude'    => '',
		'title_li'   => ''
	);
$menu = wp_page_menu( $pages_args );
$menu = str_replace( array( '<div class="menu"><ul>', '</ul></div>' ), array( '<ul>', '</ul>' ), $menu );
echo $menu;
 ?>
<?php }

function revert_wp_menu_cat() {
global $bp;
$menu = wp_list_categories('orderby=name&show_count=0&title_li=');
return $menu;
 ?>
<?php }


if ( !function_exists( 'wp_dtheme_page_menu_args' ) ) :
function wp_dtheme_page_menu_args( $args ) {
$args['show_home'] = true; return $args; }
add_filter( 'wp_page_menu_args', 'wp_dtheme_page_menu_args' );
endif;

}



///////////////////////////////////////////////////////////////////////////////
// Load Theme Styles and Javascripts
///////////////////////////////////////////////////////////////////////////////
/*---------------------------load styles--------------------------------------*/
if ( ! function_exists( 'theme_load_styles' ) ) :
function theme_load_styles() {
global $theme_version,$is_IE; if(!$theme_version) $theme_version = '1.0';

/*load font awesome */
wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/lib/scripts/fontawesome/css/font-awesome.css', array(), $theme_version );
if($is_IE):
wp_enqueue_style( 'font-awesome-ie7', get_template_directory_uri() . '/lib/scripts/fontawesome/css/font-awesome-ie7.css', array(), $theme_version );
endif;

/* load custom style */
if( file_exists( get_template_directory() . '/lib/styles/custom.css' ) ):
wp_enqueue_style( 'custom-css', get_template_directory_uri() . '/lib/styles/custom.css', array(), $theme_version );
endif;
?>

<style type='text/css' media='all'>
@font-face {
  font-family: 'FontAwesome';
  src: url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.eot');
  src: url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.eot?#iefix') format('eot'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.woff') format('woff'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.ttf') format('truetype'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.otf') format('opentype'), url('<?php echo get_template_directory_uri(); ?>/lib/scripts/fontawesome/font/fontawesome-webfont.svg#FontAwesome') format('svg');
  font-weight: normal;
  font-style: normal;
}
</style>

<?php
}
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_styles' );

/*---------------------------load js scripts--------------------------------------*/
if ( ! function_exists( 'theme_load_scripts' ) ) :
function theme_load_scripts() {
global $theme_version; if(!$theme_version) $theme_version = '1.0';
wp_enqueue_script("jquery");
wp_enqueue_script('hoverIntent');
wp_enqueue_script('jquery-ui-core');
wp_enqueue_script('modernizr', get_template_directory_uri() . '/lib/scripts/modernizr/modernizr.js', array("jquery"),$theme_version );
if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php }
endif;
add_action( 'wp_enqueue_scripts', 'theme_load_scripts' );



////////////////////////////////////////////////////////////
// INCLUDES TEMPLATES
/////////////////////////////////////////////////////////////
include( get_template_directory() . '/lib/functions/theme-functions.php' );
include( get_template_directory() . '/lib/functions/option-functions.php' );
include( get_template_directory() . '/lib/functions/widget-functions.php' );



?>