
	<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
		<label>
			<span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'courage' ); ?></span>
			<input type="search" class="search-field" placeholder="<?php _e( 'Search &hellip;', 'courage' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
		</label>
		<button type="submit" class="search-submit">
			<span class="genericon-search"></span>
		</button>
	</form>
