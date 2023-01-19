<?php 

add_action( 'wp_enqueue_scripts', 'theme_style' );
add_action( 'wp_footer', 'theme_script' );
add_action('after_setup_theme', 'theme_register_menu');
add_action('widget_init', 'theme_register_sidebar');

function theme_register_menu() {
    register_nav_menus( [
		'header_menu' => __('Header menu'),
		'footer_menu' => 'Меню в подвале'
	] );
	add_theme_support( 'title-tag' );
	// add_theme_support( 'post-formats', array( 'projects', 'reputation' ) );
	add_theme_support( 'post-formats', array( 'video', 'aside' ) );

	add_image_size('post_thumb', 1200, 500, true);
}

function theme_register_sidebar() {
	register_sidebar( array(
		'name'          => 'Sidebar example',
		'id'            => "sidebar_example",
		'description'   => 'Sidebar eexaple for WP',
		// 'class'         => '',
		// 'before_widget' => '<div id="%1$s" class="widget %2$s">',
		// 'after_widget'  => "</div>\n",
		// 'before_title'  => '<h2 class="widgettitle">',
		// 'after_title'   => "</h2>\n",
		// 'before_sidebar' => '', // WP 5.6
		// 'after_sidebar'  => '', // WP 5.6
	) );
}

function theme_style() {
    
	wp_enqueue_style( 'style', get_stylesheet_uri());
	// wp_enqueue_script( 'script-name', get_template_directory_uri() . '/js/example.js', array(), '1.0.0', true );
}

function theme_script() {
    wp_enqueue_script('main', get_template_directory_uri().'/assets/js/main.js');
}
add_theme_support( 'post-thumbnails' );
add_theme_support('widgets');

add_action('init', 'register_post_types');

function register_post_types() {
	register_post_type('portfolio', [
		'label'  => null,
		'labels' => [
			'name'               => 'Portfolio', // основное название для типа записи
			'singular_name'      => 'Portfolio', // название для одной записи этого типа
			'add_new'            => 'Add project to Portfolio', // для добавления новой записи
			'add_new_item'       => 'Add project to Portfolio', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Edit project in Portfolio', // для редактирования типа записи
			'new_item'           => 'New project in Portfolio', // текст новой записи
			'view_item'          => 'View project in Portfolio', // для просмотра записи этого типа.
			'search_items'       => 'Search project in Portfolio', // для поиска по этим типам записи
			'not_found'          => 'Not found', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Not found in Cart', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Portfolio', // название меню
		],
		'description'            => 'My Portfolio',
		'public'                 => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'           => true, // показывать ли в меню админки
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-portfolio',
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor','thumbnail','post-formats', 'excerpt' ], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['skills'],
		'has_archive'         => false,
		'rewrite'             => true,
	]);
};

add_action( 'init', 'create_taxonomy' );

function create_taxonomy(){
	register_taxonomy( 'skills', [ 'portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Skills',
			'singular_name'     => 'Skill',
			'search_items'      => 'Search Skills',
			'all_items'         => 'All Skills',
			'view_item '        => 'View Skill',
			'parent_item'       => 'Parent Skill',
			'parent_item_colon' => 'Parent Skill:',
			'edit_item'         => 'Edit Skill',
			'update_item'       => 'Update Skill',
			'add_new_item'      => 'Add New Skill',
			'new_item_name'     => 'New Skill Name',
			'menu_name'         => 'Skills',
			'back_to_items'     => '← Back to Skill',
		],
		'description'           => 'Skills which using in project', // описание таксономии
		'public'                => true,
		'publicly_queryable'    => null, // равен аргументу public
		'hierarchical'          => false,
		'rewrite'               => true,
		'show_in_rest' => true,

	] );
}

add_action('wp_ajax_send_mail', 'send_mail');
add_action('wp_ajax_nopriv_send_mail', 'send_mail');

function send_mail() {

	$name = $_POST['name'];
	$email = $_POST['email'];
	$subject = $_POST['subject'];
	$message= $_POST['message'];

	
	remove_all_filters( 'wp_mail_from' );
	remove_all_filters( 'wp_mail_from_name' );

	$headers = array(
		'From: Me Myself <me@example.net>',
		'Content-type: text/html',
		'cc: John Q Codex <jqc@wordpress.org>',
		'cc: John2 Codex <j2qc@wordpress.org>',
		'bcc: iluvwp@wordpress.org', 
	);

wp_mail( 'qumpi23@gmail.com', $subject, $message, $headers );
wp_die();
};
?>