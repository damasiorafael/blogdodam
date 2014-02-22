<?php get_header(); ?>


<div id="container">
	<?php if(have_posts()) : ?><?php while(have_posts()) : the_post();?>

	<div class="post" id="post-<?php the_ID(); ?>">


		<div class="title-date-comments">

			<div class="title-and-date">

				<h2 class="post-title"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="post-date">
					<span><?php _e('Published on'); ?> <?php the_time('F j, Y'); ?></span>
				</div>

			</div>

			<div class="comments-number">
				<?php comments_number('0', '1', '%'); ?>
			</div>

		</div>


		<div class="entry">

			<?php the_content(); ?>

			<?php link_pages('<p><strong>Pages:</strong> ', '</p>', 'number'); ?>

			<p class="postmetadata">
<?php _e('Posted in&#58;'); ?> <?php the_category(', ') ?> <?php _e('by'); ?> <?php  the_author(); ?> <?php the_tags( 'Tags: ', ', ', ''); ?> <?php edit_post_link('Edit', ' &#124; ', ''); ?>
				</p>

		</div>

		<!--div class="comments-template"-->
			<?php comments_template(); ?>
		<!--/div-->


	</div>

	<?php endwhile; ?>


	<!--div class="navigation">

		<?php previous_post_link('&laquo; %link') ?> <br/><br/> <?php next_post_link(' %link &raquo;') ?>

	</div-->


	<?php else : ?>

		<div class="post">
			<h2><?php _e('Not Found'); ?></h2>
		</div>


	<?php endif; ?>
</div>


<?php get_sidebar(); ?>

<?php get_footer(); ?>

</div>
</body>
</html>