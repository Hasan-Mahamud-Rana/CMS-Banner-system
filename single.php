<?php get_header(); ?>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="large-8 medium-8 columns" role="main">
		<?php
			if (have_posts()) : while (have_posts()) : the_post();
			get_template_part( 'parts/loop', 'single' );
			endwhile; else :
			get_template_part( 'parts/content', 'missing' );
			endif;
		 ?>
		</main>
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>