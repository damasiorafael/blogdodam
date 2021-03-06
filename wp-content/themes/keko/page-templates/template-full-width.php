<?php
/*
Template Name: Full Width
*/
?>

<?php get_header(); ?>

<div class="single-page full-width" id="post-entry">

<?php $postcount = 1; if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- START POST -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<div class="post-meta">
<div class="flag"></div>
<div class="meta-title">
<div class="middle">
<h1 class="post-title page-title"><?php the_title(); ?></h1>
</div>
</div>
</div>

<div class="post-content">
<?php the_content( __('...Continue Reading &raquo;', TEMPLATE_DOMAIN) ); ?>
<?php wp_link_pages('before=<div id="post-navigator"><div class="wp-pagenavi">&after=</div></div>'); ?>
</div>

</div>
<!-- END POST -->

<?php $postcount++; endwhile; ?>

<?php comments_template('',true); ?>

<?php endif; ?>

</div>

<?php get_footer(); ?>