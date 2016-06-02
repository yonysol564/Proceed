<?php
define("THEME_DIR",get_template_directory_uri());

require(dirname(__FILE__) . '/types.php');
$lang = TEMPLATEPATH . '/lang';
load_theme_textdomain('proceed', $lang);

remove_action('wp_head', 'wp_generator');
add_theme_support( 'post-thumbnails' );
add_image_size( 'main_banner_image', 1170, 300, false );

// include TEMPLATEPATH.'/functions/templateTags.php';


// function add_menuclass($ulclass) {
//   return preg_replace('/<a /', '<a class="nav-topic"', $ulclass, 1);
// }
// add_filter('wp_nav_menu','add_menuclass');


function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
		return '';
}
add_filter('excerpt_more', 'new_excerpt_more');


// Replaces the excerpt "more" text by a link
// function new_excerpt_more($more) {
//        global $post;
// 	return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read the full article...</a>';
// }
// add_filter('excerpt_more', 'new_excerpt_more');

	/*****************************************
	**  ENQUEUE MY STYLES & SCRIPTS
	*****************************************/



	function enqueue_my_styles() {
	    $bootstrap          = THEME_DIR . '/css/bootstrap.min.css';
	    $font_awesome       = 'https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css';
	    $slick				= '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.css';
	    $slickTheme			= '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick-theme.css';
	    $mainStyle          = THEME_DIR . '/css/style.css';
	    $queryStyle         = THEME_DIR . '/css/media-quires.css';
	    $rtl 				= '//cdnjs.cloudflare.com/ajax/libs/bootstrap-rtl/3.2.0-rc2/css/bootstrap-rtl.css';
	    $myrtl 				= THEME_DIR . '/css/rtl.css';

	    wp_enqueue_style( 'bootstrap', $bootstrap, array(), NULL, 'all' );;
	    wp_enqueue_style( 'font_awesome', $font_awesome, array(), 'v1', 'all' );
	    wp_enqueue_style( 'slick', $slick, array(), 'v1', 'all' );
	    wp_enqueue_style( 'slickTheme', $slickTheme, array(), 'v1', 'all' );
	    wp_enqueue_style( 'mainStyle', $mainStyle, array(), 'v1', 'all' );
	    wp_enqueue_style( 'queryStyle', $queryStyle, array(), 'v1', 'all' );
	    if ( is_rtl() ) {
	      wp_enqueue_style(  'style-rtl', $rtl, array(), 'v1', 'all' );
	      wp_enqueue_style(  'myrtl', $myrtl, array(), 'v1', 'all' );
	    }
	}
	add_action( 'wp_enqueue_scripts', 'enqueue_my_styles' );

