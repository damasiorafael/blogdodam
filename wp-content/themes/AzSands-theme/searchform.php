<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div>
	<input type="text" value="enter search text here..." name="s" id="s" onfocus="if (this.value == 'enter search text here...') {this.value = '';}"
	onblur="if (this.value == '') {this.value = 'enter search text here...';}" />
	<input type="submit" id="searchsubmit" value="Go" />
</div>
</form>