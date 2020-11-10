<?php
/*
Theme Name: Atlantik
Theme URI: http://mkvadrat.com/
Author: M2
Author URI: http://mkvadrat.com/
Description: Тема для сайта http://mkvadrat.com/
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function mk_scripts(){	
	wp_register_style( 'googleapis-css', 'https://fonts.googleapis.com/css2?family=Bitter&family=Open+Sans:wght@300;400;700;800&family=Roboto+Slab:wght@300;400;700&display=swap', false, '3.5.7' );
	wp_enqueue_style( 'googleapis-css' );
	
	wp_register_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.css');
	wp_enqueue_style( 'bootstrap-css' );
	
	wp_register_style( 'carousel-css', get_template_directory_uri() . '/css/owl.carousel.min.css');
	wp_enqueue_style( 'carousel-css' );
	
	wp_register_style( 'fotorama-css', 'https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css', false, '3.5.7' );
	wp_enqueue_style( 'fotorama-css' );
	
	wp_register_style( 'styles-css', get_template_directory_uri() . '/css/styles.css');
	wp_enqueue_style( 'styles-css' );

	wp_register_style( 'mmenu-css', get_template_directory_uri() . '/css/mmenu.css');
	wp_enqueue_style( 'mmenu-css' );

	wp_register_style( 'media-css', get_template_directory_uri() . '/css/media.css');
	wp_enqueue_style( 'media-css' );

	if (!is_admin()) {
		wp_enqueue_script( 'maps-min', 'https://api-maps.yandex.ru/2.1/?apikey=74a6de3b-56bf-4d43-9c69-9060da92721c&load=package.full&lang=ru-RU', '', '', false );
		wp_enqueue_script( 'jquery-min', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', '', '', true );
		wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', '', '', true );
		wp_enqueue_script( 'owl', get_template_directory_uri() . '/js/owl.carousel.min.js', '', '', true );
		wp_enqueue_script( 'fotorama-min', 'https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js', '', '', true );
		wp_enqueue_script( 'polyfills', get_template_directory_uri() . '/js/mmenu.polyfills.js', '', '', true );
		wp_enqueue_script( 'mmenu', get_template_directory_uri() . '/js/mmenu.js', '', '', true );
		wp_enqueue_script( 'custom-min', get_template_directory_uri() . '/js/custom.js', '', '', true );
		wp_enqueue_script( 'reviews', get_template_directory_uri() . '/js/reviews.js', '', '', true );
	}
}
add_action( 'wp_enqueue_scripts', 'mk_scripts' );

//Регистрируем название сайта
function mkvadrat_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() ) {
		return $title;
	}

	$title .= get_bloginfo( 'name', 'display' );

	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title = "$title $sep $site_description";
	}

	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title = "$title $sep " . sprintf( __( 'Page %s', 'ug' ), max( $paged, $page ) );
	}

	if ( is_404() ) {
        $title = '404';
    }

	return $title;
}
add_filter( 'wp_title', 'mkvadrat_wp_title', 10, 2 );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
			'header_menu'   => 'Главное меню',
			'footer_menu'   => 'Футер меню',
		)
	);
}

//Изображение в шапке сайта
$args = array(
	'width'         => 209,
	'height'        => 52,
	'default-image' => get_template_directory_uri() . 'images/logo.svg',
	'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}

//Виджет для инстаграма
function register_instagram_widgets(){
	register_sidebar( array(
		'name' => "Виджет для инстаграма",
		'id' => 'instagram-sidebar',
		'description' => 'Эти виджеты будут показаны в подвале сайта',
	) );
}
add_action( 'widgets_init', 'register_instagram_widgets' );

//Отключить редактор
add_filter('use_block_editor_for_post', '__return_false');

//Отключить редактор
function wpse_hide_cat_descr() { ?>

    <style type="text/css">
       .term-description-wrap {
           display: none;
       }
    </style>

<?php } 
add_action( 'admin_head-term.php', 'wpse_hide_cat_descr' );
add_action( 'admin_head-edit-tags.php', 'wpse_hide_cat_descr' );

//Remove WPAUTOP from ACF TinyMCE Editor
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************РАЗДЕЛ "НОМЕРА" В АДМИНКЕ**************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела
function register_post_type_app() {
	$labels = array(
	 'name' => 'Номера',
	 'singular_name' => 'Номера',
	 'add_new' => 'Добавить номер',
	 'add_new_item' => 'Добавить новый номер',
	 'edit_item' => 'Редактировать номер',
	 'new_item' => 'Новые номера',
	 'all_items' => 'Все номера',
	 'view_item' => 'Просмотр номера на сайте',
	 'search_items' => 'Искать номер',
	 'not_found' => 'Номер не найдена.',
	 'not_found_in_trash' => 'В корзине нет номеров.',
	 'menu_name' => 'Номера'
	 );
	$args = array(
		'labels' => $labels,
		'public' => true,
		'exclude_from_search' => false,
		'show_ui' => true,
		'has_archive' => false,
		'menu_icon' => 'dashicons-building',
		'menu_position' => 8,
		'supports' => array( 'title','editor', 'thumbnail', 'comments' ),
	);
 	register_post_type('rooms', $args);
}
add_action( 'init', 'register_post_type_app' );

function true_post_type_app( $rooms ) {
	global $post, $post_ID;

	$rooms['rooms'] = array(
			0 => '',
			1 => sprintf( 'Статьи обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			2 => 'Статья обновлёна.',
			3 => 'Статья удалёна.',
			4 => 'Статья обновлена.',
			5 => isset($_GET['revision']) ? sprintf( 'Статья восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			6 => sprintf( 'Статья опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			7 => 'Статья сохранена.',
			8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	);
	return $rooms;
}
add_filter( 'post_updated_messages', 'true_post_type_app' );
	
function create_taxonomies_app(){
    // Cats Categories
    register_taxonomy('rooms-list',array('rooms'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'rooms-list' )
    ));
}
add_action( 'init', 'create_taxonomies_app', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление category из url таксономии
function true_remove_slug_from_category( $url, $term, $taxonomy ){

	$taxonomia_name = 'category';
	$taxonomia_slug = 'category';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category', 10, 3 );

//Перенаправление category в случае удаления category
function parse_request_url_category( $query ){

	$taxonomia_name = 'category';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_category', 1, 1 );

//Удаление rooms-list из url таксономии
function true_remove_slug_from_rooms( $url, $term, $taxonomy ){

	$taxonomia_name = 'rooms-list';
	$taxonomia_slug = 'rooms-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_rooms', 10, 3 );

//Перенаправление rooms-list в случае удаления category
function parse_request_url_rooms( $query ){

	$taxonomia_name = 'rooms-list';

	if( $query['attachment'] ) :
		$condition = true;
		$main_url = $query['attachment'];
	else:
		$condition = false;
		$main_url = $query['name'];
	endif;

	$termin = get_term_by('slug', $main_url, $taxonomia_name);

	if ( isset( $main_url ) && $termin && !is_wp_error( $termin )):

		if( $condition ) {
			unset( $query['attachment'] );
			$parent = $termin->parent;
			while( $parent ) {
				$parent_term = get_term( $parent, $taxonomia_name);
				$main_url = $parent_term->slug . '/' . $main_url;
				$parent = $parent_term->parent;
			}
		} else {
			unset($query['name']);
		}

		switch( $taxonomia_name ):
			case 'category':{
				$query['category_name'] = $main_url;
				break;
			}
			case 'post_tag':{
				$query['tag'] = $main_url;
				break;
			}
			default:{
				$query[$taxonomia_name] = $main_url;
				break;
			}
		endswitch;

	endif;

	return $query;

}
add_filter('request', 'parse_request_url_rooms', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление sluga из url таксономии 
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( 'rooms' != $post->post_type /*&& 'workshop' != $post->post_type*/ || 'publish' != $post->post_status ) {
		return $post_link;
	}
		$post_link = str_replace( '/' . $post->post_type . '/', '/', $post_link );
	return $post_link;
}
add_filter( 'post_type_link', 'remove_slug_from_post', 10, 3 );

