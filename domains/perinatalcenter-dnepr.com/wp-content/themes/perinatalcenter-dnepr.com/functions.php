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
show_admin_bar( false );

// регистрация миниатюр для всех типов постов
add_theme_support( 'post-thumbnails' );

// регистрация меню
add_theme_support( 'menus' );

// вывод меню
register_nav_menu( 'menu', 'Main menu' );

// форма поска html5
add_theme_support( 'html5', array( 'search-form' ) );

// регистрация сайдбаров
function p_sidebars_register() { 
	// Сайдбар в боковой колонке
	register_sidebar(
		array(
			'id' => 'right_sidebar', // уникальный id
			'name' => 'Правая колонка', // название сайдбара
			'description' => 'Виджеты в сайдбаре', // описание
			'before_widget' => '<div class="widget">', // по умолчанию виджеты выводятся <li>-списком
			'after_widget' => '</div>',
			'before_title' => '<h3>', // по умолчанию заголовки виджетов в <h2>
			'after_title' => '</h3>'
		)
	);
	// Сайдбар в футере
	register_sidebar(
		array(
			'id' => 'footer_sidebar',
			'name' => 'Футер',
			'description' => 'Виджеты в  футере',
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
		)
	);
}
add_action( 'widgets_init', 'p_sidebars_register' );

// Исключение из поиска категорий
function mysearchexclude( $query ){
	if ( $query->is_search ){
		$query->set( 'category__not_in','1' );
	}
	return $query;
}
add_filter( 'pre_get_posts','mysearchexclude' );

/*function wph_exclude_pages($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','wph_exclude_pages');*/

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

// комментарии
if ( ! function_exists( 'twentyten_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own twentyten_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Twenty Ten 1.0
 */
function perin_comment( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch ( $comment->comment_type ) :
        case '' :
    ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php echo get_avatar( $comment, 48 ); ?>
                <?php printf( __( '%s<span class="says"></span>', 'twentyten' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
            </div><!-- .comment-author .vcard -->
            <?php if ( $comment->comment_approved == '0' ) : ?>
                <em class="comment-awaiting-moderation"><?php _e( 'Ваш коментар очікує модерації.', 'twentyten' ); ?></em>
                <br />
            <?php endif; ?> 
            <div class="comment-meta commentmetadata"><i class="fa fa-clock-o"></i><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                    /* translators: 1: date, 2: time */
                    printf( __( '%1$s в %2$s', 'twentyten' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Змінити)', 'twentyten' ), ' ' );
                ?>
            </div><!-- .comment-meta .commentmetadata --> 
            <div class="comment-body"><?php comment_text(); ?>
            <div class="reply">
                <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div><!-- .reply -->
            </div>            
        </div><!-- #comment-##  --> 
    <?php
            break;
        case 'pingback'  :
        case 'trackback' :
    ?>
    <li class="post pingback">
        <p><?php _e( 'Pingback:', 'twentyten' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'twentyten' ), ' ' ); ?></p>
    <?php
            break;
    endswitch;
}
endif;
// Добавляем древовидной форме комментариев ответить всплывающее окно
function enqueue_comment_reply() {
    if( is_singular() )
        wp_enqueue_script('comment-reply');
}
add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' ); 

// Удаляем поле URL в форме комментариев
function remove_comment_fields($fields) { 
unset($fields['url']);
return $fields; 
} 
add_filter('comment_form_default_fields', 'remove_comment_fields');