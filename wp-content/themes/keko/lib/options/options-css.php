<?php
/* options css */
$header_image = get_header_image();
$bg_image = get_background_image();
$bg_color = get_background_color();
?>

<?php if(!$bg_image && !$bg_color): ?>
body{
    background-color: #020410;
	background-attachment: fixed;
	background-image: url('<?php echo get_template_directory_uri(); ?>/images/bg.jpg');
	background-repeat: no-repeat;
	background-position: center center;
    }
<?php endif; ?>


<?php
if( get_theme_option('body_font') == 'Choose a font' || get_theme_option('body_font') == '') { ?>
body { font-family: 'Roboto Light', sans-serif; font-weight: normal; }
.post-meta i { font-family: 'Roboto', sans-serif; font-weight: normal; }
<?php } else { ?>
body { font-family: <?php echo get_theme_option('body_font'); ?> !important; }
<?php } ?>


<?php
if( get_theme_option('headline_font') == 'Choose a font' || get_theme_option('headline_font') == '') { ?>
h1,h2,h3,h4,h5,h6,.header-title,#main-navigation, #featured #featured-title, #cf .tinput, #wp-calendar caption,.flex-caption h1,#portfolio-filter li,.nivo-caption a.read-more,.form-submit #submit,.fbottom,ol.commentlist li div.comment-post-meta, .home-post span.post-category a,ul.tabbernav li a,#container .sidefeat h4 {
font-family: 'Roboto Light', sans-serif; font-weight: normal !important;
}
<?php } else { ?>
h1,h2,h3,h4,h5,h6,.header-title,#main-navigation, #featured #featured-title, #cf .tinput, #wp-calendar caption,.flex-caption h1,#portfolio-filter li,.nivo-caption a.read-more,.form-submit #submit,.fbottom,ol.commentlist li div.comment-post-meta, .home-post span.post-category a,ul.tabbernav li a,#container .sidefeat h4 {
font-family:  <?php echo get_theme_option('headline_font'); ?> !important; }
<?php } ?>


<?php
if( get_theme_option('navigation_font') == 'Choose a font' || get_theme_option('navigation_font') == '') { ?>
#main-navigation, .sf-menu li a {
font-family: 'Roboto Light', sans-serif; font-weight: 300;
}
<?php } else { ?>
#main-navigation, .sf-menu li a { font-family:  <?php echo get_theme_option('navigation_font'); ?> !important; }
<?php } ?>


<?php
if( get_theme_option('global_links_color') != '' ) {
$link_color = get_theme_option('global_links_color');
?>
#custom .post-content a, #commentpost a  {
color: <?php echo $link_color; ?>;
}

#left-sidebar aside li a:hover, #left-sidebar aside div a:hover,.sidefeat h4 a:hover, #left-sidebar .twitterbox a, #left-sidebar #wp-calendar a, #right-sidebar aside li a:hover, #right-sidebar aside div a:hover,#right-sidebar table a,#right-sidebar .twitterbox a, #right-sidebar #wp-calendar a {
color: <?php echo $link_color; ?>;
text-decoration: underline;
}





<?php } ?>


<?php
if( get_theme_option('main_color') != '' ) {
$main_color = get_theme_option('main_color');
?>

#left-sidebar h3.widget-title, #right-sidebar h3.widget-title, ul.tabbernav {
    background-color: <?php echo $main_color; ?>;
}
#post-entry article .post-top {
    background-color: <?php echo $main_color; ?>;
}
#post-entry article div.post-meta {
    background-color: <?php echo dehex($main_color,-20); ?>;
    border-top: 1px solid <?php echo dehex($main_color,20); ?>;
    color: <?php echo dehex($main_color,90); ?>;
}
.post-meta i {
    color: <?php echo dehex($main_color,50); ?>;
}
#custom .post-meta a {
    color: <?php echo dehex($main_color,80); ?> !important;
}

#custom h1.post-title a:hover {
    color: <?php echo dehex($main_color,70); ?> !important;
}

ul.tabbernav li.tabberactive a,ul.tabbernav li.tabberactive a:hover {
    color: <?php echo $main_color; ?> !important;
}

<?php } ?>


<?php
if( get_theme_option('footer_headline_color') != '' ) {
$footer_headline_color = get_theme_option('footer_headline_color');
?>

.ftop h3.widget-title { color: <?php echo $footer_headline_color; ?>; }

<?php } ?>
