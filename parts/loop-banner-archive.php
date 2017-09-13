<?php
echo '<article id="post-' . get_the_ID() . '" ' . get_post_class('') . 'role="article"><header class="article-header">';
echo '<h4><a href="' . get_the_permalink() . '" rel="bookmark" title="' . get_the_title() . '">' . get_the_title() . '</a></h4>';
get_template_part( 'parts/content', 'byline' );
echo '</header></article>';
?>