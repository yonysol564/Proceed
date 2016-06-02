<?php get_header(); ?>

<?php $object = get_queried_object(); ?>

<div class="container page_container">	
	<div class="row" style="position:relative;">
		<?php $image = get_field('img_banner','category_'.$object->term_id) ? get_field('img_banner','category_'.$object->term_id): ''; ?>
		<?php ///if($image):?>
			<!-- 	<a href=""><div class="col-md-12 bg-img" style="background-image: url(<?php//echo $image['url']; ?>)"></div></a> -->
		<?php //endif;?>
	</div>
</div>
<div class="container">	
	<div class="row">
		<div class="col-md-10">
				<div class="row">	
						<div class="col-md-12 contact_col_title">	
								<h3 class="contact_title"><?php echo $object->name; ?></h3>
						</div>
				</div>
				<div style="" class="gradient_border"></div>
				<div class="row">	

					<div class="col-md-12">
						<div class="row">
						<?php $counter = 0; ?>
						<?php while (  have_posts() ) : the_post(); ?>
						<?php if (!is_rtl()) { ?>
								<div style="<?php if ($counter%2 == 0) {echo "margin-right:100px"; }  ?>" class="col-md-6 news_col-box">
		                <h3 style="font-size:20px;">
		                   <a style="color:#7C8586;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                </h3>
		                <a href="<?php the_permalink(); ?>">
		                	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		                   <img class="img-responsive" src="<?php echo $url; ?>" alt="">
		                </a>
		            </div>
		         <?php 
		        	}elseif (is_rtl()) { ?>
		        		<div style="<?php if ($counter%2 == 0) {echo "margin-left:100px"; }  ?>" class="col-md-6 news_col-box">
		                <h3 style="font-size:20px;">
		                   <a style="color:#7C8586;" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		                </h3>
		                <a href="<?php the_permalink(); ?>">
		                	<?php $url = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
		                   <img class="img-responsive" src="<?php echo $url; ?>" alt="">
		                </a>
		            </div>
		        	<?php
		        	}
		         ?>
						<?php $counter++; ?>
						<?php endwhile; ?>
			
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

 
