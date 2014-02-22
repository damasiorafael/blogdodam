<div class="post-meta the-icons pmeta-alt">

<?php if( !is_page()) { ?>

<span class="post-category">
<?php _e('Posted in&nbsp;', TEMPLATE_DOMAIN); ?>
<?php if( is_home() ) { ?>
<?php echo get_singular_cat(); ?>
<?php } else { ?><?php the_category(', ') ?><?php } ?>
</span>


<span class="post-author"><?php _e('by', TEMPLATE_DOMAIN); ?> <?php the_author_posts_link(); ?> </span>
<span class="post-time"><?php _e('on', TEMPLATE_DOMAIN); ?> <?php the_time('d F Y') ?></span>



<?php if( has_tag() && ( is_single() || is_archive() ) ) { ?>
&nbsp;&nbsp;&nbsp;<span class="post-tags"><?php the_tags(__('Tags:&nbsp;',TEMPLATE_DOMAIN), ', '); ?></span>
<?php } ?>

<?php } //dont show this in pages ?>


<?php if ( comments_open() ) { ?>
<?php if(!is_singular()): ?>
&nbsp;&nbsp;&nbsp;<span class="post-comment"><?php comments_popup_link(__('No Comment',TEMPLATE_DOMAIN), __('One Comment',TEMPLATE_DOMAIN), __('% Comments',TEMPLATE_DOMAIN) ); ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
<?php endif; ?>
<?php } ?>

<?php /*if( !is_singular() ): ?>
<?php if ( function_exists( 'get_wp_post_view' ) ) { $view_count = get_wp_post_view( get_the_ID() ); if(!$view_count) { $view_count = '0 Read'; } elseif( $view_count == '1' ) { $view_count = '1 Read'; } else { $view_count=$view_count. ' Reads'; }?><span class="post-view"><a title="Click here to read <?php the_title(); ?>" href="<?php echo the_permalink(); ?>"> <?php echo $view_count; ?></a></span>
<?php } ?>
<?php endif; */?>


<?php if ( current_user_can('edit_posts') && is_singular() ) { ?>
<span class="post-edit">&nbsp;&nbsp;&nbsp;<?php edit_post_link(__('Edit',TEMPLATE_DOMAIN)); ?></span>
<?php } ?>

</div>