<?php

date_default_timezone_set("Europe/Copenhagen");

$themeColor = get_field( "theme_color" );
$fontColor = get_field( "font_color" );
if( $themeColor ):
	$themeColor = $themeColor;
else:
	$themeColor = "#FFF";
endif;
if( $fontColor ):
	$fontColor = $fontColor;
else:
	$fontColor = "#0a0a0a";
endif;
?>
<style type="text/css">body{ color: <?php echo $fontColor ?>} .slick-prev:before, .slick-next:before{color: <?php echo $themeColor ?>}</style>
<?php
$terms = get_the_terms( $post->ID , 'custom_cat' );
foreach ( $terms as $term ) {
	$bannerType = $term->slug;
}

$bannerSize = get_field( "banner_size" );
get_template_part( 'parts/loop', 'banner-b' . $bannerSize . '-' . $bannerType);

$cssVersion = get_the_modified_date('y.m.d');
echo '<link rel="stylesheet" id="banner-css"  href="' . get_template_directory_uri() . '/assets/css/b' . $bannerSize . '-' . $bannerType . '-style.css?ver=' . $cssVersion . '" type="text/css" media="all" />';
wp_footer(); ?>
<?php
$globalClickTag = get_field( "global_click_tag" );
$post_id = get_the_ID();
if( $globalClickTag ):
?>
<script type="text/javascript">jQuery("#banner").click(function() {var siteUrl = '<?php echo site_url() ?>';var postID = '<?php echo $post_id ?>';jQuery.ajax(siteUrl + '/?postID=' + postID).done();var link = '<?php echo $globalClickTag; ?>'; window.open(link, '_blank'); return false;});</script>
<?php
elseif( !$globalClickTag ):
?>
<script type="text/javascript">
jQuery(".listing a").click(function() {	var siteUrl = '<?php echo site_url() ?>';	var postID = '<?php echo $post_id ?>';var slideNumber = jQuery(this).attr('slidenumber');	jQuery.ajax(siteUrl + '/?postID=' + postID + '&slideNumber=' + slideNumber).done();});</script>
<?php
endif;
?>
<?php
$autoPlay = get_field( "autoplay" );
if( $autoPlay ):
	$autoPlay = "true";
else:
	$autoPlay = "false";
endif;
$arrows = get_field( "arrows" );
if( $arrows ):
	$arrows = "true";
else:
	$arrows = "false";
endif;
$infinite = get_field( "infinite" );
if( $infinite ):
	$infinite = "true";
else:
	$infinite = "false";
endif;
$dots = get_field( "dots" );
if( $dots ):
	$dots = "true";
else:
	$dots = "false";
endif;
$fade = get_field( "fade" );
if( $fade ):
	$fade = "true";
else:
	$fade = "false";
endif;
$autoplaySpeed = get_field( "autoplay_speed" );
$speed = get_field( "speed" );
$slidesToShow = get_field( "slides_to_show" );
?>

<?php
if( $bannerSize == 160){
	$vertical = "true";
  $nextArrow = "jQuery('.down')";
  $prevArrow = "jQuery('.up')";
?>
<script type="text/javascript">jQuery('.listing').slick({ slidesToShow: <?php echo $slidesToShow; ?>, slidesToScroll: <?php echo $slidesToShow; ?>, dots: <?php echo $dots; ?>, arrows: <?php echo $arrows; ?>, infinite: <?php echo $infinite; ?>, autoplay: <?php echo $autoPlay; ?>, autoplaySpeed: <?php echo $autoplaySpeed; ?>, speed: <?php echo $speed; ?>, vertical: <?php echo $vertical; ?>, prevArrow: <?php echo $prevArrow; ?>, nextArrow: <?php echo $nextArrow; ?>, fade: <?php echo $fade; ?>}).addClass('tricky');</script>
<?php
	} else {
?>
<script type="text/javascript">jQuery('.listing').slick({ slidesToShow: <?php echo $slidesToShow; ?>, slidesToScroll: <?php echo $slidesToShow; ?>, dots: <?php echo $dots; ?>, arrows: <?php echo $arrows; ?>, infinite: <?php echo $infinite; ?>, autoplay: <?php echo $autoPlay; ?>, autoplaySpeed: <?php echo $autoplaySpeed; ?>, speed: <?php echo $speed; ?>, fade: <?php echo $fade; ?>}).addClass('tricky');</script>
<?php
	}
?>