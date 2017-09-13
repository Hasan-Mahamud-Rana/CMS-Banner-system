<?php
function post_column_statistics($newcolumn){
    $newcolumn['statistics'] = __('Statistics');
    return $newcolumn;
}
function post_custom_column_statistics($column_name, $id){
    if($column_name === 'statistics'){
      $statisticsUrl = get_post_permalink() . '?statistics=1';
      echo '<a href="' . $statisticsUrl . '" class="page-title-action" style="display: block;text-align: center;">Statistics</a>';
    }
}
add_filter('manage_posts_columns', 'post_column_statistics');
add_action('manage_posts_custom_column', 'post_custom_column_statistics',10,2);