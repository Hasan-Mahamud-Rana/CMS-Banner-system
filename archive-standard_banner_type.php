<?php
	get_header();
?>
<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Open+Sans);
body {background: #f6f6f6;}article {background: #fff;padding: 4px 20px;margin-bottom: 8px}p.byline {font-size: 11px;font-family: 'Open Sans';	color: #999999;	text-transform: uppercase;line-height: 2.182;	text-align: left;	margin-bottom: 0;}h4 a{	font-size: 17px;font-family: 'Open Sans';color: #000;line-height: 1.5;text-align: left;text-transform: uppercase;}</style>
<?php
echo '<div id="content">';
	echo '<div id="inner-content" class="row">';
		echo '<main id="main" class="large-12 medium-12 columns" role="main">';
		if (have_posts()) : while (have_posts()) : the_post();
		get_template_part( 'parts/loop', 'banner-archive' );
		endwhile;
		joints_page_navi();
		else :
		get_template_part( 'parts/content', 'missing' );
		endif;
		echo '</main>';
		//get_sidebar();
	echo '</div>';
echo '</div>';
get_footer();
?>