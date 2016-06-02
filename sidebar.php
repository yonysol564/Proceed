<?php
	$title = get_field('news_title','option');
	$cat_id = get_field('choose_category','option');
	$news_query = new WP_query(array(
		"cat" => $cat_id
	));
?>
<div class="row sidebar_row">
	<div class="col-md-12 sidebar_col">
		<span class="sidebar_title"><?php echo $title; ?></span>
	</div>

	<div class="news_div col-md-12">
		<?php while (  $news_query->have_posts() ) : $news_query->the_post(); ?>
			<div class="inner_news clearfix">

					<div class="1col-md-12">
							<span class="sidebar_p"><?php echo(get_the_excerpt()); ?></span>
					</div>
					<div class="1col-md-12 sidebar_inner_col">
							<a class="sidebar_read" href="<?php the_permalink(); ?>"><?php _e('Read more','proceed');?>...</a>
					</div>
					<div class="gradient_border"></div>

			</div>
		<?php endwhile; ?>
	</div>
</div>

<?php wp_reset_query(); ?>
