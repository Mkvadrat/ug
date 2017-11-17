<?php
/*
Theme Name: Ug-1
Theme URI: http://ug-1.com.ua/
Description: Тема для сайта ug-1.com.ua
Author: M2
Author URI: http://mkvadrat.com/
Version: 1.0
*/

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
****************************************************************************НАСТРОЙКИ ТЕМЫ*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Регистрируем название сайта
function ug_wp_title( $title, $sep ) {
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
add_filter( 'wp_title', 'ug_wp_title', 10, 2 );

//Регистрируем меню
if(function_exists('register_nav_menus')){
	register_nav_menus(
		array(
		  'primary'      => 'Главное меню',
		  'footer_menu'  => 'Меню в подвале сайта',
		)
	);
}

//Изображение в шапке сайта
$args = array(
  'width'         => 140,
  'height'        => 180,
  'default-image' => get_template_directory_uri() . '/images/logo.png',
  'uploads'       => true,
);
add_theme_support( 'custom-header', $args );

//Добавление в тему миниатюры записи и страницы
if ( function_exists( 'add_theme_support' ) ) {
     add_theme_support( 'post-thumbnails' );
}

//Удаляем пунткы меню
function remove_menu_items() {
    remove_menu_page('edit-comments.php'); // Удаляем пункт "Комментарии"
}
add_action( 'admin_menu', 'remove_menu_items' );

//Обрезка предложений до нужной длины
function string_limit_words($string, $word_limit){
  $words = explode(' ', $string, ($word_limit + 1));
  if(count($words) > $word_limit) {
  array_pop($words);
  return implode(' ', $words)."..."; } else {
  return implode(' ', $words); }
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*********************************************************************РАБОТА С METAПОЛЯМИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Проверка на пустоту
function ifMeta($meta_key){
	global $wpdb;

	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key) );

	if(!empty($value)){
		return $value;
	}else{
		return '0';
	}
}

//Вывод данных из произвольных полей для всех страниц сайта
function getMeta($meta_key){
	global $wpdb;
	$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key) );
	echo $value;
}

//Вывод картинок из произвольных полей для всех страниц сайта
function getMetaImg($meta_key){
	global $wpdb;
		$value = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));
	if(!empty($value)){
		$image = $wpdb->get_var( $wpdb->prepare("SELECT guid FROM $wpdb->postmeta JOIN $wpdb->posts ON %s = ID AND meta_key = %d ORDER BY meta_id DESC LIMIT 1", $value, $meta_key));
	}
	echo $image;
}

/*function wp_get_attachment( $attachment_id ) {

	$attachment = get_post( $attachment_id );
	return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);
}*/

//Вывод id категории
function getCurrentCatID(){
	global $wp_query;
	if(is_category()){
		$cat_ID = get_query_var('cat');
	}
	return $cat_ID;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*******************************************************************SEO PATH FOR IMAGE**********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод alt для изображения
function getAltImage($meta_key){
	global $wpdb;

	$post_id = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));

	$attachment = get_post( $post_id );

	return get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );

	/*return array(
		'alt' => get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true ),
		'caption' => $attachment->post_excerpt,
		'description' => $attachment->post_content,
		'href' => get_permalink( $attachment->ID ),
		'src' => $attachment->guid,
		'title' => $attachment->post_title
	);*/
}

