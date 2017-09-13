<?php
//Set the Post Custom Field in the WP dashboard as Name/Value pair
function PostViews($post_ID) {
  $count_key = 'post_views_count';
  $count = get_post_meta($post_ID, $count_key, true);
    if($count == ''){
      $count = 0;
      delete_post_meta($post_ID, $count_key);
      add_post_meta($post_ID, $count_key, '1');
      return $count . ' View';
    } else {
      $count++;
      update_post_meta($post_ID, $count_key, $count);
      //echo $count . ' Test<br/> ';
      return $count;
    }
}