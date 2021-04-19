<?php

//error_reporting(E_ALL);
//ini_set("display_errors", "On");

ini_set("memory_limit", "512M");

function apb_autoload ($pClassName) {
  $pClassName = str_replace("\\", "/", $pClassName);
  $lookupFile = __DIR__ . "/inc/" . $pClassName . ".php";
  if( file_exists($lookupFile) ){
    include_once($lookupFile);
  }  
}
spl_autoload_register("apb_autoload");


\BouletAP\Main::run();





function child_enqueue_scripts() {	
	wp_enqueue_script( 'bouletap-particules', get_stylesheet_directory_uri() . '/medias/particles-js/particles.min.js');
	wp_enqueue_script( 'bouletap-particules-custom', get_stylesheet_directory_uri() . '/medias/particles-js/custom.js');
}
add_action( 'wp_footer', 'child_enqueue_scripts', 15 );


function remove_admin_bar() {
  show_admin_bar(false);
}
add_action('after_setup_theme', 'remove_admin_bar');



add_theme_support( 'title-tag' );


function fixWMPLSiteURL($url) {
  return $url;
}

add_filter('site_url', 'fixWMPLSiteURL');


// [cocoon-part src='']
function cocoon_template_shortcode( $atts ){
	$a = shortcode_atts( array(
        'src' => '',
	), $atts );
	
	if( empty($a['src']) ) return "";

	ob_start(); 
	get_template_part($a['src']);
	$output = ob_get_clean();
    return $output;
}
add_shortcode( 'cocoon-part', 'cocoon_template_shortcode' );




function custom_projects_cpt_order( $query ) {
  // validate
  if( is_admin() ) {
    return $query;
  }
  
  if( isset($query->query_vars['post_type']) && $query->query_vars['post_type'] == 'projects' ) {
    $query->set('orderby', 'meta_value_num');
    $query->set('meta_key', 'start_date');
    $query->set('order', 'DESC');
  }


  // always return
  return $query;
}
add_action('pre_get_posts', 'custom_projects_cpt_order');




function extractProjectTerms($projectId, $uniqueField = false) {
  $terms = get_the_terms( $projectId, 'type');
  if( !empty($terms) && $uniqueField ) {
    $output = array();
    foreach( $terms as $term ) {
      $output[$term->term_id] = $term->$uniqueField;
    }
    $terms = $output;
  }
  
  return $terms;
}


// 1 - 12
function formatMonthName($int, $abbr = false) {
  $int = (int)$int;
  if( $int === 0 || $int >= 12  ) 
    return "";
  
  $int--;
  if( $abbr ) {
    $months = array(
      __("Jan", "bouletap"),
      __("Feb", "bouletap"),
      __("Mar", "bouletap"),
      __("Apr", "bouletap"),
      __("May", "bouletap"),
      __("Jun", "bouletap"),
      __("Jul", "bouletap"),
      __("Aug", "bouletap"),
      __("Sep", "bouletap"),
      __("Oct", "bouletap"),
      __("Nov", "bouletap"),
      __("Dec", "bouletap")
    );
  }
  else {
    $months = array(
      __("January", "bouletap"),
      __("Febuary", "bouletap"),
      __("March", "bouletap"),
      __("April", "bouletap"),
      __("May", "bouletap"),
      __("June", "bouletap"),
      __("July", "bouletap"),
      __("August", "bouletap"),
      __("September", "bouletap"),
      __("October", "bouletap"),
      __("November", "bouletap"),
      __("December", "bouletap")
    );      
  }
  return $months[$int];
}




function formatProjectDate($date, $yearOnly = false) {
  $month =  date('m', strtotime($date)); 
  $year =  date('Y', strtotime($date));
  
  if( $yearOnly ) $output = $year;
  else            $output = formatMonthName($month) . " " . $year;
  
  return $output;
}

function getBlogTitleOn2Lines() {
  $output = get_bloginfo("name");
  return str_replace(" ", "<br />", $output);
}


function bouletap_template_part( $atts, $content = null ){
  $tp_atts = shortcode_atts(array( 
     'path' =>  null,
  ), $atts);         
  ob_start();  
  get_template_part($tp_atts['path']);  
  return ob_get_clean();   
}
add_shortcode('template_part', 'bouletap_template_part'); 