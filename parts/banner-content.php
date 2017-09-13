<?php
	$slogan = get_field( "slogan" );
	if( $slogan == true):
		$slogan = "slogan";
	endif;

	$linkToCompany = get_field( "link_to_company" );
	$companyLogoSnippet = 'style="background-image: url(' . get_template_directory_uri() . '/assets/images/nordjyskejob_dk.png);"';
	if( $linkToCompany):
		echo '<a class="' . $slogan . 'Enabled company-logo" href="' . $linkToCompany . '" rel="bookmark" title="' . $linkToCompany . '" ' . $companyLogoSnippet . ' target="_blank">&nbsp;</a>';
	else:
		echo '<a class="' . $slogan . 'Enabled company-logo" href="http://www.nordjyskejob.dk/" rel="bookmark" title="' . $linkToCompany . '" ' . $companyLogoSnippet . ' target="_blank">&nbsp;</a>';
	endif;
		the_content();