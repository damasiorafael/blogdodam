<div id="share-articles">
<h4><?php _e('Like This Article? Share it!', TEMPLATE_DOMAIN); ?></h4>

<div class="share-link">
<?php $feed_url = get_option('tn_keko_get_feed'); ?>

<a href="<?php if($feed_url == ''){ ?><?php bloginfo('rss2_url'); ?><?php } else { echo "$feed_url"; } ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/feedrss.gif" alt="subscribes to rss" /></a>

<a href="http://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.gif" alt="add to facebook"/></a>

<a href="http://twitthis.com/twit?url=<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/twitter.gif" alt="tweet this post" /></a>

<a href="http://www.stumbleupon.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/stumble.gif" alt="stumble it" /></a>

<a href="http://digg.com/submit?url=<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/digg.gif" alt="digg it" />
</a>

<a href="http://del.icio.us/post?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/delicious.gif" alt="bookmark it" /></a>

<a href="http://technorati.com/faves?add=<?php the_permalink(); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/technorati.gif" alt="add to technorati" /></a> </div>

</div>