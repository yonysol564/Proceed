<form class="search form_search" method="get" action="<?php echo home_url(); ?>" role="search">
	<?php if(is_rtl()) {
			$img = get_template_directory_uri() . '/images/search_he.png';
			$input_img = get_template_directory_uri() . '/images/inputbg.png';
		}else{
			$img =$img = get_template_directory_uri() . '/images/search_en.png';
			$input_img = get_template_directory_uri() . '/images/inputbgleft.png';
		} 
	?>
	 <label for=""><img class="img-search" src="<?php echo $img; ?>" alt=""></label>
	
	<input style="background-image: url('<?php echo $input_img; ?>');" class="search-input input_search" type="search" name="s" placeholder="">
	<button class="search-submit" type="submit" role="button"></button>
</form>