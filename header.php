<html <?php language_attributes(); ?>>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title><?php the_title(); ?></title>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>

            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

        <![endif]-->

        <?php wp_head(); ?>
    </head>
    <body <?php body_class(); ?>>

      <nav style="margin-bottom: 0px;background-color: #FFF;" class="navbar navbar-default">
        <div style="" class="container top_navbar">
          <!-- Brand and toggle get grouped for better mobile display -->

          <!-- Collect the nav links, forms, and other content for toggling -->
           <!--     <div class=""> -->


            <ul class="nav navbar-nav navbar-left navbar-left-mobile">


              <?php icl_post_languages(); ?>
              <?php $facebook = get_field('facebook', 'option'); ?>
              <?php $lInkedIn = get_field('lInkedIn', 'option'); ?>
              <?php $phone = get_field('phone', 'option'); ?>

      <!--       <li class="li_mobile_left"><a class="a_fa" href="<?php echo $facebook; ?>"><i class="my_fa fa fa-facebook"></i></a></li>
            <li class="li_mobile_left"><a class="a_fa" href="<?php echo $lInkedIn;  ?>"><i class="my_fa fa fa-linkedin"></i></a></li>
            <li class="li_mobile_left"><a class="a_fa" href="<?php echo $phone;  ?>"><i class="my_fa fa fa-phone"></i></a></li>   -->

              <li class="li_mobile_left"><a target="_blank" style="padding: 5px 5px;" class="" href="<?php echo $facebook; ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=""></a></li>
              <li class="li_mobile_left"><a target="_blank" style="padding: 5px 5px;" class="" href="<?php echo $lInkedIn;  ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/linkdin.png" alt=""></a></li>
              <li class="li_mobile_left"><a style="padding: 5px 5px;" class="" href="callto:<?php echo $phone;  ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/phone.png" alt=""></a></li>

              <li class="form_search_li">
              <?php get_search_form();?>
              </li>

            </ul>

            <ul class="nav navbar-nav navbar-right">
              <li><a style="padding:0;" href="<?php echo home_url(); ?>"><img style="width:135px;" src="<?php echo get_template_directory_uri(); ?>/images/logo_proceed.png" alt=""></a></li>
            </ul>
         <!--  </div> --><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>


      <nav id="nav_bottom" class="navbar navbar-default">
        <div class="container nav_bottom_container">

          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bottom_navbar" aria-expanded="false">
              <span class="sr-only"><?php _e("Toggle navigation");?></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <ul class="navbar-left social_mobile">
               <?php icl_post_languages(); ?>

            <!--   <li class="li_mobile_left"><a class="a_fa" href="<?php echo $facebook; ?>"><i class="my_fa fa fa-facebook"></i></a></li>
              <li class="li_mobile_left"><a class="a_fa" href="<?php echo $lInkedIn;  ?>"><i class="my_fa fa fa-linkedin"></i></a></li>
              <li class="li_mobile_left"><a class="a_fa" href="<?php echo $phone;  ?>"><i class="my_fa fa fa-phone"></i></a></li>
 -->

              <li class="li_mobile_left"><a style="padding: 5px 5px;" class="" href="<?php echo $facebook; ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt=""></a></li>
              <li class="li_mobile_left"><a style="padding: 5px 5px;" class="" href="<?php echo $lInkedIn;  ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/linkdin.png" alt=""></a></li>
              <li class="li_mobile_left"><a style="padding: 5px 5px;" class="" href="callto:<?php echo $phone;  ?>"><img style="height:25px;width:25px;" src="<?php echo get_template_directory_uri(); ?>/images/phone.png" alt=""></a></li>
            </ul>


          </div>

            <?php
                 wp_nav_menu( array(
                    'theme_location'    => 'top_menu',
                    'menu'              => 'primary',
                    'menu_class'        => 'nav navbar-nav navbar-left',
                    'container'         => 'div',
                    'container_class'   => 'collapse navbar-collapse',
                    'container_id'      => 'bottom_navbar',
                    'fallback_cb'       => 'wp_bootstrap_navwalker::fallback')
                    //'walker'=> new themeslug_walker_nav_menu)

                );
            ?>
        
        </div>
      </nav>
      <header>
          <div class="container banner_container">
              <?php
                $queried_object = get_queried_object();
                if(isset($queried_object->term_id) && $queried_object->term_id){
                    $slides = get_field("slides",$queried_object->taxonomy."_".$queried_object->term_id);
                }else{
                    $slides = get_field("slides") ? get_field("slides") : get_field("slides","option");
                }

                if($slides){
                    echo "<div class='header_slides'>";
                    foreach($slides as $slide){
                        $image = $slide["img_banner"]["sizes"]["main_banner_image"];
                        $image_alt = $slide["img_banner"]["alt"];
                        $image_link = $slide["banner_link"];
                        $image_html = "<img src='{$image}' alt='$image_alt' />";
                        if($image_link){
                            $image_html = "<a href='$image_link'>$image_html</a>";
                        }
                        echo "<div class='slide'>$image_html</div>";
                    }
                    echo "</div>";
                }
              ?>
          </div>
      </header>
