<?php get_header(); ?>
<style type="text/css">@import url(http://fonts.googleapis.com/css?family=Open+Sans);
body {background: #f6f6f6;}article {background: #fff;padding: 4px 20px;margin-bottom: 8px}p.byline {font-size: 11px;font-family: 'Open Sans';	color: #999999;	text-transform: uppercase;line-height: 2.182;	text-align: left;	margin-bottom: 0;}h2 {	font-size: 25px;font-family: 'Open Sans';color: #000;line-height: 1.5;text-align: left;text-transform: uppercase;}p {font-size: 16px; font-family: 'Open Sans';}</style>
<div id="content">
	<div id="inner-content" class="row">
		<main id="main" class="small-12 columns" role="main">
		<article id="content-not-found">
			<header class="article-header">
				<h2><?php _e( 'Epic 404 - Article Not Found', 'jointswp' ); ?></h2>
			</header>
			<section class="entry-content">
				<p><?php _e( 'The article you were looking for was not found, but maybe try looking again!', 'jointswp' ); ?></p>
			</section>
			<section class="search">
				<p><?php get_search_form(); ?></p>
			</section>
		</article>
		</main>
	</div>
</div>
<?php get_footer(); ?>