<?php

$themeColor = get_field( "theme_color" );
$bannerSize = "b" . get_field( "banner_size" );
$bgImageColor = get_field( "bg_image_color" );

if( $bgImageColor == "image"):
	$bannerBgImage = get_field( "banner_bg_image" );
	if (!empty($bannerBgImage)):
		$bannerBgImageSnippet = 'background-image: url(' . $bannerBgImage . ');';
	endif;

	$bannerBgSize = get_field( "banner_bg_size" );
	$backgroundImagePosition = get_field( "background_image_position" );
	echo '<div id="banner" class="' . $bannerSize . ' row" style="' . $bannerBgImageSnippet . ' background-size: ' . $bannerBgSize . '; background-position: ' . $backgroundImagePosition . '; background-repeat: no-repeat;">';
elseif( $bgImageColor == "color") :
	$bannerBgColor = get_field( "banner_bg_color" );
	echo '<div id="banner" class="' . $bannerSize . ' row" style="background-color: ' . $bannerBgColor . ';">';
endif;

$slogan = get_field( "slogan" );
$sloganTextPosition = get_field( "slogan_text_position" );
$sloganBackgroundColor = get_field( "slogan_background_color" );
if( $slogan == true):
	$slogan = "slogan";
endif;
if( $sloganBackgroundColor):
	$sloganBackgroundColor = $sloganBackgroundColor;
else:
	$sloganBackgroundColor = $themeColor;
endif;

if( $slogan == true && $sloganTextPosition == "top"):
	echo '<div class="small-12 ' . $slogan . ' columns text-center" style="background-color: ' . $sloganBackgroundColor . ';">' . get_the_excerpt() . '</div>';
endif;

$bannerContentPosition = get_field( "banner_content_position" );
if (empty($bannerContentPosition)):
	$bannerContentGrid = 12;
else:
	$bannerContentGrid = 8;
endif;
if( $bannerContentPosition == "left"):
echo '<div class="small-4 columns">';
	get_template_part( 'parts/banner', 'content' );
echo '</div>';
endif;

if( have_rows('slides') ):
	$i = 0;
	echo '<div class="small-' . $bannerContentGrid .' columns listing" style="display: none;">';
		while( have_rows('slides') ): the_row();
		$i++;
		// vars
		$slideLink = get_sub_field('slide_link');
		$slideClick = get_sub_field_object('slide_click');
		$slideClicked = $slideClick['value'];
		$slideClicked++;
		$slideTitle = get_sub_field('slide_title');
		$slideImage = get_sub_field('slide_image');
		if ($slideImage):
			$slideImage = 'background-image: url(' . $slideImage . ');';
		endif;
		$slideStatus = get_sub_field('slide_status');
		$slideDescription = get_sub_field('slide_description');
		$slideImageSize = get_field( "slide_image_size" );
		$slideImagePosition = get_field( "slide_image_position" );
	$slideStartPublishing = get_sub_field( 'start_publishing' );
	$slideStartPublishing = (float)$slideStartPublishing;
	$slideFinishPublishing = get_sub_field( 'finish_publishing' );
	$slideFinishPublishing = (float)$slideFinishPublishing;
	$today = date( 'YmdHis' );
	$today = (float)$today;
if ( $slideStartPublishing < $today ):
	if ($today < $slideFinishPublishing ):
		echo '<a class="' . $slogan . 'Enabled small-12" slidenumber="' . $i . '" slideclicked="' . $slideClicked . '" href="' . $slideLink . '" rel="bookmark" title="' . $slideTitle . '" style="' . $slideImage . ' background-size: ' . $slideImageSize . '; background-position: ' . $slideImagePosition . ';" target="_blank">';
			if( $slideStatus):
					echo '<span class="statusBar"><span class="slideStatus">' . $slideStatus . '</span></span>';
			endif;
			if( $slideTitle || $slideDescription):
					echo '<span class="info small-12"><span class="slideTitle">' . $slideTitle . '</span><span class="slideDescription">' . $slideDescription . '</span></span>';
			endif;
		echo '</a>';
	endif;
endif;
		endwhile;
	echo '</div>';
endif;

if( $bannerContentPosition == "right"):
echo '<div class="small-4 columns">';
	get_template_part( 'parts/banner', 'content' );
echo '</div>';
endif;

if( $slogan == true && $sloganTextPosition == "bottom"):
	echo '<div class="small-12 ' . $slogan . ' columns text-center" style="background-color: ' . $sloganBackgroundColor . ';">' . get_the_excerpt() . '</div>';
endif;
echo '</div>';
?>