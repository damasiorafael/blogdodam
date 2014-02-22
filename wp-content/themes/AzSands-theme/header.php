<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">

	<title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->


        <link rel="stylesheet" href="css/lightbox.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

	<?php wp_get_archives('type=monthly&format=link'); ?>
	<?php //comments_popup_script(); // off by default ?>
	<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); wp_head(); ?>

</head>


<body>


	<div id="header">

		<div id="header-content">

			<div class="blog-title">
				<h1>{ <a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a> }</h1>
				<h3><?php bloginfo('description'); ?></h3>
			</div>

		</div>

	</div>


	<div id="wrapper">


		<div id="menu">

			<div class="menu-titles">
			<h2>
				<a href="<?php bloginfo('url'); ?>">HOME</a>
				<a href="<?php bloginfo('url'); ?>">BLOG</a>
				<a href="<?php bloginfo('url'); ?>">ABOUT</a>
				<a href="<?php bloginfo('url'); ?>">CONTACT</a>
			</h2>
			</div>

			<div class="social">

				<div class="rss"></div>
				<a href="http://your-rss-feed-link.html">Rss feed</a>
				<div class="twitter"></div>
				<a href="http://your-twitter-link.html">Follow me</a>
			</div>

		</div>



