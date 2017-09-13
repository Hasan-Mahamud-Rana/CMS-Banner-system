<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Open+Sans);
body {background: #f6f6f6;font-family: 'Open Sans';}article {background: #fff;padding: 4px 20px;margin-bottom: 8px}a.back {font-size: 11px;font-family: 'Open Sans';	color: #999999;	text-transform: uppercase;line-height: 2.182;	text-align: left;	margin-bottom: 0;}h2{ margin: 1em 0 .5em 0;}h2, h4{	font-size: 25px;font-family: 'Open Sans';color: #000;line-height: 1.5;text-align: left;text-transform: uppercase;}p {font-size: 15px; font-family: 'Open Sans';} span#totalView {display: inline-block; float: right;font-size: 90px;color:#515151;    line-height: 1;}h4{	font-size: 18px;text-align: right;}table {font-size: 13px;}</style>
<?php

function limit_text($text, $limit) {
	if (str_word_count($text, 0) > $limit) {
		$words = str_word_count($text, 2);
		$pos = array_keys($words);
		$text = substr($text, 0, $pos[$limit]) . '...';
	}
	return $text;
}
$post_id = get_the_ID();
$totalView = get_PostViews($post_id);
echo '<div class="row">';
	echo '<div class="small-12 columns">';
		the_title('<h2>','</h2>');
	echo '</div>';
	echo '<div class="small-12 medium-6 large-6 columns">';
		the_content();
		$slogan = get_field( "slogan" );
		the_excerpt();
	echo '</div>';
	echo '<div class="small-12 medium-6 large-6 columns text-right">';
		echo '<h4>Total View</h4>';
		echo '<span id="totalView" count-up end-val="'. $totalView .'">'. $totalView .'</span>';
	echo '</div>';
	echo '<div class="small-12 columns">';
		$globalClickTag = get_field( "global_click_tag" );
		$globalClickTagClicked = get_field('global_clicktag_click', $post_id);
		if( $globalClickTag ):
		echo '<table class="hover"><thead><tr><th></th><th>Link (url)</th><th>Total Click</th></tr></thead><tbody>';
		echo '<tr><td>Global clickTag</thd><td><a href="' . $globalClickTag . '" rel="bookmark" title="' . $globalClickTag . '" target="_blank">' . $globalClickTag . '</a></td><td>' . $globalClickTagClicked . '</td></tr>';
	echo '</tbody></table>';
	endif;
echo '</div>';
if( !$globalClickTag ):
if( have_rows('slides') ):

echo '<div class="small-12 columns">';
	echo '<table class="hover"><thead><tr><th>Title</th><th>Link (url)</th><th class="text-right">Total Click</th></tr></thead><tbody>';
	while( have_rows('slides') ): the_row();

	// vars
	$slideLink = get_sub_field('slide_link');
	$slideLinkTrimmed = substr($slideLink, 0, 120);
	$slideClick = get_sub_field_object('slide_click');
	$slideClicked = $slideClick['value'];
	$slideTitle = get_sub_field('slide_title');
	$slideImage = get_sub_field('slide_image');
	if ($slideImage):
	$slideImage = 'background-image: url(' . $slideImage . ');';
	endif;
	$slideStatus = get_sub_field('slide_status');
	$slideDescription = get_sub_field('slide_description');
	$slideImageSize = get_field( 'slide_image_size' );
	$slideImagePosition = get_field( 'slide_image_position' );

	$slideStartPublishing = get_sub_field( 'start_publishing' );
	$slideStartPublishing = (float)$slideStartPublishing;
	$slideFinishPublishing = get_sub_field( 'finish_publishing' );
	$slideFinishPublishing = (float)$slideFinishPublishing;

	$today = date( 'YmdHis' );

	$today = (float)$today;
if ( $slideStartPublishing < $today ):
	if ( $today < $slideFinishPublishing ):
		echo '<tr><td>' . $slideTitle . '</td><td><a href="' . $slideLink . '" rel="bookmark" title="' . $slideTitle . '" target="_blank">' . $slideLinkTrimmed . '...</a></td><td class="scount text-right">' . $slideClicked . '</td></tr>';
	endif;
endif;
	endwhile;
	echo '<tr><td colspan="2"><strong>Total</strong></td><td class="total-scount text-right"></td></tr></tbody></table>';
echo '</div>';
endif;
endif;
echo '<div class="small-12 columns text-right">';
	echo '<a class="back" href="' . site_url() . '/wp-admin/edit.php?post_type=standard_banner_type" class="page-title-action">Back to dashboard</a>';
echo '</div>';
echo '</div>';
?>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/js/countUp.min.js"></script>
<script type="text/javascript">
var options = { useEasing : true, useGrouping : true, separator : ',', decimal : '.', prefix : '',  suffix : ''};
var totalView = new CountUp("totalView", 0, '<?php echo $totalView; ?>', 0, 2.5, options);
totalView.start();
jQuery(document).ready(function () {
		var sum = 0;
		jQuery(this).find('.scount').each(function () {
		var scount = jQuery(this).text();
		if (!isNaN(scount) && scount.length !== 0) {
			sum += parseFloat(scount);
		}
	});
	jQuery('.total-scount', this).html(sum);
});
</script>