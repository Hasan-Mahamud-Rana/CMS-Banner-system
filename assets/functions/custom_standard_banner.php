<?php
function custom_standard_banner() {
	register_post_type( 'standard_banner_type',
		array('labels' => array(
			'name' => __('Banner', 'jointswp'),
			'singular_name' => __('Banner', 'jointswp'),
			'all_items' => __('All banner', 'jointswp'),
			'add_new' => __('Add New', 'jointswp'),
			'add_new_item' => __('Add new banner', 'jointswp'),
			'edit' => __( 'Edit', 'jointswp' ),
			'edit_item' => __('Edit Banner Types', 'jointswp'),
			'new_item' => __('New Banner Type', 'jointswp'),
			'view_item' => __('View Banner Type', 'jointswp'),
			'search_items' => __('Search Banner Type', 'jointswp'),
			'not_found' =>  __('Nothing found in the Database.', 'jointswp'),
			'not_found_in_trash' => __('Nothing found in Trash', 'jointswp'),
			'parent_item_colon' => ''
			),
			'description' => __( 'This is the place for banner post type', 'jointswp' ),
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8,
			'menu_icon' => 'dashicons-book',
				'rewrite'	=> array( 'slug' => 'banner', 'with_front' => false ),
			'has_archive' => 'banner',
			'capability_type' => 'post',
			'hierarchical' => false,
			'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'revisions', 'sticky')
		)
	);
	register_taxonomy_for_object_type('category', 'standard_banner_type');
	register_taxonomy_for_object_type('post_tag', 'standard_banner_type');
}
	add_action( 'init', 'custom_standard_banner');
	register_taxonomy( 'custom_cat',
	array('standard_banner_type'),
	array('hierarchical' => true,
		'labels' => array(
			'name' => __( 'Banner Categories', 'jointswp' ),
			'singular_name' => __( 'Banner Category', 'jointswp' ),
			'search_items' =>  __( 'Search Banner  Categories', 'jointswp' ),
			'all_items' => __( 'All Banner Categories', 'jointswp' ),
			'parent_item' => __( 'Parent Banner Category', 'jointswp' ),
			'parent_item_colon' => __( 'Parent Banner  Category:', 'jointswp' ),
			'edit_item' => __( 'Edit Banner Category', 'jointswp' ),
			'update_item' => __( 'Update Banner Category', 'jointswp' ),
			'add_new_item' => __( 'Add New Banner Category', 'jointswp' ),
			'new_item_name' => __( 'New Banner Category Name', 'jointswp' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 'slug' => 'custom-slug' ),
	)
);
register_taxonomy( 'custom_tag',
	array('standard_banner_type'),
	array('hierarchical' => false,
		'labels' => array(
			'name' => __( 'Banner Tags', 'jointswp' ),
			'singular_name' => __( 'Banner Tag', 'jointswp' ),
			'search_items' =>  __( 'Search Banner Tags', 'jointswp' ),
			'all_items' => __( 'All Banner Tags', 'jointswp' ),
			'parent_item' => __( 'Parent Banner Tag', 'jointswp' ),
			'parent_item_colon' => __( 'Parent Banner  Tag:', 'jointswp' ),
			'edit_item' => __( 'Edit Banner Tag', 'jointswp' ),
			'update_item' => __( 'Update Banner Tag', 'jointswp' ),
			'add_new_item' => __( 'Add New Banner Tag', 'jointswp' ),
			'new_item_name' => __( 'New Banner Tag Name', 'jointswp' )
		),
		'show_admin_column' => true,
		'show_ui' => true,
		'query_var' => true,
	)
);