<?php

function expirePosts(){
	$timeStamp = current_time( 'mysql' );
	list($date, $time) = explode(" ",$timeStamp);
	list($today_year, $today_month, $today_day) = explode("-",$date);
	$expDate = $today_year.$today_month.$today_day;

	$args = array(
		'meta_key' => 'expire_date',
		'meta_value' => $expDate,
		'post_type' => 'standard_banner_type',  // or custom_post_type
		'post_status' => 'any',
		'posts_per_page' => -1
	);
	$posts = get_posts($args);

	foreach($posts as $post){
		$my_post = array();
		$my_post['ID'] = $post->ID;
		$my_post['post_status'] = 'draft';
		wp_update_post( $my_post );
	}
}
#expirePosts();