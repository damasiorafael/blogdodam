<div class="sidebar">


	<div class="about-me">

		<div class="about-me-content">
			<!--img src="wp-content/themes/darkoOo-theme/images/me.gif" alt="About me" /-->
			<h3>About Me</h3>
			<p>Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Quisque sed felis. Aliquam sit amet felis.
			Maur is semper, velit semper laoreet dictum, quam. Maur is eu wisi. <a href="http://your-about-page.html">Read more...</a></p>
		</div>

	</div>


	<div class="advertising">
		<h3>Advertising</h3>
		<p>
			<img src="wp-content/themes/AzSands-theme/images/advertising.gif" alt="Advertising" />
			<img src="wp-content/themes/AzSands-theme/images/advertising.gif" alt="Advertising" />
			<img src="wp-content/themes/AzSands-theme/images/advertising.gif" alt="Advertising" />
			<img src="wp-content/themes/AzSands-theme/images/advertising.gif" alt="Advertising" />
		</p>
	</div>


	<div id="search">

			<h2>Search</h2>

				<?php include(TEMPLATEPATH .'/searchform.php'); ?>
	</div>



	<ul>

		<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>


		<!--li id="calendar"><h2><?php _e('Calendar'); ?></h2>
			<?php get_calendar(); ?>
		</li-->



			<h2>Categories</h2>
			<ul>
				<?php wp_list_cats(); ?>
			</ul>




			<h2>Archives</h2>
			<ul>
				<?php wp_get_archives('type=monthly'); ?>
			</ul>


			<h2>Pages</h2>
			<ul>
				<?php wp_list_pages('title_li='); ?>
			</ul>


		<?php endif; ?>

	</ul>

</div>
