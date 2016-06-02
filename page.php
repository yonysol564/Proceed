<?php /* Template Name: home */  ?>
<?php get_header();  ?>

<div class="container page_container">
	<div class="row">

		<div class="col-md-10">
				<div class="row">
						<div class="col-md-12 page_col_title">
								<h3 class="page_title"><?php the_title(); ?></h3>
						</div>

				</div>
				<div style="" class="gradient_border"></div>
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				<div class="page_content"><?php the_content() ?></div>

			<?php endwhile; ?>
    	<?php endif; ?>

		</div>

		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
