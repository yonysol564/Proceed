<?php /* Template Name: home */  ?>
<?php get_header();  ?>

<div class="container page_container">
	<div class="row">

		<div class="col-md-2 col-sm-12 col-xs-12">
			<div class="row home_right_row" style="">
				<?php if( have_rows('home_right_box') ):?>
				<?php while ( have_rows('home_right_box') ) : the_row();?>
				<?php $img = get_sub_field('customer-box'); ?>
					<div class="col-md-12 home_right_col">
							<img class="img-responsive" style="margin: 0 auto;width: 80%;" src="<?php echo $img['url']; ?>" alt="">
					<div class="gradient_border"></div>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>


		<?php if( have_rows('home_box') ):?>

		<div class="col-md-8 home_box_col">
			<div class="row">
					<?php while ( have_rows('home_box') ) : the_row(); ?>
					<?php
			        $image = get_sub_field('image');
			        $title = get_sub_field('title');
			        $link = get_sub_field('link');
			    ?>
			    <div class="col-md-3 col-sm-6 col-xs-6 main_div_box">
			    		<div class="inner_div_box">
			    				<a href="<?php echo $link; ?>"><img class="img-responsive" src="<?php echo $image['url']; ?>" alt=""></a>
			    		</div>
			    		<a href="<?php echo $link; ?>"><span class="inner_div_box_title"><?php echo $title; ?></span></a>
			    </div>
					<?php endwhile; ?>
				  <?php endif; ?>

				  <?php
			        $info_top = get_field('home_info_top');
			        $info_bottom = get_field('home_info_bottom');
			    ?>
			</div>
			<div class="row">
				<div class="col-md-12 info_bottom">
					<div class="info_div">
							<span style="font-weight:bold;font-size:16px;color:#7c8586;">
									<?php echo $info_top; ?>
							</span><br>

							<p>
									<?php echo $info_bottom; ?>
							</p>
					</div>
				</div>
				<div style="margin-top: 40px;" class="gradient_border gndborder"></div>
			</div>
		</div>
		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
