<?php
	get_header();
	if (have_posts()) :
		while (have_posts()) : the_post();
			if(function_exists('PostViews')) :
				PostViews(get_the_ID());
			endif;
			$statistics = $_GET['statistics'];
			if( $statistics ):
				get_template_part( 'parts/loop', 'banner-statistics' );
			else:
				get_template_part( 'parts/loop', 'banner' );
			endif;
		endwhile;
	else :
		get_template_part( 'parts/content', 'missing' );
	endif;
	get_footer();
?>