function parse_request_url_post( $query ) {
	if ( ! $query->is_main_query() )
		return;

	if ( 2 != count( $query->query ) || ! isset( $query->query['page'] ) ) {
		return;
	}

	if ( ! empty( $query->query['name'] ) ) {
		$query->set( 'post_type', array( 'post', 'rooms', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*************************************************************************ОБРЕЗКА ТЕКСТА********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function kama_excerpt( $args = '' ){
	global $post;

	$default = array(
		'maxchar'   => 350,   // количество символов.
		'text'      => '',    // какой текст обрезать (по умолчанию post_excerpt, если нет post_content.
							  // Если есть тег <!--more-->, то maxchar игнорируется и берется все до <!--more--> вместе с HTML
		'autop'     => true,  // Заменить переносы строк на <p> и <br> или нет
		'save_tags' => '',    // Теги, которые нужно оставить в тексте, например '<strong><b><a>'
		'more_text' => 'Читать дальше...', // текст ссылки читать дальше
	);

	if( is_array($args) ) $_args = $args;
	else                  parse_str( $args, $_args );

	$rg = (object) array_merge( $default, $_args );
	if( ! $rg->text ) $rg->text = $post->post_excerpt ?: $post->post_content;
	$rg = apply_filters('kama_excerpt_args', $rg );

	$text = $rg->text;
	$text = preg_replace ('~\[/?.*?\](?!\()~', '', $text ); // убираем шоткоды, например:[singlepic id=3], markdown +
	$text = trim( $text );

	// <!--more-->
	if( strpos( $text, '<!--more-->') ){
		preg_match('/(.*)<!--more-->/s', $text, $mm );

		$text = trim($mm[1]);

		$text_append = ' <a href="'. get_permalink( $post->ID ) .'#more-'. $post->ID .'">'. $rg->more_text .'</a>';
	}
	// text, excerpt, content
	else {
		$text = trim( strip_tags($text, $rg->save_tags) );

		// Обрезаем
		if( mb_strlen($text) > $rg->maxchar ){
			$text = mb_substr( $text, 0, $rg->maxchar );
			$text = preg_replace('~(.*)\s[^\s]*$~s', '\\1 [...]', $text ); // убираем последнее слово, оно 99% неполное
		}
	}

	// Сохраняем переносы строк. Упрощенный аналог wpautop()
	if( $rg->autop ){
		$text = preg_replace(
			array("~\r~", "~\n{2,}~", "~\n~",   '~</p><br ?/>~'),
			array('',     '</p><p>',  '<br />', '</p>'),
			$text
		);
	}

	$text = apply_filters('kama_excerpt', $text, $rg );

	if( isset($text_append) ) $text .= $text_append;

	return ($rg->autop && $text) ? "<p>$text</p>" : $text;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************КОММЕНТАРИИ*************************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Ajax функция добавления комментариев
function true_add_ajax_comment(){
	global $wpdb;
	$comment_post_ID = isset($_POST['comment_post_ID']) ? (int) $_POST['comment_post_ID'] : 0;

	$post = get_post($comment_post_ID);

	if ( empty($post->comment_status) ) {
		do_action('comment_id_not_found', $comment_post_ID);
		exit;
	}

	$status = get_post_status($post);

	$status_obj = get_post_status_object($status);

	/*
	 * различные проверки комментария
	 */
	if ( !comments_open($comment_post_ID) ) {
		do_action('comment_closed', $comment_post_ID);
		wp_die( __('Sorry, comments are closed for this item.') );
	} elseif ( 'trash' == $status ) {
		do_action('comment_on_trash', $comment_post_ID);
		exit;
	} elseif ( !$status_obj->public && !$status_obj->private ) {
		do_action('comment_on_draft', $comment_post_ID);
		exit;
	} elseif ( post_password_required($comment_post_ID) ) {
		do_action('comment_on_password_protected', $comment_post_ID);
		exit;
	} else {
		do_action('pre_comment_on_post', $comment_post_ID);
	}

	$comment_author       = ( isset($_POST['author']) )  ? trim(strip_tags($_POST['author'])) : null;
	$comment_author_email = ( isset($_POST['email']) )   ? trim($_POST['email']) : null;
	$comment_city         = ( isset($_POST['city']) ) ? trim($_POST['city']) : null;
	$comment_content      = ( isset($_POST['comment']) ) ? trim($_POST['comment']) : null;

	/*
	 * проверяем, залогинен ли пользователь
	 */
	$error_comment = array();

	$user = wp_get_current_user();
	if ( $user->exists() ) {
		if ( empty( $user->display_name ) )
		$user->display_name=$user->user_login;
		$comment_author       = $wpdb->escape($user->display_name);
		$comment_author_email = $wpdb->escape($user->user_email);
		
		$user_ID = get_current_user_id();
		if ( current_user_can('unfiltered_html') ) {
			if ( wp_create_nonce('unfiltered-html-comment_' . $comment_post_ID) != $_POST['_wp_unfiltered_html_comment'] ) {
				kses_remove_filters(); // start with a clean slate
				kses_init_filters(); // set up the filters
			}
		}
	} else {
		if ( get_option('comment_registration') || 'private' == $status )
			$error_comment['error'] = wp_die( 'Ошибка: Вы должны зарегистрироваться или войти, чтобы оставлять комментарии.' );
	}

	$comment_type = '';

	/*
	 * проверяем, заполнил ли пользователь все необходимые поля
 	 */
	if ( get_option('require_name_email') && !$user->exists() ) {
		if ( 6 > strlen($comment_author_email) || '' == $comment_author ){
			$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Имя, Email).' );
		}elseif ( !is_email($comment_author_email)){
			$error_comment['error'] = wp_die( 'Ошибка: введенный вами email некорректный.' );
		}
	}
	
	/*if ( '' == trim($comment_phone) ||  '<p><br></p>' == $comment_phone ){
		$error_comment['error'] = wp_die( 'Ошибка: заполните необходимые поля (Телефон).' );
	}*/
	
	if ( '' == trim($comment_content) ||  '<p><br></p>' == $comment_content ){
		$error_comment['error'] = wp_die( 'Ошибка: Вы забыли про комментарий.' );
	}

	wp_json_encode($error_comment);

	/*
	 * добавляем новый коммент и сразу же обращаемся к нему
	 */
	$comment_parent = isset($_POST['comment_parent']) ? absint($_POST['comment_parent']) : 0;
	$commentdata = compact('comment_post_ID', 'comment_author', 'comment_author_email', 'comment_author_url', 'comment_content', 'comment_type', 'comment_parent', 'user_ID');
	$comment_id = wp_new_comment( $commentdata );
	$comment = get_comment($comment_id);

	die();
}
add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}