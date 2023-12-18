<?php
/**
 * avgust functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package avgust
 */
if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function avgust_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on avgust, use a find and replace
		* to change 'avgust' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'avgust', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Основное меню', 'avgust' ),
			'footer-menu' => esc_html__( 'Футер меню', 'avgust' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'avgust_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'avgust_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function avgust_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'avgust_content_width', 640 );
}
add_action( 'after_setup_theme', 'avgust_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function avgust_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'avgust' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'avgust' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'avgust_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function avgust_scripts() {
	wp_enqueue_style( 'avgust-style', get_template_directory_uri() . '/dist/css/style.css', array(), _S_VERSION );
	wp_style_add_data( 'avgust-style', 'rtl', 'replace' );

	wp_enqueue_script( 'avgust-navigation', get_template_directory_uri() . '/dist/js/common.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'avgust_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

//if( function_exists('acf_add_options_page') ) {
//
//    acf_add_options_page(array(
//        'page_title'    => 'Настройки темы',
//        'menu_title'    => 'Настройки темы',
//        'menu_slug'     => 'theme-general-settings',
//        'capability'    => 'edit_posts',
//        'redirect'      => false
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title'    => 'Настройки хедера',
//        'menu_title'    => 'Header',
//        'parent_slug'   => 'theme-general-settings',
//    ));
//
//    acf_add_options_sub_page(array(
//        'page_title'    => 'Настройки футера',
//        'menu_title'    => 'Footer',
//        'parent_slug'   => 'theme-general-settings',
//    ));
//
//}
register_post_type('products', [
    'label' => null,
    'labels' => [
        'name' => 'Продукти', // основное название для типа записи
        'singular_name' => 'Продукт', // название для одной записи этого типа
        'add_new' => 'Добавить продукт', // для добавления новой записи
        'add_new_item' => 'Добавление нового', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редактировать продукт', // для редактирования типа записи
        'new_item' => 'Новый продукт', // текст новой записи
        'view_item' => 'Посмотреть продукт', // для просмотра записи этого типа.
        'search_items' => 'Искать продукт', // для поиска по этим типам записи
        'not_found' => 'не найлено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
        'parent_item_colon' => '', // для родителей (у древовидных типов)
        'menu_name' => 'Продукты', // название меню
    ],
    'description' => '',
    'public' => true,
    'taxonomies'		 => array( 'product-category' ),
    // 'publicly_queryable'  => null, // зависит от public
    // 'exclude_from_search' => null, // зависит от public
    // 'show_ui'             => null, // зависит от public
    // 'show_in_nav_menus'   => null, // зависит от public
    'show_in_menu' => null, // показывать ли в меню адмнки
    // 'show_in_admin_bar'   => null, // зависит от show_in_menu
    'show_in_rest' => null, // добавить в REST API. C WP 4.7
    'rest_base' => null, // $post_type. C WP 4.7
    'menu_position' => null,
    'menu_icon' => 'dashicons-products',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical' => false,
    'supports' => ['title','editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'has_archive' => true,
    'rewrite' => true,
    'query_var' => true,
]);
register_post_type('vacancies', [
    'label' => null,
    'labels' => [
        'name' => 'Вакансии', // основное название для типа записи
        'singular_name' => 'Вакансия', // название для одной записи этого типа
        'add_new' => 'Добавить вакансию', // для добавления новой записи
        'add_new_item' => 'Добавление вакансии', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редактировать вакансию', // для редактирования типа записи
        'new_item' => 'Новая вакансия', // текст новой записи
        'view_item' => 'Посмотреть вакансию', // для просмотра записи этого типа.
        'search_items' => 'Искать вакансию', // для поиска по этим типам записи
        'not_found' => 'не найлено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
        'parent_item_colon' => '', // для родителей (у древовидных типов)
        'menu_name' => 'Вакансии', // название меню
    ],
    'description' => '',
    'public' => true,
    'taxonomies'		 => false,
    // 'publicly_queryable'  => null, // зависит от public
    // 'exclude_from_search' => null, // зависит от public
    // 'show_ui'             => null, // зависит от public
    // 'show_in_nav_menus'   => null, // зависит от public
    'show_in_menu' => null, // показывать ли в меню адмнки
    // 'show_in_admin_bar'   => null, // зависит от show_in_menu
    'show_in_rest' => null, // добавить в REST API. C WP 4.7
    'rest_base' => null, // $post_type. C WP 4.7
    'menu_position' => null,
    'menu_icon' => 'dashicons-universal-access',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical' => false,
    'supports' => ['title','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'has_archive' => true,
    'rewrite' => true,
    'query_var' => true,
]);
add_action( 'init', 'mayak_taxonomy_register' );
function mayak_taxonomy_register(){
    $labels = array(
        'name'                     => 'Категории', // основное название во множественном числе
        'singular_name'            => 'Категория', // название единичного элемента таксономии
        'menu_name'                => 'Категории', // Название в меню. По умолчанию: name.
        'all_items'                => 'Все категории',
        'edit_item'                => 'Изменить категорию',
        'view_item'                => 'Просмотр категорий', // текст кнопки просмотра записи на сайте (если поддерживается типом)
        'update_item'              => 'Обновить категорию',
        'add_new_item'             => 'Добавить категорию',
        'new_item_name'            => 'Название новой',
        'parent_item'              => 'Родительская категория', // только для таксономий с иерархией
        'parent_item_colon'        => 'Родительская категория:',
        'search_items'             => 'Искать категорию',
        'popular_items'            => 'Популярные категории', // для таксономий без иерархий
        'separate_items_with_commas' => 'Разделяйте категории запятыми',
        'add_or_remove_items'      => 'Добавить или удалить категорию',
        'choose_from_most_used'    => 'Выбрать из часто используемых категорий',
        'not_found'                => 'Категория не найден',
        'back_to_items'            => '← Назад к полам',
    );
    $args = array(
        'labels'                => $labels,
        'label'                 => 'Категории',
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'show_in_nav_menus'     => true,
        'show_in_rest'          => false,
        'rest_base'             => 'url_rest',
        'rest_controller_class' => 'WP_REST_Terms_Controller',
        'show_tagcloud'         => true,
        'show_in_quick_edit'    => true,
        'meta_box_cb'           => null,
        'show_admin_column'     => true,
        'description'           => '',
        'hierarchical'          => true,
        'update_count_callback' => '',
        'query_var'             => $taxonomy,
        'rewrite'               => true,
        'sort'                  => true,
        '_builtin'              => false,
    );
    register_taxonomy('product-category', array('products'), $args);
}

register_post_type('recipes', [
    'label' => null,
    'labels' => [
        'name' => 'Рецепты', // основное название для типа записи
        'singular_name' => 'Рецепт', // название для одной записи этого типа
        'add_new' => 'Добавить рецепт', // для добавления новой записи
        'add_new_item' => 'Добавление рецепта', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редактировать рецепт', // для редактирования типа записи
        'new_item' => 'Новый рецепт', // текст новой записи
        'view_item' => 'Посмотреть рецепт', // для просмотра записи этого типа.
        'search_items' => 'Искать рецепт', // для поиска по этим типам записи
        'not_found' => 'не найлено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
        'parent_item_colon' => '', // для родителей (у древовидных типов)
        'menu_name' => 'Рецепты', // название меню
    ],
    'description' => '',
    'public' => true,
    'taxonomies'		 => array( 'recipes-category' ),
    // 'publicly_queryable'  => null, // зависит от public
    // 'exclude_from_search' => null, // зависит от public
    // 'show_ui'             => null, // зависит от public
    // 'show_in_nav_menus'   => null, // зависит от public
    'show_in_menu' => null, // показывать ли в меню адмнки
    // 'show_in_admin_bar'   => null, // зависит от show_in_menu
    'show_in_rest' => null, // добавить в REST API. C WP 4.7
    'rest_base' => null, // $post_type. C WP 4.7
    'menu_position' => null,
    'menu_icon' => 'dashicons-food',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical' => false,
    'supports' => ['title','editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'has_archive' => true,
    'rewrite' => true,
    'query_var' => true,
]);
add_action( 'init', 'mayak_taxonomy_register_recipes' );
function mayak_taxonomy_register_recipes(){
    if (qtranxf_getLanguage() == 'en') {
        $labels = array(
            'name'                     => 'Рубрики', // основное название во множественном числе
            'singular_name'            => 'Рубрики', // название единичного элемента таксономии
            'menu_name'                => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items'                => 'All categories',
            'edit_item'                => 'Изменить рубрику',
            'view_item'                => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item'              => 'Обновить рубрику',
            'add_new_item'             => 'Добавить рубрику',
            'new_item_name'            => 'Название новой',
            'parent_item'              => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon'        => 'Родительская рубрика:',
            'search_items'             => 'Искать рубрику',
            'popular_items'            => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items'      => 'Добавить или удалить рубрику',
            'choose_from_most_used'    => 'Выбрать из часто используемых рубрик',
            'not_found'                => 'Рубрику не найдено',
            'back_to_items'            => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Categories',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    } elseif (qtranxf_getLanguage() == 'uk') {
        $labels = array(
            'name'                     => 'Рубрики', // основное название во множественном числе
            'singular_name'            => 'Рубрики', // название единичного элемента таксономии
            'menu_name'                => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items'                => 'Усі рубрики',
            'edit_item'                => 'Изменить рубрику',
            'view_item'                => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item'              => 'Обновить рубрику',
            'add_new_item'             => 'Добавить рубрику',
            'new_item_name'            => 'Название новой',
            'parent_item'              => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon'        => 'Родительская рубрика:',
            'search_items'             => 'Искать рубрику',
            'popular_items'            => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items'      => 'Добавить или удалить рубрику',
            'choose_from_most_used'    => 'Выбрать из часто используемых рубрик',
            'not_found'                => 'Рубрику не найдено',
            'back_to_items'            => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Рубрики',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    } elseif (qtranxf_getLanguage() == 'ru') {
        $labels = array(
            'name' => 'Рубрики', // основное название во множественном числе
            'singular_name' => 'Рубрики', // название единичного элемента таксономии
            'menu_name' => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items' => 'Все рубрики',
            'edit_item' => 'Изменить рубрику',
            'view_item' => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item' => 'Обновить рубрику',
            'add_new_item' => 'Добавить рубрику',
            'new_item_name' => 'Название новой',
            'parent_item' => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon' => 'Родительская рубрика:',
            'search_items' => 'Искать рубрику',
            'popular_items' => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items' => 'Добавить или удалить рубрику',
            'choose_from_most_used' => 'Выбрать из часто используемых рубрик',
            'not_found' => 'Рубрику не найдено',
            'back_to_items' => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Рубрики',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    }
    register_taxonomy('recipes-category', array('recipes'), $args);
}

register_post_type('news', [
    'label' => null,
    'labels' => [
        'name' => 'Новости', // основное название для типа записи
        'singular_name' => 'Новость', // название для одной записи этого типа
        'add_new' => 'Добавить новость', // для добавления новой записи
        'add_new_item' => 'Добавление новости', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редактировать новость', // для редактирования типа записи
        'new_item' => 'Новая новость', // текст новой записи
        'view_item' => 'Посмотреть новость', // для просмотра записи этого типа.
        'search_items' => 'Искать новость', // для поиска по этим типам записи
        'not_found' => 'не найлено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'Not found in the basket', // если не было найдено в корзине
        'parent_item_colon' => '', // для родителей (у древовидных типов)
        'menu_name' => 'Новости', // название меню
    ],
    'description' => '',
    'public' => true,
    'taxonomies'		 => array( 'news-category' ),
    // 'publicly_queryable'  => null, // зависит от public
    // 'exclude_from_search' => null, // зависит от public
    // 'show_ui'             => null, // зависит от public
    // 'show_in_nav_menus'   => null, // зависит от public
    'show_in_menu' => null, // показывать ли в меню адмнки
    // 'show_in_admin_bar'   => null, // зависит от show_in_menu
    'show_in_rest' => null, // добавить в REST API. C WP 4.7
    'rest_base' => null, // $post_type. C WP 4.7
    'menu_position' => null,
    'menu_icon' => 'dashicons-welcome-write-blog',
    //'capability_type'   => 'post',
    //'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
    //'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
    'hierarchical' => false,
    'supports' => ['title','editor','thumbnail'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
    'has_archive' => true,
    'rewrite' => true,
    'query_var' => true,
]);
add_action( 'init', 'mayak_taxonomy_register_news' );
function mayak_taxonomy_register_news(){
    if (qtranxf_getLanguage() == 'en') {
        $labels = array(
            'name'                     => 'Рубрики', // основное название во множественном числе
            'singular_name'            => 'Рубрики', // название единичного элемента таксономии
            'menu_name'                => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items'                => 'All categories',
            'edit_item'                => 'Изменить рубрику',
            'view_item'                => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item'              => 'Обновить рубрику',
            'add_new_item'             => 'Добавить рубрику',
            'new_item_name'            => 'Название новой',
            'parent_item'              => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon'        => 'Родительская рубрика:',
            'search_items'             => 'Искать рубрику',
            'popular_items'            => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items'      => 'Добавить или удалить рубрику',
            'choose_from_most_used'    => 'Выбрать из часто используемых рубрик',
            'not_found'                => 'Рубрику не найдено',
            'back_to_items'            => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Categories',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    } elseif (qtranxf_getLanguage() == 'uk') {
        $labels = array(
            'name'                     => 'Рубрики', // основное название во множественном числе
            'singular_name'            => 'Рубрики', // название единичного элемента таксономии
            'menu_name'                => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items'                => 'Усі рубрики',
            'edit_item'                => 'Изменить рубрику',
            'view_item'                => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item'              => 'Обновить рубрику',
            'add_new_item'             => 'Добавить рубрику',
            'new_item_name'            => 'Название новой',
            'parent_item'              => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon'        => 'Родительская рубрика:',
            'search_items'             => 'Искать рубрику',
            'popular_items'            => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items'      => 'Добавить или удалить рубрику',
            'choose_from_most_used'    => 'Выбрать из часто используемых рубрик',
            'not_found'                => 'Рубрику не найдено',
            'back_to_items'            => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Рубрики',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    } elseif (qtranxf_getLanguage() == 'ru') {
        $labels = array(
            'name' => 'Рубрики', // основное название во множественном числе
            'singular_name' => 'Рубрики', // название единичного элемента таксономии
            'menu_name' => 'Рубрики', // Название в меню. По умолчанию: name.
            'all_items' => 'Все рубрики',
            'edit_item' => 'Изменить рубрику',
            'view_item' => 'Просмотр рубрики', // текст кнопки просмотра записи на сайте (если поддерживается типом)
            'update_item' => 'Обновить рубрику',
            'add_new_item' => 'Добавить рубрику',
            'new_item_name' => 'Название новой',
            'parent_item' => 'Родительская рубрика', // только для таксономий с иерархией
            'parent_item_colon' => 'Родительская рубрика:',
            'search_items' => 'Искать рубрику',
            'popular_items' => 'Популярные категории', // для таксономий без иерархий
            'separate_items_with_commas' => 'Разделяйте рубрики запятыми',
            'add_or_remove_items' => 'Добавить или удалить рубрику',
            'choose_from_most_used' => 'Выбрать из часто используемых рубрик',
            'not_found' => 'Рубрику не найдено',
            'back_to_items' => '← Назад к полам',
        );
        $args = array(
            'labels'                => $labels,
            'label'                 => 'Рубрики',
            'public'                => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'show_in_nav_menus'     => true,
            'show_in_rest'          => false,
            'rest_base'             => 'url_rest',
            'rest_controller_class' => 'WP_REST_Terms_Controller',
            'show_tagcloud'         => true,
            'show_in_quick_edit'    => true,
            'meta_box_cb'           => null,
            'show_admin_column'     => true,
            'description'           => '',
            'hierarchical'          => true,
            'update_count_callback' => '',
            'query_var'             => $taxonomy,
            'rewrite'               => true,
            'sort'                  => true,
            '_builtin'              => false,
        );
    }
    register_taxonomy('news-category', array('news'), $args);
}
add_action('admin_menu', 'remove_menus_ssh');
function remove_menus_ssh(){
    global $menu;
    $restricted = array(
//        __('Dashboard'),  //главная страница админки (консоль управления)
        __('Posts'),      //пункт меню "Записи"
//        __('Media'),      //пункт меню "Медиафайлы" (картинки, видео и пр.)
//        __('Links'),      //в общем-то не нужный, пункт меню "Ссылки" - настраивается единожды
//        __('Pages'),      //пункт меню "Страницы"
//        __('Appearance'), //пункт меню "Внешний вид"
//        __('Tools'),      //пункт меню "инструменты" — "импорт", "экспорт" и проч.
//        __('Users'),      //пользователи сайта
//        __('Settings'),   //пункт меню "Настройки". Просто необходимо скрыть...
        __('Comments'),   //комментарии
//        __('Plugins')     //пункт меню "Плагины"
    );
    end ($menu);
    while (prev($menu)){
        $value = explode(' ', $menu[key($menu)][0]);
        if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
            unset($menu[key($menu)]);
        }
    }
}
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title' 	=> 'Параметры',
        'menu_title'	=> 'Параметры темы',
        'menu_slug' 	=> 'theme-general-settings',
        'capability'	=> 'edit_posts',
        'redirect'		=> false
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Header',
        'menu_title'	=> 'Header',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Footer',
        'menu_title'	=> 'Footer',
        'parent_slug'	=> 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры общие',
        'menu_title'	=> 'Общие',
        'parent_slug'	=> 'theme-general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' 	=> 'Параметры Контакты',
        'menu_title'	=> 'Контакт',
        'parent_slug'	=> 'theme-general-settings',
    ));

}
function cf_search_join( $join ) {
    global $wpdb;
    if ( is_search() ) {
        $join .=' LEFT JOIN '.$wpdb->postmeta. ' ON '. $wpdb->posts . '.ID = ' . $wpdb->postmeta . '.post_id ';
    }
    return $join;
}
add_filter( 'posts_join', 'cf_search_join' );
function cf_search_where( $where ) {
    global $pagenow, $wpdb;
    if ( is_search() ) {
        $where = preg_replace(
            "/\(\s*".$wpdb->posts.".post_title\s+LIKE\s*(\'[^\']+\')\s*\)/",
            "(".$wpdb->posts.".post_title LIKE $1) OR (".$wpdb->postmeta.".meta_value LIKE $1)", $where );
    }
    return $where;
}
add_filter( 'posts_where', 'cf_search_where' );
function cf_search_distinct( $where ) {
    global $wpdb;
    if ( is_search() ) {
        return "DISTINCT";
    }
    return $where;
}
add_filter( 'posts_distinct', 'cf_search_distinct' );

// длина заголовка
function the_title_excerpt($before = '', $after = '', $echo = true, $length = false)
{
    mb_internal_encoding('UTF-8');
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = mb_substr($title, 0, $length);
    }

    if (strlen($title) > 0) {
        $title = apply_filters('the_title_excerpt', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}

function the_title_content($before = '', $after = '', $echo = true, $length = false)
{
    mb_internal_encoding('UTF-8');
    $postpers_id = get_the_ID();
    $title = get_field('kratkoe_opysanye_na_rozvodyashhuyu', $postpers_id);
    if ($length && is_numeric($length)) {
        $title = mb_substr($title, 0, $length);
    }

    if (strlen($title) > 0) {
        $title = apply_filters('the_title_content', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}