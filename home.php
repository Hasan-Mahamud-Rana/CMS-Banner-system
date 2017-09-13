<?php
/*
Template Name: Home
*/
get_header(); ?>
<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Open+Sans);
body {background: #f6f6f6;}article {background: #fff;padding: 4px 20px;margin-bottom: 8px}p.byline {font-size: 11px;font-family: 'Open Sans';	color: #999999;	text-transform: uppercase;line-height: 2.182;	text-align: left;	margin-bottom: 0;}h2 a{	font-size: 25px;font-family: 'Open Sans';color: #000;line-height: 1.5;text-align: left;text-transform: uppercase;}p {font-size: 16px; font-family: 'Open Sans';}</style>
<?php
echo '<div id="content" class="row">';
	echo '<main id="main" class="small-12 columns" role="main">';
	if (have_posts()) : while (have_posts()) : the_post();
	get_template_part( 'parts/loop', 'archive' );
	endwhile;
	joints_page_navi();
	else :
	get_template_part( 'parts/content', 'missing' );
	endif;
echo '</main></div>';

$post_id = $_GET['postID'];
$globalClickTag = get_field( "global_click_tag", $post_id);

if( $globalClickTag ):
	$count = (int) get_field('global_clicktag_click', $post_id);
	$count++;
	update_field('global_clicktag_click', $count, $post_id);
else:
	$slideNumber = $_GET['slideNumber'];
	$rowNumber = (int) $slideNumber - 1;
	$rows = get_field('slides', $post_id );
	$which_row = $rows[$rowNumber];
	$slideClicked = $which_row['slide_click'];
	$slideClicked = (int) $slideClicked + 1;
	update_sub_field( array('slides', $slideNumber, 'slide_click'), $slideClicked, $post_id);
endif;
get_footer();
?>