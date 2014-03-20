<?php
	/**
	 * Proper way to enqueue scripts and styles
	 */
	function theme_name_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		//wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );

	/****PARA LAS IMAGENES ****/
	add_theme_support( 'post-thumbnails' );

	/***** PARA LAS TAXONOMIAS ****/
	function animal_init() {
	// create a new taxonomy
		register_taxonomy(
			'animal',
			'post',
			array(
				'hierarchical'      => true,
				'label' => __( 'Animal' ),
				'rewrite' => array( 'slug' => 'animal' ),
				'capabilities' => array(
					'manage__terms' => 'edit_posts',
				    'edit_terms' => 'manage_categories',
				    'delete_terms' => 'manage_categories',
				    'assign_terms' => 'edit_posts'
				)
			)
		);
	}
	add_action( 'init', 'animal_init' );

	function planta_init() {
	// create a new taxonomy
		register_taxonomy(
			'planta',
			'post',
			array(
				'hierarchical'      => true,
				'label' => __( 'Planta' ),
				'rewrite' => array( 'slug' => 'planta' ),
				'capabilities' => array(
					'manage__terms' => 'edit_posts',
				    'edit_terms' => 'manage_categories',
				    'delete_terms' => 'manage_categories',
				    'assign_terms' => 'edit_posts'
				)
			)
		);
	}
	add_action( 'init', 'planta_init' );

	function intereses_init() {
	// create a new taxonomy
		register_taxonomy(
			'intereses',
			'pam',
			array(
				'hierarchical'      => true,
				'label' => __( 'Intereses' ),
				'rewrite' => array( 'slug' => 'intereses' ),
				'capabilities' => array(
					'manage__terms' => 'edit_posts',
				    'edit_terms' => 'manage_categories',
				    'delete_terms' => 'manage_categories',
				    'assign_terms' => 'edit_posts'
				)
			)
		);
	}
	add_action( 'init', 'intereses_init' );

	function compartida_init() {
	// create a new taxonomy
		register_taxonomy(
			'compartida',
			array('post','pam')
			array(
				'hierarchical'      => true,
				'label' => __( 'Compartida' ),
				'rewrite' => array( 'slug' => 'compartida' ),
				'capabilities' => array(
					'manage__terms' => 'edit_posts',
				    'edit_terms' => 'manage_categories',
				    'delete_terms' => 'manage_categories',
				    'assign_terms' => 'edit_posts'
				)
			)
		);
	}
	add_action( 'init', 'compartida_init' );


	/***** POST TYPES *****/
	add_action( 'init', 'create_post_type' );
	function create_post_type() {
		register_post_type( 'pam',
			array(
				'labels' => array(
					'name' => __( 'Pam' ),
					'singular_name' => __( 'Pam' )
				),
			'public' => true,
			'has_archive' => true,
			)
		);
	}
?>