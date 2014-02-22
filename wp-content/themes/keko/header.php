<!DOCTYPE html>
<!--[if lt IE 7 ]>	<html lang="en" class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>		<html lang="en" class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>		<html lang="en" class="no-js ie8"> <![endif]-->
<!--[if IE 9 ]>		<html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>

<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="HandheldFriendly" content="true">

<link rel="profile" href="http://gmpg.org/xfn/11">

<?php get_template_part ( '/lib/options/options-var' ); ?>
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<?php if( function_exists('theme_custom_google_font')) { echo theme_custom_google_font(); } ?>
<!-- favicon.ico location -->
<?php
global $shortname, $option_upload_path, $option_upload_url;
if( file_exists( $option_upload_path . '/' . $shortname . '_fav_icon.jpg' ) ) { ?>
<link rel="icon" href="<?php echo $option_upload_url . '/' . $shortname . '_fav_icon.jpg'; ?>" type="images/x-icon" />
<?php } ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>

<?php print "<style type='text/css' media='all'>"; ?>
<?php get_template_part ( '/lib/options/options-css' ); ?>
<?php print "</style>"; ?>

<?php if( get_theme_option('social_on') == 'Yes' ): ?>
<script type="text/javascript" src="http://s7.addthis.com/js/250/addthis_widget.js"></script>
<?php endif; ?>

</head>

<body <?php body_class(); ?> id="custom">

<div id="body-inner">

<!-- header-home -->
<div id="header-home">
<div class="innerwrap">

<div id="header">

<div id="site-title">
<?php
global $shortname, $option_upload_path, $option_upload_url;
if( file_exists( $option_upload_path . '/' . $shortname . '_header_logo.jpg' ) ) { ?>
<a href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo('name'); ?>"><img src="<?php echo $option_upload_url . '/' . $shortname . '_header_logo.jpg'; ?>" alt="<?php bloginfo('name'); ?>" /></a>
<?php } else { ?>
<?php if( get_theme_option('custom_header_title') ): ?>
<h1 class="custom-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php echo stripcslashes( get_theme_option('custom_header_title') ); ?></a></h1><p id="site-description"><?php echo stripcslashes( get_theme_option('custom_header_text') ); ?></p>
<?php else: ?>
<h1><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1><p id="site-description"><?php bloginfo( 'description' ); ?></p>
<?php endif; ?>
<?php } ?>
</div><!-- SITE-TITLE END -->


<?php locate_template( array('searchform.php'), true ); ?>

</div>


<nav id="main-navigation">
<?php if ( function_exists( 'wp_nav_menu' ) ) { ?>
<?php wp_nav_menu( array('theme_location' => 'main-nav', 'menu_id' => '', 'container' => '', 'container_id' => '', 'fallback_cb' => 'revert_wp_menu_page')); ?>
<?php } ?>
<div id="mobile-nav">
<?php get_mobile_navigation( $type='top', $nav_name="main-nav" ); ?>
</div>
</nav>

<div class="shadow"></div>

<?php if( get_header_image() ): ?>
<div id="header-img"><img src="<?php echo header_image(); ?>" alt="" /></div>
<?php endif; ?>


</div>
</div>
<!-- end header-home -->


<div id="wrap">
<div id="container">
<div class="content">

<?php get_template_part( 'lib/templates/breadcrumbs' ); ?>