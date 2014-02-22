<?php if (is_category()) { ?>

<h2 id="post-header"> Sorry the category you looking for had been deleted</h2>

<?php } else if (is_archive()) { ?>

<h2 id="post-header"> Sorry the archive you looking for had been deleted</h2>

<?php } else if (is_search()) { ?>

<h2 id="post-header"> Sorry the search you looking for did not existed</h2>

<?php } else if (is_author()) { ?>

<h2 id="post-header"> Sorry the author you looking for had been deleted</h2>

<?php } else if (is_single()) { ?>

<h2 id="post-header"> Sorry the topic you looking for had been deleted</h2>

<?php } else if (is_home()) { ?>

<h2 id="post-header"> Sorry the post you looking for had been deleted</h2>

<?php } else if (is_404()) { ?>

<h2 id="post-header"> You just encounter our 404 error page</h2>

<?php } ?>