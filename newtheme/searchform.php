<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<input type="text" class="search_box" size="20" name="s" id="s" value="<?php _e('Search') ?>..."  onblur="if(this.value=='') this.value='<?php _e('Search') ?>...';" onfocus="if(this.value=='<?php _e('Search') ?>...') this.value='';"/>
<input type="hidden" name="post_type" value="fitness_product" />
<input type="submit" value="Submit" />
</form>
