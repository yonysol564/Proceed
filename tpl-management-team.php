<?php /* Template Name: Management Team */  ?>

<?php get_header();  ?>
<div class="container page_container">
	<div class="row">

		<div class="col-md-10">
		<div class="row">
				<div class="col-md-12">
						<h3 class="page_title"><?php the_title(); ?></h3>
				</div>
		</div>
		<div style="" class="gradient_border"></div>

		<?php if( have_rows('Management_box') ):?>
								<?php
						    while ( have_rows('Management_box') ) : the_row();
						    $img = get_sub_field('management_box_img');
								$title = get_sub_field('management_box_title');
								$role = get_sub_field('management_box_role');
								$info = get_sub_field('management_box_info');

						    ?>
									  <div class="row" style="margin-bottom: 30px;">
    						        <div class="col-md-3">
    						            <a href="portfolio-item.html">
    						                <img style="width:200px;height:200px;" class="img-responsive img-hover" src="<?php echo $img['url']; ?>" alt="">
    						            </a>
    						        </div>
    						        <div class="col-md-9">
    						            <h3><?php echo $title; ?></h3>
    						            <h4><?php echo $role; ?></h4>
    						            <p><?php 	echo $info; ?></p>
    						        </div>
    						    </div>

								<?php endwhile; ?>
								<?php endif; ?>
		</div>


		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>


	</div>
</div>

<?php get_footer(); ?>
