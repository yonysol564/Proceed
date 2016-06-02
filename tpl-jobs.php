<?php /* Template Name: jobs */  ?>
<?php get_header();  ?>
<div class="container">	
	<div class="row">


		<div class="col-md-10">
				<div class="row">
						<div class="col-md-12 contact_col_title">
								<h3 class="page_title"><?php the_title(); ?></h3>
						</div>
				</div>
				<div style="" class="gradient_border"></div>
				<div class="row">

				<?php if( have_rows('jobs_box') ):?>
					<div class="col-md-12">
							<?php while ( have_rows('jobs_box') ) : the_row(); ?>
							<?php
					        $title = get_sub_field('job_title');
					        $desc = get_sub_field('job_desc');
					    ?>
					    <div class="col-sm-12 job_row">
					    		<span style="font-weight:bold;"><?php echo $title; ?></span>
					    		<span><?php echo $desc; ?></span>
					    </div>
							<?php endwhile; ?>
						  <?php endif; ?>
					</div>

				</div>

		</div>

		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
