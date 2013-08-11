<div class="searchform">
	<form action="/" method="get">
	    <fieldset>
	        <label for="search">Suchbegriff eingeben:</label>
	        <input type="text" name="s" id="search" placeholder="Suchbegriff + Enter" value="<?php the_search_query(); ?>" />
	        <?php /* <input type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/images/search.png" /> */ ?>
	        <button><i class="icon-search"></i> <span>suchen</span></button>
	    </fieldset>
	</form>
</div>