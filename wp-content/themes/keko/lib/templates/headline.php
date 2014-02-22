<?php $paged = get_query_var('paged'); ?>

<?php if (is_category()) { ?>

<h2 id="post-header">Archives for <?php single_cat_title(); ?></h2>

<?php } else if (is_tag()) { ?>

<h2 id="post-header">Tag archives for <?php single_cat_title(); ?></h2>

<?php } else if (is_archive()) { ?>

<h2 id="post-header">
<?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
<?php /* If this is a category archive */ if (is_day()) { ?>
Archives for <?php the_time('F jS, Y'); ?>
<?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
Archives for <?php the_time('F, Y'); ?>
<?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
Archives for <?php the_time('Y'); ?>
<?php } ?>
</h2>

<?php } else if (is_single()) { ?>

<?php } else if (is_search()) { ?>

<h2 id="post-header">Search result for &quot; <?php the_search_query(); ?> &quot;</h2>

<?php } else if ((is_home()) && ($paged < 1)) { ?>

<h2 id="post-header">LATEST ARTICLES</h2>

<?php } else if ((is_home()) && ($paged > 1)) { ?>

<h2 id="post-header">OLDER ARTICLES</h2>

<?php } ?>