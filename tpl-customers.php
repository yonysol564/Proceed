<?php /* Template Name: customers */  ?>
<?php get_header();  ?>
<div class="container page_container">
	<div class="row">

		<div class="col-md-10">
			<?php if (have_posts()) : ?>
				<?php while (have_posts()) : the_post(); ?>
			<div class="row">
				<div class="col-md-12 page_col_title">
					<h3 class="page_title"><?php the_title(); ?></h3>
				</div>
			</div>
			<div style="" class="gradient_border"></div>


				<div class="page_content"><?php the_content() ?></div>

				<?php endwhile; ?>
    		<?php endif; ?>
			<div class="row">
				<div class="col-md-12">
					<span class="customers_head">Customers List</span>
				</div>
			</div>
			<div class="row">
				<?php
				$counter = 0; $count_posts = 1;
				$args = array( 'post_type' => 'customer', 'posts_per_page' => -1 );
				$loop = new WP_Query( $args );
				
				while ( $loop->have_posts() ) : $loop->the_post(); ?>
				<?php
				if($counter%6 == 0) { ?>
				<div class="col-lg-2 col-md-6 col-sm-6 col-xs-12 customers_list">
				<?php } ?>
						<div><span><?php echo $count_posts; ?>. <?php the_title(); ?></span></div>
				<?php
				$counter++; $count_posts++;
				if($counter == 6) { ?>
				</div>
				<?php $counter = 0; } ?>
				<?php endwhile;?>

			</div>

	</div>


		</div>

		<div class="col-md-2">
				<?php get_sidebar(); ?>
		</div>

	</div>
</div>

<?php get_footer(); ?>
