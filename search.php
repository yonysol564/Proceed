<?php get_header(); ?>
	
	<div class="container">	
	<div class="row">

		<div class="col-md-12">
			<section role="main">
	
		<h1><?php echo sprintf( __( '%s Search Results for ', 'html5blank' ), $wp_query->found_posts ); echo get_search_query(); ?></h1>
		
		<?php get_template_part('loop'); ?>
		
		<?php get_template_part('pagination'); ?>
	
	</section>
		 	
		</div>

	</div>
</div>


<?php get_footer(); ?>