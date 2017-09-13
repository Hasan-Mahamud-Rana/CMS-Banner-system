<?php
add_action( 'after_setup_theme', 'my_rss_template' );
/**
 * Register custom RSS template.
 */
function my_rss_template() {
  add_feed( 'statistics', 'my_custom_rss_render' );
}
/**
 * Custom RSS template callback.
 */
function my_custom_rss_render() {
  get_template_part( 'feed', 'statistics' );
}