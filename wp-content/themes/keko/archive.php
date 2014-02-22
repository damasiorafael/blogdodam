<?php get_header(); ?>

<!-- post-entry -->
<div id="post-entry">

<?php $postcount = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- START POST -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="post-meta">
<div class="flag"></div>
<div class="meta-title">
<div class="middle">
<h1 class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Read full post of ', TEMPLATE_DOMAIN); ?><?php the_title(); ?>"><?php the_title(); ?></a></h1>
</div>
</div>
<div class="meta-date">
<small><?php the_time('j'); ?></small><br /><?php the_time('M'); ?>
</div>
</div>


<div class="post-author"><strong><?php _e('Posted by', TEMPLATE_DOMAIN); ?></strong> <?php the_author_posts_link(); ?><strong><?php _e(' under', TEMPLATE_DOMAIN); ?></strong> <?php the_category(', ') ?></div>



<div class="post-content">

<?php the_excerpt(); ?>
<?php wp_link_pages('before=<p>&after=</p>'); ?>

<?php get_template_part( 'lib/templates/share' ); ?>

<?php
$get_google_code = get_theme_option('adsense_post');
if( $get_google_code != '' ) { ?>
<?php if( $postcount == 1 || $postcount == 2 ){ ?>
<div class="adsense_post"><?php echo stripcslashes($get_google_code); ?></div>
<?php } ?>
<?php } ?>

</div>


<?php if(!is_search() && !is_page()) { ?>
<div class="post-author">
<?php if(function_exists("the_tags")) : ?>
<div class="meta-left">
<?php the_tags(__('<strong>Tags:</strong>&nbsp;', TEMPLATE_DOMAIN), ', ', ''); ?>
</div>
<?php endif; ?>

<?php if ( comments_open() ) { ?>
<div class="meta-right">
<strong><?php comments_popup_link(__('Comments (0)', TEMPLATE_DOMAIN), __('Comments (1)', TEMPLATE_DOMAIN), __('Comments (%)', TEMPLATE_DOMAIN)); ?></strong>
</div>
<?php } ?>

</div>
<?php } ?>

</div>

<?php $postcount++; endwhile; ?>

<?php comments_template('',true); ?>

<?php get_template_part( 'lib/templates/paginate' ); ?>

<?php endif; ?>

</div>
<!-- end post-entry -->

<?php get_sidebar(); ?>

<?php get_footer(); ?>