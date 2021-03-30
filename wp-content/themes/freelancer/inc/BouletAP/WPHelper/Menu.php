<?php

namespace BouletAP\WPHelper;

class Menu {

	function init() {
		add_theme_support( 'menus' );

		add_action( 'init', array($this, 'register_menus') );
		add_filter('wp_nav_menu', array($this, 'add_menuclass'), 10, 2);

		//add_filter( 'wp_nav_menu', 'vc_filter_wp_nav_menu', 20, 2 );
	}

	function register_menus() {
		$menus = array(
		'menu-homepage' => __( 'Homepage menu' ),
		'menu-primary' => __( 'Primary menu' ),
			'menu-social' => __( 'Social menu' ),
		);
		register_nav_menus($menus);
	}

	function add_menuclass($nav_menu, $args) {
		if( $args->theme_location == 'menu-homepage' ) {
			return str_replace( '<a ', '<a class="page-scroll" ', $nav_menu ); 
		}
		return $nav_menu;
	}




	function vc_filter_wp_nav_menu($menu, $options) {
		$menu = str_replace('menu-item-has-children', 'menu-item-has-children dropdown', $menu);
		$menu = str_replace('current-menu-item', 'current-menu-item active', $menu);
		$menu = str_replace('href="http://dropdown">', 'href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-angle-down"></i> ', $menu);
		$menu = str_replace('menu-item-has-children', 'sub-menu menu-item-has-children', $menu);
		$menu = str_replace('class="sub-menu"', 'class="dropdown-menu sub-menu"', $menu);
		return $menu;
	}

}