//Вывод title для изображения
function getTitleImage($meta_key){
	global $wpdb;

	$post_id = $wpdb->get_var( $wpdb->prepare("SELECT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_id DESC LIMIT 1" , $meta_key));

	$attachment = get_post( $post_id );

	return $attachment->post_title;
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
************************************************************ГЛАВНАЯ СТРАНИЦА "РАЗДЕЛ ОТЗЫВЫ"***************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела отзывы
function register_post_type_review() {
 	$labels = array(
	 'name' => 'Отзывы',
	 'singular_name' => 'Отзыв',
	 'add_new' => 'Добавить отзыв',
	 'add_new_item' => 'Добавить новый отзыв',
	 'edit_item' => 'Редактировать отзыв',
	 'new_item' => 'Новый отзыв',
	 'all_items' => 'Все отзывы',
	 'view_item' => 'Просмотр страницы отзыва на сайте',
	 'search_items' => 'Искать отзыв',
	 'not_found' => 'Отзыв не найден.',
	 'not_found_in_trash' => 'В корзине нет отзыва.',
	 'menu_name' => 'Отзывы'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-book', // иконка в меню
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug_review', $args);
}
add_action( 'init', 'register_post_type_review' );

function true_post_type_review( $review ) {
	 global $post, $post_ID;

	 $review['ug_review'] = array(
			 0 => '',
			 1 => sprintf( 'Отзывы обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Отзыв обновлён.',
			 3 => 'Отзыв удалён.',
			 4 => 'Отзыв обновлен.',
			 5 => isset($_GET['revision']) ? sprintf( 'Отзыв восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Отзыв опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Отзыв сохранен.',
			 8 => sprintf( 'Отправлен на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирован на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $review;
}
add_filter( 'post_updated_messages', 'true_post_type_review' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
************************************************************ПЕРЕИМЕНОВАВАНИЕ ЗАПИСЕЙ В НОВОСТИ*************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
function change_post_menu_label() {
    global $menu, $submenu;
    $menu[5][0] = 'Новости';
    $submenu['edit.php'][5][0] = 'Новости';
    $submenu['edit.php'][10][0] = 'Добавить новость';
    $submenu['edit.php'][16][0] = 'Новостные метки';
    echo '';
}
add_action( 'admin_menu', 'change_post_menu_label' );
function change_post_object_label() {
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = 'Новости';
    $labels->singular_name = 'Новости';
    $labels->add_new = 'Добавить новость';
    $labels->add_new_item = 'Добавить новость';
    $labels->edit_item = 'Редактировать новость';
    $labels->new_item = 'Добавить новость';
    $labels->view_item = 'Посмотреть новость';
    $labels->search_items = 'Найти новость';
    $labels->not_found = 'Не найдено';
    $labels->not_found_in_trash = 'Корзина пуста';
}
add_action( 'init', 'change_post_object_label' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************ФОРМЫ ОБРАТНОЙ СВЯЗИ*******************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Форма обратной связи для главной страницы
function callbackFormMainPage(){

	$form_adress = get_option('admin_email');

	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['phone'])) {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}
	if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '' || !is_email($email)) {unset($email);}}
	if (isset($_POST['comment'])) {$comment = $_POST['comment']; if ($comment == '') {unset($comment);}}

	if (isset($name) && isset($phone) && isset($email)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		//$mes = "Имя: $name \nТелефон: $phone \nEmail: $email \nСообщение: $comment";

		$mes = '<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>ZURBemails</title>
		<style>
		img {
		max-width: 100%;
		}
		.collapse {
		margin:0;
		padding:0;
		}
		body {
		-webkit-font-smoothing:antialiased;
		-webkit-text-size-adjust:none;
		width: 100%!important;
		height: 100%;
		}

		a { color: #2BA6CB;}

		.btn {
		text-decoration:none;
		color: #FFF;
		background-color: #666;
		padding:10px 16px;
		font-weight:bold;
		margin-right:10px;
		text-align:center;
		cursor:pointer;
		display: inline-block;
		}

		p.callout {
		padding:15px;
		background-color:#ECF8FF;
		margin-bottom: 15px;
		}
		.callout a {
		font-weight:bold;
		color: #2BA6CB;
		}

		table.social {
		background-color: #ebebeb;

		}
		.social .soc-btn {
		padding: 3px 7px;
		font-size:12px;
		margin-bottom:10px;
		text-decoration:none;
		color: #FFF;font-weight:bold;
		display:block;
		text-align:center;
		}
		a.fb { background-color: #3B5998!important; }
		a.tw { background-color: #1daced!important; }
		a.gp { background-color: #DB4A39!important; }
		a.ms { background-color: #000!important; }

		.sidebar .soc-btn {
		display:block;
		width:100%;
		}

		table.head-wrap { width: 100%;}

		.header.container table td.logo { padding: 15px; }
		.header.container table td.label { padding: 15px; padding-left:0px;}

		table.body-wrap { width: 100%;}

		table.footer-wrap { width: 100%;	clear:both!important;
		}
		.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
		.footer-wrap .container td.content p {
		font-size:10px;
		font-weight: bold;

		}

		h1,h2,h3,h4,h5,h6 {
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
		}
		h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

		h1 { font-weight:200; font-size: 44px;}
		h2 { font-weight:200; font-size: 37px;}
		h3 { font-weight:500; font-size: 27px;}
		h4 { font-weight:500; font-size: 23px;}
		h5 { font-weight:900; font-size: 17px;}
		h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#ffffff;}

		.collapse { margin:0!important;}

		p, ul {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-bottom: 10px;
		font-weight: normal;
		font-size:14px;
		line-height:1.6;
		}
		p.lead { font-size:17px; }
		p.last { margin-bottom:0px;}

		ul li {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-left:5px;
		list-style-position: inside;
		}

		ul.sidebar {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		background:#ebebeb;
		display:block;
		list-style-type: none;
		}
		ul.sidebar li { display: block; margin:0;}
		ul.sidebar li a {
		text-decoration:none;
		color: #666;
		padding:10px 16px;
		margin-right:10px;
		cursor:pointer;
		border-bottom: 1px solid #777777;
		border-top: 1px solid #FFFFFF;
		display:block;
		margin:0;
		}
		ul.sidebar li a.last { border-bottom-width:0px;}
		ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}

		.container {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		display:block!important;
		max-width:600px!important;
		margin:0 auto!important;
		clear:both!important;
		}

		.content {
		padding:15px;
		max-width:600px;
		margin:0 auto;
		display:block;
		}

		.content table { width: 100%; }

		.column {
		width: 300px;
		float:left;
		}
		.column tr td { padding: 15px; }
		.column-wrap {
		padding:0!important;
		margin:0 auto;
		max-width:600px!important;
		}
		.column table { width:100%;}
		.social .column {
		width: 280px;
		min-width: 279px;
		float:left;
		}


		.clear { display: block; clear: both; }

		@media only screen and (max-width: 600px) {

		a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

		div[class="column"] { width: auto!important; float:none!important;}

		table.social div[class="column"] {
		width:auto!important;
		}

		}
		</style>

		</head>

		<body bgcolor="#FFFFFF">

		<!-- HEADER -->
		<table class="head-wrap" bgcolor="#003576">
		<tr>
		<td></td>
		<td class="header container" >

		<div class="content">
		<table>
		<tr>

		<td align="left"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">ЖСК «ЮГ-1»</h6></td>
		<td align="right"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Обратная связь</h6></td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="body-wrap">
		<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

		<div class="content">
		<table>
		<tr>
		<td>
		<!--<h3>Тема сообщения</h3>-->

		<p>'.$comment.'</p>
		<!-- Callout Panel -->
		<!-- social & contact -->
		<table class="social" width="100%">
		<tr>
		<td>
		<table align="left" class="column">
		<tr>
		<td>

		<h5 class="">Контактная информация:</h5>
		<br/>
		<p>Имя: <strong>'.$name.'</strong></p>
		<p>Email: <strong><a href="emailto: '.$email.'">'.$email.'</a></strong></p>
		<p>Телефон: <strong>'.$phone.'</strong></p>
		</td>
		</tr>
		</table>

		<span class="clear"></span>

		</td>
		</tr>
		</table>

		</td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="footer-wrap">
		<tr>
		<td></td>
		<td class="container"></td>
		<td></td>
		</tr>
		</table>

		</body>
		</html>';

		$send = mail($address, $phone, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 1,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}

	if (isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['email'])){
		$name = $_POST['name'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];

		if(!is_email($email)) {
			$alert = array(
				'status' => 1,
				'message' => 'Email введен не верно, проверте внимательно поле!'
			);
		}

		if ($name == '' || $phone == '' || $email == '') {
			unset($name);
			unset($phone);
			unset($email);
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_callbackFormMainPage', 'callbackFormMainPage');
add_action('wp_ajax_nopriv_callbackFormMainPage', 'callbackFormMainPage');

//Форма обратной связи для страницы контакты
function callbackFormContactsPage(){

	$form_adress = get_option('admin_email');

	$site_url = $_SERVER['SERVER_NAME'];

	$alert = array(
		'status' => 0,
		'message' => ''
	);

	if (isset($_POST['name'])) {$name = $_POST['name']; if ($name == '') {unset($name);}}
	if (isset($_POST['phone'])) {$phone = $_POST['phone']; if ($phone == '') {unset($phone);}}
	if (isset($_POST['email'])) {$email = $_POST['email']; if ($email == '' || !is_email($email)) {unset($email);}}
	if (isset($_POST['subject'])) {$subject = $_POST['subject']; if ($subject == '') {unset($subject);}}
	if (isset($_POST['comment'])) {$comment = $_POST['comment']; if ($comment == '') {unset($comment);}}

	if (isset($name) && isset($email) && isset($subject) && isset($comment)){

		$address = $form_adress;

		$headers  = "Content-type: text/html; charset=UTF-8 \r\n";
		$headers .= "From: $site_url\r\n";
		$headers .= "Bcc: birthday-archive@example.com\r\n";
		//$mes = "Имя: $name \nТелефон: $phone \nEmail: $email \nТема сообщения: $subject \nСообщение: $comment";

		$mes = '<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta name="viewport" content="width=device-width" />
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>ZURBemails</title>
		<style>
		img {
		max-width: 100%;
		}
		.collapse {
		margin:0;
		padding:0;
		}
		body {
		-webkit-font-smoothing:antialiased;
		-webkit-text-size-adjust:none;
		width: 100%!important;
		height: 100%;
		}

		a { color: #2BA6CB;}

		.btn {
		text-decoration:none;
		color: #FFF;
		background-color: #666;
		padding:10px 16px;
		font-weight:bold;
		margin-right:10px;
		text-align:center;
		cursor:pointer;
		display: inline-block;
		}

		p.callout {
		padding:15px;
		background-color:#ECF8FF;
		margin-bottom: 15px;
		}
		.callout a {
		font-weight:bold;
		color: #2BA6CB;
		}

		table.social {
		background-color: #ebebeb;

		}
		.social .soc-btn {
		padding: 3px 7px;
		font-size:12px;
		margin-bottom:10px;
		text-decoration:none;
		color: #FFF;font-weight:bold;
		display:block;
		text-align:center;
		}
		a.fb { background-color: #3B5998!important; }
		a.tw { background-color: #1daced!important; }
		a.gp { background-color: #DB4A39!important; }
		a.ms { background-color: #000!important; }

		.sidebar .soc-btn {
		display:block;
		width:100%;
		}

		table.head-wrap { width: 100%;}

		.header.container table td.logo { padding: 15px; }
		.header.container table td.label { padding: 15px; padding-left:0px;}

		table.body-wrap { width: 100%;}

		table.footer-wrap { width: 100%;	clear:both!important;
		}
		.footer-wrap .container td.content  p { border-top: 1px solid rgb(215,215,215); padding-top:15px;}
		.footer-wrap .container td.content p {
		font-size:10px;
		font-weight: bold;

		}

		h1,h2,h3,h4,h5,h6 {
		font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif; line-height: 1.1; margin-bottom:15px; color:#000;
		}
		h1 small, h2 small, h3 small, h4 small, h5 small, h6 small { font-size: 60%; color: #6f6f6f; line-height: 0; text-transform: none; }

		h1 { font-weight:200; font-size: 44px;}
		h2 { font-weight:200; font-size: 37px;}
		h3 { font-weight:500; font-size: 27px;}
		h4 { font-weight:500; font-size: 23px;}
		h5 { font-weight:900; font-size: 17px;}
		h6 { font-weight:900; font-size: 14px; text-transform: uppercase; color:#ffffff;}

		.collapse { margin:0!important;}

		p, ul {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-bottom: 10px;
		font-weight: normal;
		font-size:14px;
		line-height:1.6;
		}
		p.lead { font-size:17px; }
		p.last { margin-bottom:0px;}

		ul li {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		margin-left:5px;
		list-style-position: inside;
		}

		ul.sidebar {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		background:#ebebeb;
		display:block;
		list-style-type: none;
		}
		ul.sidebar li { display: block; margin:0;}
		ul.sidebar li a {
		text-decoration:none;
		color: #666;
		padding:10px 16px;
		margin-right:10px;
		cursor:pointer;
		border-bottom: 1px solid #777777;
		border-top: 1px solid #FFFFFF;
		display:block;
		margin:0;
		}
		ul.sidebar li a.last { border-bottom-width:0px;}
		ul.sidebar li a h1,ul.sidebar li a h2,ul.sidebar li a h3,ul.sidebar li a h4,ul.sidebar li a h5,ul.sidebar li a h6,ul.sidebar li a p { margin-bottom:0!important;}

		.container {
		font-family: Helvetica, Arial, "Lucida Grande", sans-serif;
		display:block!important;
		max-width:600px!important;
		margin:0 auto!important;
		clear:both!important;
		}

		.content {
		padding:15px;
		max-width:600px;
		margin:0 auto;
		display:block;
		}

		.content table { width: 100%; }

		.column {
		width: 300px;
		float:left;
		}
		.column tr td { padding: 15px; }
		.column-wrap {
		padding:0!important;
		margin:0 auto;
		max-width:600px!important;
		}
		.column table { width:100%;}
		.social .column {
		width: 280px;
		min-width: 279px;
		float:left;
		}


		.clear { display: block; clear: both; }

		@media only screen and (max-width: 600px) {

		a[class="btn"] { display:block!important; margin-bottom:10px!important; background-image:none!important; margin-right:0!important;}

		div[class="column"] { width: auto!important; float:none!important;}

		table.social div[class="column"] {
		width:auto!important;
		}

		}
		</style>

		</head>

		<body bgcolor="#FFFFFF">

		<!-- HEADER -->
		<table class="head-wrap" bgcolor="#003576">
		<tr>
		<td></td>
		<td class="header container" >

		<div class="content">
		<table>
		<tr>

		<td align="left"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">ЖСК «ЮГ-1»</h6></td>
		<td align="right"><h6 class="collapse" style="font-weight: 900; font-size: 14px; text-transform: uppercase; color: #ffffff;">Обратная связь</h6></td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="body-wrap">
		<tr>
		<td></td>
		<td class="container" bgcolor="#FFFFFF">

		<div class="content">
		<table>
		<tr>
		<td>
		<h3>'.$subject.'</h3>

		<p>'.$comment.'</p>
		<!-- Callout Panel -->
		<!-- social & contact -->
		<table class="social" width="100%">
		<tr>
		<td>
		<table align="left" class="column">
		<tr>
		<td>

		<h5 class="">Контактная информация:</h5>
		<br/>
		<p>Имя: <strong>'.$name.'</strong></p>
		<p>Email: <strong><a href="emailto: '.$email.'">'.$email.'</a></strong></p>
		<p>Телефон: <strong>'.$phone.'</strong></p>
		</td>
		</tr>
		</table>

		<span class="clear"></span>

		</td>
		</tr>
		</table>

		</td>
		</tr>
		</table>
		</div>

		</td>
		<td></td>
		</tr>
		</table>

		<table class="footer-wrap">
		<tr>
		<td></td>
		<td class="container"></td>
		<td></td>
		</tr>
		</table>

		</body>
		</html>';

		$send = mail($address, $subject, $mes, $headers);

		if ($send == 'true'){
			$alert = array(
				'status' => 1,
				'message' => 'Ваше сообщение отправлено'
			);
		}else{
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено!'
			);
		}
	}

	if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['comment'])){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$subject = $_POST['subject'];
		$comment = $_POST['comment'];

		if(!is_email($email)) {
			$alert = array(
				'status' => 1,
				'message' => 'Email введен не верно, проверте внимательно поле!'
			);
		}

		if ($name == '' || $email == '' || $subject == '' || $comment == '') {
			unset($name);
			unset($phone);
			unset($subject);
			unset($comment);
			$alert = array(
				'status' => 1,
				'message' => 'Ошибка, сообщение не отправлено! Заполните все поля!'
			);
		}
	}

	echo wp_send_json($alert);

	wp_die();
}
add_action('wp_ajax_callbackFormContactsPage', 'callbackFormContactsPage');
add_action('wp_ajax_nopriv_callbackFormContactsPage', 'callbackFormContactsPage');

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************РАЗДЕЛ "ОБЬЕКТЫ" В АДМИНКЕ*************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела обьекты
function register_post_type_objects() {
 	$labels = array(
	 'name' => 'Объекты',
	 'singular_name' => 'Объект',
	 'add_new' => 'Добавить объект',
	 'add_new_item' => 'Добавить новый объект',
	 'edit_item' => 'Редактировать объект',
	 'new_item' => 'Новый объект',
	 'all_items' => 'Все объекты',
	 'view_item' => 'Просмотр страницы объекта на сайте',
	 'search_items' => 'Искать объект',
	 'not_found' => 'Объект не найден.',
	 'not_found_in_trash' => 'В корзине нет объекта.',
	 'menu_name' => 'Объекты'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-hammer',
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug-objects', $args);
}
add_action( 'init', 'register_post_type_objects' );

function true_post_type_objects( $objects ) {
	 global $post, $post_ID;

	 $objects['ug-objects'] = array(
			 0 => '',
			 1 => sprintf( 'Объекты обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Объект обновлён.',
			 3 => 'Объект удалён.',
			 4 => 'Объект обновлен.',
			 5 => isset($_GET['revision']) ? sprintf( 'Объект восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Объект опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Объект сохранен.',
			 8 => sprintf( 'Отправлен на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирован на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $objects;
}
add_filter( 'post_updated_messages', 'true_post_type_objects' );

//Категории для пользовательских записей "Обьекты"
function create_taxonomies_objects()
{
    // Cats Categories
    register_taxonomy('ug-objects-list',array('ug-objects'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ug-objects-list' )
    ));
}
add_action( 'init', 'create_taxonomies_objects', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление ug_objects_list из url таксономии
function true_remove_slug_from_category_objects( $url, $term, $taxonomy ){

	$taxonomia_name = 'ug-objects-list';
	$taxonomia_slug = 'ug-objects-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_objects', 10, 3 );

//Перенаправление url в случае удаления ug-objects-list
function parse_request_url_category_objects( $query ){

	$taxonomia_name = 'ug-objects-list';

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
add_filter('request', 'parse_request_url_category_objects', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
************************************************************РАЗДЕЛ "ПОСТРОЕННЫЕ ОБЬЕКТЫ" В АДМИНКЕ*********************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела Построенные обьекты
function register_post_type_constructed_objects() {
	 $labels = array(
	 'name' => 'Построенные обьекты',
	 'singular_name' => 'Построенный обьект',
	 'add_new' => 'Добавить построенный обьект',
	 'add_new_item' => 'Добавить новый построенный обьект',
	 'edit_item' => 'Редактировать построенный обьект',
	 'new_item' => 'Новый построенный обьект',
	 'all_items' => 'Все построенные обьекты',
	 'view_item' => 'Просмотр страницу построенного обьекта на сайте',
	 'search_items' => 'Искать построенный обьект',
	 'not_found' => 'Построенные обьект не найден.',
	 'not_found_in_trash' => 'В корзине нет построенного обьекта.',
	 'menu_name' => 'Построенные обьекты'
	 );
		 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-building',
		 'menu_position' => 20,
		 'supports' => array( 'title', 'editor', 'thumbnail'),
		 );
	 register_post_type('ug-building', $args);
}
add_action( 'init', 'register_post_type_constructed_objects' );


function true_post_type_constructed_objects( $constructed_objects ) {
	 global $post, $post_ID;

	 $constructed_objects['ug-building'] = array(
		 0 => '',
		 1 => sprintf( 'Построенные обьекты обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		 2 => 'Построенный обьект обновлён.',
		 3 => 'Построенный обьект удалён.',
		 4 => 'Построенный обьект обновлен.',
		 5 => isset($_GET['revision']) ? sprintf( 'Построенный обьект восстановлен из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
		 6 => sprintf( 'Построенный обьект опубликован на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
		 7 => 'Построенный обьект сохранен.',
		 8 => sprintf( 'Отправлен на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
		 9 => sprintf( 'Запланирован на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
		 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );

	 return $constructed_objects;
}
add_filter( 'post_updated_messages', 'true_post_type_constructed_objects' );

//Категории для пользовательских записей "Обьекты"
function create_taxonomies_constructed_objects()
{
    register_taxonomy('ug-building-list',array('ug-building'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ug-building-list' )
    ));
}
add_action( 'init', 'create_taxonomies_constructed_objects', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
********************************************************************РАЗДЕЛ "ПРОДЕЛАННЫЕ РАБОТЫ"************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела ход строительства обьектов
function register_post_type_jobs() {
 	$labels = array(
	 'name' => 'Выполненные работы',
	 'singular_name' => 'Выполненная работа',
	 'add_new' => 'Добавить выполненную работу',
	 'add_new_item' => 'Добавить новую выполненную работу',
	 'edit_item' => 'Редактировать выполненную работу',
	 'new_item' => 'Новая выполненная работа',
	 'all_items' => 'Вся работа',
	 'view_item' => 'Просмотр страницы выполненных работ на сайте',
	 'search_items' => 'Искать работу',
	 'not_found' => 'Работа не найдена.',
	 'not_found_in_trash' => 'В корзине нет работы.',
	 'menu_name' => 'Выполненные работы'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-admin-tools',
		 'menu_position' => 20,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug-done-jobs', $args);
}
add_action( 'init', 'register_post_type_jobs' );

function true_post_type_jobs( $jobs ) {
	 global $post, $post_ID;

	 $jobs['ug-done-jobs'] = array(
			 0 => '',
			 1 => sprintf( 'Выполненные работы обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Работа обновлёна.',
			 3 => 'Работа удалёна.',
			 4 => 'Работа обновлена.',
			 5 => isset($_GET['revision']) ? sprintf( 'Работа восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Работа опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Работа сохранена.',
			 8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $jobs;
}
add_filter( 'post_updated_messages', 'true_post_type_jobs' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************РАЗДЕЛ "ПЛАНИРОВКИ ОБЬЕКТОВ"**************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела планировка обьектов
function register_post_type_layouts() {
 	$labels = array(
	 'name' => 'Планировки',
	 'singular_name' => 'Планировка',
	 'add_new' => 'Добавить планировку',
	 'add_new_item' => 'Добавить новую планировку',
	 'edit_item' => 'Редактировать планировку',
	 'new_item' => 'Новая планировка',
	 'all_items' => 'Все планировки',
	 'view_item' => 'Просмотр страницы планировок на сайте',
	 'search_items' => 'Искать планировку',
	 'not_found' => 'Планировка не найдена.',
	 'not_found_in_trash' => 'В корзине нет планировок.',
	 'menu_name' => 'Планировки'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-editor-removeformatting',
		 'menu_position' => 21,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug-layouts', $args);
}
add_action( 'init', 'register_post_type_layouts' );

function true_post_type_layouts( $layouts ) {
	 global $post, $post_ID;

	 $layouts['ug-layouts'] = array(
			 0 => '',
			 1 => sprintf( 'Планировки обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Планировка обновлёна.',
			 3 => 'Планировка удалёна.',
			 4 => 'Планировка обновлена.',
			 5 => isset($_GET['revision']) ? sprintf( 'Работа восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Планировка опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Планировка сохранена.',
			 8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $layouts;
}
add_filter( 'post_updated_messages', 'true_post_type_layouts' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************РАЗДЕЛ "ВЫБРАТЬ КВАРТИРУ"*****************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела выбрать квартиру
function register_post_type_rooms() {
 	$labels = array(
	 'name' => 'Квартиру',
	 'singular_name' => 'Квартиры',
	 'add_new' => 'Добавить квартиру',
	 'add_new_item' => 'Добавить новую квартиру',
	 'edit_item' => 'Редактировать квартиру',
	 'new_item' => 'Новая квартира',
	 'all_items' => 'Все квартиры',
	 'view_item' => 'Просмотр страницы квартир на сайте',
	 'search_items' => 'Искать квартиру',
	 'not_found' => 'Квартира не найдена.',
	 'not_found_in_trash' => 'В корзине нет квартир.',
	 'menu_name' => 'Квартиры'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-portfolio',
		 'menu_position' => 22,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug-rooms', $args);
}
add_action( 'init', 'register_post_type_rooms' );

function true_post_type_rooms( $rooms ) {
	 global $post, $post_ID;

	 $rooms['ug-layouts'] = array(
			 0 => '',
			 1 => sprintf( 'Квартиры обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Квартира обновлёна.',
			 3 => 'Квартира удалёна.',
			 4 => 'Квартира обновлена.',
			 5 => isset($_GET['revision']) ? sprintf( 'Работа восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Квартира опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Квартира сохранена.',
			 8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $rooms;
}
add_filter( 'post_updated_messages', 'true_post_type_rooms' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
***********************************************************************РАЗДЕЛ "АКЦИИ"**********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Вывод в админке раздела планировка обьектов
function register_post_type_actions() {
 	$labels = array(
	 'name' => 'Акции',
	 'singular_name' => 'Акции',
	 'add_new' => 'Добавить акцию',
	 'add_new_item' => 'Добавить новую акцию',
	 'edit_item' => 'Редактировать акцию',
	 'new_item' => 'Новая акция',
	 'all_items' => 'Все акции',
	 'view_item' => 'Просмотр страницы акций на сайте',
	 'search_items' => 'Искать акцию',
	 'not_found' => 'Акция не найдена.',
	 'not_found_in_trash' => 'В корзине нет акции.',
	 'menu_name' => 'Акции'
	 );
	 $args = array(
		 'labels' => $labels,
		 'public' => true,
		 'exclude_from_search' => false,
		 'show_ui' => true,
		 'has_archive' => true,
		 'menu_icon' => 'dashicons-format-image',
		 'menu_position' => 21,
		 'supports' =>  array('title','editor', 'thumbnail'),
	 );
 	register_post_type('ug-actions', $args);
}
add_action( 'init', 'register_post_type_actions' );

function true_post_type_actions( $actions ) {
	 global $post, $post_ID;

	 $actions['ug-actions'] = array(
			 0 => '',
			 1 => sprintf( 'Акции обновлены. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 2 => 'Акция обновлёна.',
			 3 => 'Акция удалёна.',
			 4 => 'Акция обновлена.',
			 5 => isset($_GET['revision']) ? sprintf( 'Работа восстановлена из редакции: %s', wp_post_revision_title( (int) $_GET['revision'], false ) ) : false,
			 6 => sprintf( 'Акция опубликована на сайте. <a href="%s">Просмотр</a>', esc_url( get_permalink($post_ID) ) ),
			 7 => 'Акция сохранена.',
			 8 => sprintf( 'Отправлена на проверку. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
			 9 => sprintf( 'Запланирована на публикацию: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Просмотр</a>', date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
			 10 => sprintf( 'Черновик обновлён. <a target="_blank" href="%s">Просмотр</a>', esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
	 );
	 return $actions;
}
add_filter( 'post_updated_messages', 'true_post_type_actions' );

//Категории для пользовательских записей "Акции"
function create_taxonomies_actions()
{
    register_taxonomy('ug-actions-list',array('ug-actions'),array(
        'hierarchical' => true,
        'label' => 'Рубрики',
        'singular_name' => 'Рубрика',
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array('slug' => 'ug-actions-list' )
    ));
}
add_action( 'init', 'create_taxonomies_actions', 0 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление ug_objects_list из url таксономии
function true_remove_slug_from_category_constructed_objects( $url, $term, $taxonomy ){

	$taxonomia_name = 'ug-building-list';
	$taxonomia_slug = 'ug-building-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_constructed_objects', 10, 3 );

//Перенаправление url в случае удаления ug-objects-list
function parse_request_url_category_constructed_objects( $query ){

	$taxonomia_name = 'ug-building-list';

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
add_filter('request', 'parse_request_url_category_constructed_objects', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE CATEGORY_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление ug-actions-list из url таксономии
function true_remove_slug_from_category_actions( $url, $term, $taxonomy ){

	$taxonomia_name = 'ug-actions-list';
	$taxonomia_slug = 'ug-actions-list';

	if ( strpos($url, $taxonomia_slug) === FALSE || $taxonomy != $taxonomia_name ) return $url;

	$url = str_replace('/' . $taxonomia_slug, '', $url);

	return $url;
}
add_filter( 'term_link', 'true_remove_slug_from_category_actions', 10, 3 );

//Перенаправление url в случае удаления ug-actions-list
function parse_request_url_category_actions( $query ){

	$taxonomia_name = 'ug-actions-list';

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
add_filter('request', 'parse_request_url_category_actions', 1, 1 );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
*****************************************************************REMOVE POST_TYPE SLUG*********************************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Удаление ug_objects из url таксономии
function remove_slug_from_post( $post_link, $post, $leavename ) {
	if ( 'ug-actions' != $post->post_type && 'ug-building' != $post->post_type && 'ug-objects' != $post->post_type && 'ug-done-jobs' != $post->post_type && 'ug-layouts' != $post->post_type && 'ug-rooms' != $post->post_type || 'publish' != $post->post_status ) {
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
		$query->set( 'post_type', array( 'post', 'ug-actions', 'ug-objects', 'ug-building', 'ug-done-jobs', 'ug-layouts', 'ug-rooms', 'page' ) );
	}
}
add_action( 'pre_get_posts', 'parse_request_url_post' );

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**************************************************ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ТАКСОНОМИИ "НАШИ ОБЬЕКТЫ"********************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Инициализация полей для таксономии "Наши обьекты"
function objects_custom_fields(){
    add_action('ug-objects-list_edit_form_fields', 'objects_custom_fields_form');
    add_action('edited_ug-objects-list', 'objects_custom_fields_save');
}
add_action('admin_init', 'objects_custom_fields', 1);

//HTML код для вывода в админке таксономии
function objects_custom_fields_form($tag){
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="extra1"><?php _e('Заголовок рубрики'); ?></label></th>
    <td>
        <input type="text" name="Objects_meta[title_for_categories_objects_page]" id="Objects_meta[title_for_categories_objects_page]" size="25" value="<?php echo $cat_meta['title_for_categories_objects_page'] ? $cat_meta['title_for_categories_objects_page'] : ''; ?>">
    <br />
        <span class="description"><?php _e('Заголовок для страницы рубрики "Наши обьекты"'); ?></span>
    </td>
    </tr>
   	<tr class="form-field">
    <th scope="row" valign="top"><label for="extra2"><?php _e('Текст рубрики'); ?></label></th>
    <td>
		<?php wp_editor( stripcslashes($cat_meta['text_for_categories_objects_page']), 'wpeditor', array('textarea_name' => 'Objects_meta[text_for_categories_objects_page]', 'textarea_rows' => 10, 'editor_css' => '<style>.wp-core-ui{width:95%;} </style>',) ); ?>
    <br />
        <span class="description"><?php _e('Текст для страницы рубрики "Наши обьекты"'); ?></span>
    </td>
    </tr>
<?php
}

//Функция сохранения данных для дополнительных полей таксономии
function objects_custom_fields_save($term_id){
    if (isset($_POST['Objects_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Objects_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Objects_meta'][$key])) {
                $cat_meta[$key] = $_POST['Objects_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}

/**********************************************************************************************************************************************************
***********************************************************************************************************************************************************
**************************************************ДОПОЛНИТЕЛЬНЫЕ ПОЛЯ ДЛЯ ТАКСОНОМИИ "ПОСТРОЕННЫЕ ОБЬЕКТЫ"*************************************************
***********************************************************************************************************************************************************
***********************************************************************************************************************************************************/
//Инициализация полей для таксономии "Построенные обьекты"
function building_custom_fields(){
    add_action('ug-building-list_edit_form_fields', 'building_custom_fields_form');
    add_action('edited_ug-building-list', 'building_custom_fields_save');
}
add_action('admin_init', 'building_custom_fields', 1);

//HTML код для вывода в админке таксономии
function building_custom_fields_form($tag){
    $t_id = $tag->term_id;
    $cat_meta = get_option("category_$t_id");
?>
    <tr class="form-field">
    <th scope="row" valign="top"><label for="extra1"><?php _e('Заголовок рубрики'); ?></label></th>
    <td>
        <input type="text" name="Building_meta[title_for_categories_building_page]" id="Building_meta[title_for_categories_building_page]" size="25" value="<?php echo $cat_meta['title_for_categories_building_page'] ? $cat_meta['title_for_categories_building_page'] : ''; ?>">
    <br />
        <span class="description"><?php _e('Заголовок для страницы рубрики "Построенные обьекты"'); ?></span>
    </td>
    </tr>
   	<tr class="form-field">
    <th scope="row" valign="top"><label for="extra2"><?php _e('Текст рубрики'); ?></label></th>
    <td>
		<?php wp_editor( stripcslashes($cat_meta['text_for_categories_building_page']), 'wpeditor', array('textarea_name' => 'Building_meta[text_for_categories_building_page]', 'textarea_rows' => 10, 'editor_css' => '<style>.wp-core-ui{width:95%;} </style>',) ); ?>
    <br />
        <span class="description"><?php _e('Текст для страницы рубрики "Построенные обьекты"'); ?></span>
    </td>
    </tr>
<?php
}

//Функция сохранения данных для дополнительных полей таксономии
function building_custom_fields_save($term_id){
    if (isset($_POST['Building_meta'])) {
        $t_id = $term_id;
        $cat_meta = get_option("category_$t_id");
        $cat_keys = array_keys($_POST['Building_meta']);
        foreach ($cat_keys as $key) {
            if (isset($_POST['Building_meta'][$key])) {
                $cat_meta[$key] = $_POST['Building_meta'][$key];
            }
        }
        //save the option array
        update_option("category_$t_id", $cat_meta);
    }
}
