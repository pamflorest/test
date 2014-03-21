<?php
	/**
	 * Proper way to enqueue scripts and styles
	 */
	function theme_name_scripts() {
		wp_enqueue_style( 'style', get_stylesheet_uri() );
		// wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery-1.11.0.js', array(), '1.0.0', true );
		// wp_enqueue_script( 'cycle2', get_template_directory_uri() . '/js/jquery.cycle2.js', array(), '1.0.0', true );
		// wp_enqueue_script( 'cycle2-carrousel', get_template_directory_uri() . '/js/jquery.cycle2.carousel.js', array(), '1.0.0', true );
	}

	add_action( 'wp_enqueue_scripts', 'theme_name_scripts' );


	add_action( 'pre_get_posts', function($query){

		if ( $query->is_main_query() and ! is_admin() ) {
			$query->set( 'post_type', array('post','recetas')  );
		}
		return $query;

	});

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
			'dificultad',
			'recetas',
			array(
				'hierarchical'      => true,
				'show_ui'           => true,
				'show_admin_column' => true,
				'show_in_nav_menus' => true,
				'query_var'         => true,
				'label' => __( 'Dificultad' ),
				'rewrite' => array( 'slug' => 'dificultad' ),
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
			array('post','recetas'),
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
		register_post_type( 'recetas',
			array(
				'labels' => array(
					'name' => __( 'Recetas' ),
					'singular_name' => __( 'Receta' )
				),
			'public' => true,
			'has_archive' => true,
			'supports'  => array( 'title', 'editor', 'thumbnail', 'excerpt' )
			)
		);
	}


// ADD METABOX



	add_action('add_meta_boxes', function(){
		add_meta_box( 'tiempo', 'Tiempo', 'tiempo_meta_callback', 'recetas', 'normal','low' );
	});



// CALLBACK METABOX


	function tiempo_meta_callback($post){
		$name = get_post_meta($post->ID, 'tiempo', true);
		wp_nonce_field(__FILE__, '_tiempo_meta_nonce');
		echo "<input type='text' class='widefat' id='name' name='tiempo' value='$name'/>";
	}



// SAVE METABOXES

	add_action('save_post', function($post_id){



		if ( ! current_user_can('edit_page', $post_id)){
			return $post_id;
		}


		if ( defined('DOING_AUTOSAVE') and DOING_AUTOSAVE ){
			return $post_id;
		}


		if ( isset($_POST['tiempo']) and check_admin_referer(__FILE__, '_tiempo_meta_nonce') ){

			update_post_meta($post_id, 'tiempo', $_POST['tiempo']);

		}



	});


//SUPPORT
add_action('init', 'my_custom_init');
function my_custom_init() {
	add_post_type_support( 'recetas', 'custom-fields' );
}