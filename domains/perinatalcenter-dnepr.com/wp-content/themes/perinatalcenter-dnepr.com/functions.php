<?php

//подключение скриптов и стилей
function style_script_load() {
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'bootstrap.min', get_template_directory_uri() . '/libs/bootstrap-3.3.7-dist/js/bootstrap.min.js' );
	wp_enqueue_script( 'parallax.min', get_template_directory_uri() . '/libs/parallax/parallax.min.js' );
	wp_enqueue_script( 'owl.carousel.min', get_template_directory_uri() . '/libs/owlCarusel/owl.carousel.min.js' );
	wp_enqueue_script( 'tagcanvas.min', get_template_directory_uri() . '/libs/tagCloud/jquery.tagcanvas.min.js' );
	wp_enqueue_script( 'main', get_template_directory_uri() . '/js/main.js' );

	wp_enqueue_style( 'bootstrap.min', get_template_directory_uri() . '/libs/bootstrap-3.3.7-dist/css/bootstrap.min.css' );
	wp_enqueue_style( 'owl.carousel.min', get_template_directory_uri() . '/libs/owlCarusel/owl.carousel.min.css' );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'style_script_load' );



// админпанель
show_admin_bar(false);

// регистрация миниатюр для всех типов постов
add_theme_support( 'post-thumbnails' );

// регистрация меню
add_theme_support( 'menus' );

// вывод меню
register_nav_menu( 'menu', 'Main menu' );

// форма поска html5
add_theme_support( 'html5', array( 'search-form' ) );

// Пписк по категории
function searchcategory($query) {
	if ($query->is_search) {
		$query->set(category__in, array(12,13));
	}
	return $query;
}
add_filter('pre_get_posts','searchcategory');

## Функция для подсветки слов поиска в WordPress
add_filter('the_content', 'kama_search_backlight');
add_filter('the_excerpt', 'kama_search_backlight');
add_filter('the_title', 'kama_search_backlight');
function kama_search_backlight( $text ){
	// ------------ Настройки -----------
	$styles = ['',
		'color: #000; background: #99ff66;',
		'color: #000; background: #ffcc66;',
		'color: #000; background: #99ccff;',
		'color: #000; background: #ff9999;',
		'color: #000; background: #FF7EFF;',
	];

	// только для страниц поиска...
	if ( ! is_search() ) return $text;

	$query_terms = get_query_var('search_terms');
	if( empty($query_terms) ) $query_terms = array(get_query_var('s'));
	if( empty($query_terms) ) return $text;

	$n = 0;
	foreach( $query_terms as $term ){
		$n++;

		$term = preg_quote( $term, '/' );
		$text = preg_replace_callback( "/$term/iu", function($match) use ($styles,$n){
			return '<span style="'. $styles[ $n ] .'">'. $match[0] .'</span>';
		}, $text );
	}

	return $text;
}