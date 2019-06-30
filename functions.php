<?php
	define( 'GYMFITNESS_TEXTDOMAIN', 'gymfitness' );

	include_once get_template_directory() . '/inc/queries.php';
	include_once get_template_directory() . '/inc/shortcode.php';
	include_once get_template_directory() . '/inc/custom_post_type.php';
	include_once get_template_directory() . '/inc/widget.php';

	add_action( 'init', 'gymfitness_menus' );
	function gymfitness_menus ()
	{
		register_nav_menus(
			array(
				'menu-principal' => __( 'Menu Principal', GYMFITNESS_TEXTDOMAIN )
			)
		);
	}

	add_action( 'wp_enqueue_scripts', 'gymfitness_scripts_styles' );
	function gymfitness_scripts_styles ()
	{
		wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1' );
		wp_enqueue_style( 'gFonts', 'https://fonts.googleapis.com/css?family=Open+Sans|Raleway:400,700,900|Staatliches&display=swap', array(), '1.0.0' );
		wp_enqueue_style( 'slicknavCSS', get_template_directory_uri() . '/css/slicknav.min.css', array(), '1.0.0' );

		wp_enqueue_style( 'style', get_template_directory_uri() . '/css/styles.css', array( 'normalize', 'gFonts' ), '1.0.0' );


		wp_enqueue_script( 'slicknavJS', get_template_directory_uri() . '/js/jquery.slicknav.min.js', array( 'jquery' ), '1.0.0', true );
		if ( is_page( 'galeria' ) ) {
			wp_enqueue_style( 'lightboxCSS', get_template_directory_uri() . '/css/lightbox.min.css', array(), '1.0.0' );
			wp_enqueue_script( 'lightboxJS', get_template_directory_uri() . '/js/lightbox.min.js', array( 'jquery' ), '1.0.0', true );
		}
		if(is_page('inicio')) {
			wp_enqueue_style( 'bxsliderCSS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css', array(), '4.2.12' );
			wp_enqueue_script( 'bxsliderJS', 'https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js', array( 'jquery' ), '4.2.12', true );
		}


		wp_enqueue_script( 'scriptsJS', get_template_directory_uri() . '/js/scripts.js', array( 'jquery', 'slicknavJS' ), '1.0.0', true );
	}

	add_action( 'after_setup_theme', 'gymfitness_setup' );
	function gymfitness_setup ()
	{
		add_theme_support( 'post-thumbnails' );

		//Titulo seo
		add_theme_support('title-tag');

		//Tamaños personalizados
		add_image_size( 'square', 350, 350, true );
		add_image_size( 'portrait', 350, 724, true );
		add_image_size( 'cajas', 400, 375, true );
		add_image_size( 'mediano', 700, 400, true );
		add_image_size( 'blog', 966, 644, true );

	}

	//Definir Widgets
	add_action( 'widgets_init', 'gymfitness_widgets' );
	function gymfitness_widgets ()
	{


		register_sidebar( array(
			'name' => 'Sidebar 1',
			'id' => 'sidebar_1',
			'before_widget' => "<div class='widget'>",
			'after_widget' => ' </div>',
			'before_title' => "<h3 class='text-center texto-primario'>",
			'after_title' => '</h3>'
		) );

		register_sidebar( array(
			'name' => 'Sidebar 2',
			'id' => 'sidebar_2',
			'before_widget' => "<div class='widget'>",
			'after_widget' => '</div>',
			'before_title' => "<h3 class='text-center texto-primario'>",
			'after_title' => '</h3>'
		) );


	}
