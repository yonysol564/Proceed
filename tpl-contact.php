<?php /* Template Name: Contact */  ?>
<?php get_header();  ?>

<div class="container page_container">
	<div class="row">

		<div class="col-md-10">
				<div class="row">
						<div class="col-md-12 contact_col_title">
								<h3 class="page_title"><?php the_title(); ?></h3>
						</div>
				</div>
				<div style="" class="gradient_border"></div>
				<div class="row">

					<div class="col-md-3 contact_form_div">
							<?php the_field('contactform'); ?>
					</div>

					<div class="col-md-9">
						<div class="contact_content">
							<strong><?php the_content(); ?></strong>
						</div>
					</div>
				</div>
		</div>

		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
