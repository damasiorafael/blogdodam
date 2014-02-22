</div>
<!-- end content -->
</div>
<!-- end container -->
</div>
<!-- end wrap -->
</div>
<!-- end #body-inner -->

<!-- footer-wrap -->
<div id="footer-wrap">
<div id="footer">
<div class="innerwrap">

<div class="footer-content">

<div class="fbar">
<ul class="footer_list">
<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
<?php else: ?>
<li id="most-commented">
<h3><?php _e('Most Commented',TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php get_hot_topics(5); ?>
</ul>
</li>
<?php endif; ?>
</ul>
</div>


<div class="fbar">
<ul class="footer_list">
<?php if ( is_active_sidebar( 'second-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'second-footer-widget-area' ); ?>
<?php else: ?>
<li id="random-entries">
<h3><?php _e('Random Articles',TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php get_random_topics(5); ?>
</ul>
</li>
<?php endif; ?>
</ul>
</div>


<div class="fbar">
<ul class="footer_list">

<?php if ( is_active_sidebar( 'third-footer-widget-area' ) ) : ?>
<?php dynamic_sidebar( 'third-footer-widget-area' ); ?>
<?php else: ?>

<?php $the_cat_slug = get_theme_option('footer_featured'); ?>
<?php if(($the_cat_slug == '') || ($the_cat_slug == 'Choose a category:')){ ?>
<li class="widget widget_recent_entries">
<h3 class="widget-title"><?php _e('Recent Posts', TEMPLATE_DOMAIN); ?></h3>
<ul><?php wp_get_archives('type=postbypost&limit=5'); ?></ul>
</li>
<?php } else { ?>
<li class="widget widget_recent_entries">
<h3><?php _e('Recently in', TEMPLATE_DOMAIN); ?> <?php echo stripcslashes($the_cat_slug); ?></h3>
<ul>
<?php
$my_query = new WP_Query('category_name='. $the_cat_slug . '&' . 'showposts=' . 5);
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$the_post_ids = get_the_ID();
?>
<li><?php the_title(); ?><br /><em><a href="<?php the_permalink(); ?>"><?php _e('Click here to read more &rarr;',TEMPLATE_DOMAIN); ?></a></em></li>
<?php endwhile; ?>
</ul>
</li>
<?php } ?>
<?php endif; ?>

</ul>

</div>
</div>

</div>
</div>
</div>
<!-- end footer-wrap -->

<!-- footer-out -->
<div id="footer-out">
<div class="innerwrap">
<div class="alignleft">
<?php _e('Copyright', TEMPLATE_DOMAIN); ?> &copy;<?php echo gmdate('Y'); ?> <a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a>
<br />
</div>
<div class="alignright"><a title="WordPress, BuddyPress and BBPress Expert Developer" href="http://www.mkels.com">Free WordPress Theme</a> by Mkels</div>
</div>
</div>
<!-- end footer-out -->

<?php wp_footer(); ?>

<?php $g_analyst = get_option('tn_keko_google_analystic'); echo stripcslashes($g_analyst); ?>

</body>
</html>