##############################################################################################

	function register_my_jscripts() {
   wp_register_script( 'slick', '//cdn.jsdelivr.net/jquery.slick/1.5.9/slick.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'slick' );
   wp_register_script( 'bootstrap', THEME_DIR .'/js/bootstrap.min.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'bootstrap' );
   wp_register_script( 'scripts', THEME_DIR .'/js/scripts.js', array( 'jquery' ), '1', true ); wp_enqueue_script( 'scripts' );
	}
	add_action('wp_enqueue_scripts', 'register_my_jscripts');

##############################################################################################

	add_action( 'init', 'register_my_menus' );
	function register_my_menus() {
	    register_nav_menus(array('top_menu' => __( 'Top Menu' )));
	}

##############################################################################################

	$new_general_setting = new new_general_setting();

		class new_general_setting {
		    function new_general_setting( ) {
		        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
		    }
		    function register_fields() {
		        register_setting( 'general', 'slogan_sentence', 'esc_attr' );
		        add_settings_field('slogan_sentx', '<label for="slogan_sentence">'.__('Slogan Sentence' , 'sagive' ).'</label>' , array(&$this, 'fields_html') , 'general' );
		    }
		    function fields_html() {
		        $value = get_option( 'slogan_sentence', '' );
		        echo '<input type="text" id="slogan_sentence" name="slogan_sentence" value="' . $value . '" style="width: 65%" />';
		    }
		}

##############################################################################################

/***************************************************************
** DYNAMIC EXCERPT
***************************************************************/
// Variable excerpt length.
function dynamic_excerpt($length) { // Variable excerpt length. Length is set in characters
    global $post;
    $text = $post->post_excerpt;
    if ( '' == $text ) {
    $text = get_the_content('');
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]>', $text);
    }
    $text = strip_shortcodes($text); // optional, recommended
    $text = strip_tags($text); // use ' $text = strip_tags($text,'<p><a>'); ' if you want to keep some tags
    $text = mb_substr($text,0,$length).' ...';
    echo $text;
    // Use this is if you want a unformatted text block
    //echo apply_filters('the_excerpt',$text); // Use this if you want to keep line breaks
}


		/************************************
		**  REGISTER SIDEBARS
		************************************/
		register_sidebar(array(
		    'name' => __('Home Sidebar', 'sagive'),
		    'id' => 'home-sidebar',
		    'description' => __('Main Home Sidebar', 'sagive')
		));



		if( function_exists('acf_add_options_page') ) {

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

	}

	/************************************
		**  LANGUGES
		************************************/

function icl_post_languages(){
  $languages = icl_get_languages('skip_missing=0');
  if(1 < count($languages)){
    foreach($languages as $l){
    	$class= '';
    	if($l['active'] == 1) {
    		$class = 'active';
    	}

      $langs[] = '<li class="li_mobile_left li_lang ' . $class . '"><a class="lang" href="'.$l['url'].'">'.$l['native_name'].'</a></li>';
    }
    echo join('', $langs);
  }
}


class themeslug_walker_nav_menu extends Walker_Nav_Menu {

// add classes to ul sub-menus
function start_lvl( &$output, $depth = 0, $args = array() ) {
    // depth dependent classes
    $indent = ( $depth > 0  ? str_repeat( "\t", $depth ) : '' ); // code indent
    $display_depth = ( $depth + 1); // because it counts the first submenu as 0
    $classes = array(
        'sub-menu', 'dropdown-menu');
    $class_names = implode( ' ', $classes );

    // build html
    $output .= "\n" . $indent . '<ul class="' . $class_names . '">' . "\n";
}

// add main/sub classes to li's and links
 function start_el(  &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    global $wp_query;
    $indent = ( $depth > 0 ? str_repeat( "\t", $depth ) : '' ); // code indent

    // depth dependent classes
    $depth_classes = array(
        ( $depth == 0 ? 'main-menu-item' : 'sub-menu-item' ),
        ( $depth >=2 ? 'sub-sub-menu-item' : '' ),
        ( $depth % 2 ? 'menu-item-odd' : 'menu-item-even' ),
        'menu-item-depth-' . $depth
    );
    $depth_class_names = esc_attr( implode( ' ', $depth_classes ) );

  	if(in_array('menu-item-has-children', $item->classes)){
  		$dropdown = 'dropdown';
  	}else{ $dropdown = '';}
    // passed classes
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $class_names = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) ) );

    // build html
    $output .= $indent . '<li id="nav-menu-item-'. $item->ID . '" class="' . $depth_class_names. ' '.$dropdown . ' ' . $class_names . '">';

    // link attributes
    $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
    $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
    $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
    $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
    $attributes .= ' class="menu-link ' . ( $depth > 0 ? 'sub-menu-link' : 'main-menu-link' ) . '"';

    $item_output = sprintf( '%1$s<a%2$s>%3$s%4$s%5$s</a>%6$s',
        $args->before,
        $attributes,
        $args->link_before,
        apply_filters( 'the_title', $item->title, $item->ID ),
        $args->link_after,
        $args->after
    );

    // build html
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
}
}
