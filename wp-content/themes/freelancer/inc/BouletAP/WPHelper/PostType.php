<?php

namespace BouletAP\WPHelper;

class PostType {

	function init() {

        add_action( 'init', array($this, 'create') );
        add_action( 'init', array($this, 'add_taxo') );
	}
	
	function add_taxo() {
		$labels = array(
			'name'              => __( 'Types', 'bouletap' ),
			'singular_name'     => __( 'Type', 'bouletap' ),
		);
	
		$args = array(
			'hierarchical'      => true,
			'labels'            => $labels,
			'show_ui'           => true,
			'show_admin_column' => true,
			'query_var'         => true,
			'has_archive' => true,
			'rewrite'           => array( 'slug' => 'type' ),
		);
	
		register_taxonomy( 'type', array( 'projects' ), $args );
	}

    
    function create() {
		register_post_type( 'services', array(
			'labels' => array(
				'name' => __( 'Services', 'bouletap' ),
				'singular_name' => __( 'Service', 'bouletap' )
			),
			'public' => true,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-welcome-learn-more',
		));

		register_post_type( 'sections', array(
			'labels' => array(
				'name' => __( 'Sections', 'bouletap' ),
				'singular_name' => __( 'Section', 'bouletap' )
			),
			'public' => true,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-welcome-add-page',
		));

		register_post_type( 'projects', array(
			'labels' => array(
				'name' => __( 'Projects', 'bouletap' ),
				'singular_name' => __( 'Project', 'bouletap' )
			),
			'public' => true,
			'has_archive' => true,
			'menu_icon'   => 'dashicons-welcome-widgets-menus',
		));
		add_post_type_support( 'projects', 'thumbnail' );

		register_post_type( 'sliders', array(
			'labels' => array(
				'name' => __( 'Sliders', 'bouletap' ),
				'singular_name' => __( 'Slider', 'bouletap' )
			),
			'public' => true,
			'has_archive' => false,
			'menu_icon'   => 'dashicons-images-alt',
		));
	}
	
}

