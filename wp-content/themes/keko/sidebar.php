<!-- sidebar -->
<div id="sidebar">
<ul class="sidebar_list">

<li id="rss-feeds"><h3><?php _e('RSS Feeds', TEMPLATE_DOMAIN); ?></h3>
<ul>
<li><a href="<?php $feed_active = get_theme_option('feedburner'); if($feed_active == '') { ?> <?php bloginfo('rss2_url'); ?> <?php } else { ?> <?php echo stripcslashes($feed_active); ?> <?php } ?>"><strong><?php _e('Post Entries Feeds', TEMPLATE_DOMAIN); ?></strong></a></li>
<li><a href="<?php bloginfo('comments_rss2_url'); ?>"><strong><?php _e('Post Comments Feeds', TEMPLATE_DOMAIN); ?></strong></a></li>
</ul>
</li>

<?php
$get_google_sidebar_code = get_theme_option('adsense_sidebar');
if( $get_google_sidebar_code != '' ) { ?>
<li id="google-ads"><h3><?php _e('Links', TEMPLATE_DOMAIN); ?></h3>
<ul>
<li class="adsense_post"><?php echo stripcslashes($get_google_sidebar_code); ?></li>
</ul>
</li>
<?php } ?>


<?php get_template_part( 'lib/templates/sidebar-ads' ); ?>

<?php $the_cat_sidebar = get_option('tn_keko_sidebar_featured'); ?>
<?php if(($the_cat_sidebar == '') || ($the_cat_sidebar == 'Choose a category:')){ ?>
<?php } else { ?>
<li id="featured-sidebar">
<h3><?php _e('Recently in', TEMPLATE_DOMAIN); ?> <?php echo stripcslashes($the_cat_sidebar); ?></h3>
<ul>
<?php
//insert your category name
$my_query = new WP_Query('category_name='. $the_cat_sidebar . '&' . 'showposts=' . 8);
while ($my_query->have_posts()) : $my_query->the_post();
$do_not_duplicate = $post->ID;
$the_post_ids = get_the_ID();
?>
<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
<?php endwhile;?>
</ul>
</li>
<?php } ?>

<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar')) : ?>
<li class="widget_categories">
<h3><?php _e('Categories', TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php wp_list_categories('orderby=name&show_count=1&title_li='); ?>
</ul>
</li>
<li id="tag_cloud">
<h3><?php _e('Popular Tags', TEMPLATE_DOMAIN); ?></h3>
<div class="widget_tag_cloud">
<?php if(function_exists("wp_tag_cloud")) { ?>
<?php wp_tag_cloud('smallest=8&largest=21&'); ?>
<?php } ?>
</div>
</li>
<li id="gravatar-comments" class="widget_recent_comments">
<h3><?php _e('Recent Comments', TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php get_avatar_recent_comment(6); ?>
</ul>
</li>
<li class="widget_archives">
<h3><?php _e('Archives', TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php wp_get_archives('type=monthly'); ?>
</ul>
</li>
<li class="widget_meta">
<h3><?php _e('Meta', TEMPLATE_DOMAIN); ?></h3>
<ul>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>
</li>
<?php endif; ?>

</ul>
</div>
<!-- end sidebar -->