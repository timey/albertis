<?php /*Template Name: Search Form */ ?>

  	<!--BEGIN #searchform-->
 
<form class="searchform" method="get" action="<?php bloginfo( 'url' ); ?>">
	<input class="search" name="s" onclick="this.value=''" type="text" value="Suche..." 
	onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" tabindex="1" />
<!--END #searchform-->
</form>