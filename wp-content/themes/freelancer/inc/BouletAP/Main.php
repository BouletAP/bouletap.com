<?php

namespace BouletAP;


if( !defined("GOOGLEMAP_API_KEY") ) define("GOOGLEMAP_API_KEY", "AIzaSyC1QerOM9ZowImf94YWXXz_idGDm5V1Ezw");

class Main {

	static public function isDeployState($s) {
		if( $s === "prod" && $_SERVER['SERVER_NAME'] === "bouletap.com" ) {
			return true;
		}
		return false;
	}

	static public function run() {

		$main = new self();
		$main->init();
	}


	function init() {
		add_action( 'wp_enqueue_scripts', array($this, 'enqueue_styles') );
		add_action( 'wp_footer', array($this, 'enqueue_scripts') );
		
		$menuHelper = $this->initMenus();
		$postTypeHelper = $this->initPostType();

		add_filter( 'gform_submit_button', array($this, 'form_submit_button'), 10, 2 );
	}

	function form_submit_button($button, $form) {
		$button = str_replace("gform_button", "btn btn-primary gform_button", $button);
		
		// append text
		$valStart = substr($button, strpos($button, "value="));
		$value = explode("'", $valStart);
		$value = count($value) > 1 ? $value[1] : false;
		if( $value ) {
			$icon = '&#8594;';
			$button = str_replace("value='{$value}'", "value='{$value} {$icon}'", $button);
		}

		return $button;
	}



	function initPostType() {
		$cpt = new \BouletAP\WPHelper\PostType();
		$cpt->init();
		return $cpt;
	}


	function initMenus() {
		$menu = new \BouletAP\WPHelper\Menu();
		$menu->init();
		return $menu;
	}
	

	function enqueue_styles() {
		$path = get_template_directory_uri() . "/medias/css/";
		wp_enqueue_style('fonts.googleapis', "https://fonts.googleapis.com/css?family=Lato:400,700italic,700,400italic,300italic,300,100italic,100");
		wp_enqueue_style('animate', "{$path}animate.css");
		wp_enqueue_style('font-awesome', "{$path}font-awesome.min.css");
		wp_enqueue_style('owl.carousel', "{$path}owl.carousel.min.css");
		wp_enqueue_style('owl.theme.default', "{$path}/owl.theme.default.min.css");
		//wp_enqueue_style('mediaelementplayer', "{$path}mediaelementplayer.min.css");
		wp_enqueue_style('bootstrap', "{$path}bootstrap.min.css");
		wp_enqueue_style('theme-style', "{$path}style.css");
		//wp_enqueue_style('bondi-blue', "{$path}bondi-blue.css");
		//wp_enqueue_style('dark-blue', "{$path}dark-blue.css");
		wp_enqueue_style('theme-responsive', "{$path}responsive.css");
		wp_enqueue_style('custom-core', "{$path}custom-core.css");

		// js in head
		wp_enqueue_script('jquery', "{$path}jquery.min.js");
	}

	function enqueue_scripts() {
		$path = get_template_directory_uri() . "/medias/js/";
		wp_enqueue_script('bootstrap', "{$path}bootstrap.js", array('jquery'));
		wp_enqueue_script('jquery.validate', "{$path}jquery.validate.js", array('jquery'));
		wp_enqueue_script('wow', "{$path}wow.min.js", array('jquery'));
		wp_enqueue_script('jquery.cookie', "{$path}jquery.cookie.js", array('jquery'));
		wp_enqueue_script('themeoption', "{$path}themeoption.js", array('jquery'));
		wp_enqueue_script('config', "{$path}config.js", array('jquery'));
		//wp_enqueue_script('mediaelement-and-player', "{$path}mediaelement-and-player.js", array('jquery'));
		wp_enqueue_script('piebar', "{$path}piebar.js", array('jquery'));
		wp_enqueue_script('jquery.mixitup', "{$path}jquery.mixitup.min.js", array('jquery'));
		wp_enqueue_script('owl.carousel', "{$path}owl.carousel.js", array('jquery'));
		wp_enqueue_script('jquery.easing', "{$path}jquery.easing.min.js", array('jquery'));
		wp_enqueue_script('sector', "{$path}sector.js", array('jquery'));
		wp_enqueue_script('main', "{$path}main.js", array('jquery'));
		
		//wp_enqueue_script('ajaxify', "https://cdnjs.cloudflare.com/ajax/libs/ajaxify/7.2.0/ajaxify.min.js", array('jquery'));

		

		if( defined("GOOGLEMAP_API_KEY") )
			wp_enqueue_script('maps.googleapis', "https://maps.googleapis.com/maps/api/js?key=".GOOGLEMAP_API_KEY);
	}
}
