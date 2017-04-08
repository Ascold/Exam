<?php
/**
 * GEEKHUB_EXAM_MEDVEDEV functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package GEEKHUB_EXAM_MEDVEDEV
 */

if (!function_exists('geekhub_exam_medvedev_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function geekhub_exam_medvedev_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on GEEKHUB_EXAM_MEDVEDEV, use a find and replace
         * to change 'geekhub_exam_medvedev' to the name of your theme in all the template files.
         */
        load_theme_textdomain('geekhub_exam_medvedev', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
//    add_image_size('front-page-slider-image', 1400, 460, true);

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'geekhub_exam_medvedev'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('geekhub_exam_medvedev_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');
    }
endif;
add_action('after_setup_theme', 'geekhub_exam_medvedev_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function geekhub_exam_medvedev_content_width()
{
    $GLOBALS['content_width'] = apply_filters('geekhub_exam_medvedev_content_width', 640);
}

add_action('after_setup_theme', 'geekhub_exam_medvedev_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function geekhub_exam_medvedev_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'geekhub_exam_medvedev'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'geekhub_exam_medvedev'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));
}

add_action('widgets_init', 'geekhub_exam_medvedev_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function geekhub_exam_medvedev_scripts()
{
    wp_enqueue_style('geekhub_exam_medvedev-style', get_stylesheet_uri());

    wp_enqueue_script('geekhub_exam_medvedev-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

    wp_enqueue_script('geekhub_exam_medvedev-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

    //Register jQuery
    wp_enqueue_script('jquery');
    //Register owl-carousel files
    wp_enqueue_script('OwlCarousel-scripts', get_stylesheet_directory_uri() . '/libs/OwlCarousel/dist/owl.carousel.min.js', array('jquery'), ' ');
    wp_enqueue_style('OwlCarousel', get_template_directory_uri() . '/libs/OwlCarousel/dist/assets/owl.carousel.min.css', array(), ' ');
//    //Register bootstrap css from CDN
//    wp_register_style('bootstrap-css', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css');
//    wp_enqueue_style('bootstrap-css');
//    //Register bootstrap js from CDN
//    wp_register_script('bootstrap-js', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js');
//    wp_enqueue_script('bootstrap-js');
    //Register Font Awesome
    wp_register_script('font-awesome', '//use.fontawesome.com/6eebe0124d.js');
    wp_enqueue_script('font-awesome');
    //Register main.js file
    wp_enqueue_script('main-js-file', get_template_directory_uri() . '/js/main.js');
    //Register main.css file
    $theme_uri = get_template_directory_uri();
    wp_register_style('bfanna-theme-style', $theme_uri . '/css/main.css', false, '0.1');
    wp_enqueue_style('bfanna-theme-style');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'geekhub_exam_medvedev_scripts');

/**
 * Loading google fonts
 */
function load_fonts()
{
    wp_register_style('et-googleFonts', 'https:fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet');
    wp_enqueue_style('et-googleFonts');
}
add_action('wp_print_styles', 'load_fonts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

add_action('customize_register', function ($customizer) {
    $customizer->add_section(
        'footer',
        array(
            'title' => 'Редактировать контент футера',
            'description' => 'Редактировать контент футера',
            'priority' => 11,
        )
    );
    $customizer->add_setting(
        'slider-title',
        array('default' => 'Featured Clients')
    );
    $customizer->add_control(
        'slider-title',
        array(
            'label' => 'Заголовок слайдера',
            'section' => 'footer',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'contact-title',
        array('default' => 'Contact Us:')
    );
    $customizer->add_control(
        'contact-title',
        array(
            'label' => 'Заголовок раздела контакты',
            'section' => 'footer',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'contact-desc',
        array('default' => 'input your text')
    );
    $customizer->add_control(
        'contact-desc',
        array(
            'label' => 'Описание раздела контакты',
            'section' => 'footer',
            'type' => 'textarea',
        )
    );
    $customizer->add_setting(
        'phone',
        array('default' => '+1 123 4567 891')
    );
    $customizer->add_control(
        'phone',
        array(
            'label' => 'Телефон',
            'section' => 'footer',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'address',
        array('default' => '123 Office, Street No 2, Parkview.
Sednney, Australia.')
    );
    $customizer->add_control(
        'address',
        array(
            'label' => 'Адресс',
            'section' => 'footer',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'google_map',
        array('default' => 'koordinats'));

    $customizer->add_control(
        'google_map',
        array('label' => 'Карта',
            'section' => 'footer',
            'type' => 'text',
        )
    );
    $customizer->add_setting(
        'copyright',
        array('default' => ' © 2015  All Rights Reserved.'));

    $customizer->add_control(
        'copyright',
        array('label' => 'Копирайт',
            'section' => 'footer',
            'type' => 'text',
        )
    );
});

function add_metabox()
{
    //Add metabox to front page
    global $post;
    if ($post->ID == 15) :
        add_meta_box(
            'section_1', // Идентификатор(id)
            'Редактирование контента страницы', // Заголовок области с мета-полями(title)
            'show_my_metabox', // Вызов(callback)
            'page', // Где будет отображаться наше поле
            'normal',
            'high');
    endif;
}

add_action('add_meta_boxes', 'add_metabox'); // Запускаем функцию

$meta_fields = array(
    array(
        'label' => 'Заголовок #1 1 секции',
        'desc' => 'Контент',
        'id' => 'section1-h1',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Заголовок #2 1 секции',
        'desc' => 'Контент',
        'id' => 'section1-h2',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Заголовок #3 1 секции',
        'desc' => 'Контент',
        'id' => 'section1-h3',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Текстовое поле 1 секции',
        'desc' => 'Контент',
        'id' => 'section1-textarea',  // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Заголовок #1 2 секции',
        'desc' => 'Контент',
        'id' => 'section2-h1',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Текстовое поле 2 секции',
        'desc' => 'Контент',
        'id' => 'section2-textarea',  // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Заголовок #1 3 секции',
        'desc' => 'Контент',
        'id' => 'section3-h1',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Текстовое поле 3 секции',
        'desc' => 'Контент',
        'id' => 'section3-textarea',  // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Заголовок #1 4 секции',
        'desc' => 'Контент',
        'id' => 'section4-h1',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Текстовое поле 4 секции',
        'desc' => 'Контент',
        'id' => 'section4-textarea',  // даем идентификатор.
        'type' => 'textarea'  // Указываем тип поля.
    ),
    array(
        'label' => 'Вкладка 1',
        'desc' => 'Контент',
        'id' => 'Tab-1',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Вкладка 2',
        'desc' => 'Контент',
        'id' => 'Tab-2',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Вкладка 3',
        'desc' => 'Контент',
        'id' => 'Tab-3',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Вкладка 4',
        'desc' => 'Контент',
        'id' => 'Tab-4',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    ),
    array(
        'label' => 'Вкладка 5',
        'desc' => 'Контент',
        'id' => 'Tab-5',  // даем идентификатор.
        'type' => 'text'  // Указываем тип поля.
    )
);

// Вызов метаполей
function show_my_metabox()
{
    global $meta_fields; // Обозначим наш массив с полями глобальным
    global $post;  // Глобальный $post для получения id создаваемого/редактируемого поста
// Выводим скрытый input, для верификации. Безопасность прежде всего!
    echo '<input type="hidden" name="custom_meta_box_nonce" value="' . wp_create_nonce(basename(__FILE__)) . '" />';

    // Начинаем выводить таблицу с полями через цикл
    echo '<table class="form-table">';
    foreach ($meta_fields as $field) {
        // Получаем значение если оно есть для этого поля
        $meta = get_post_meta($post->ID, $field['id'], true);
        // Начинаем выводить таблицу
        echo '<tr> 
                <th><label for="' . $field['id'] . '">' . $field['label'] . '</label></th> 
                <td>';
        switch ($field['type']) {
            case 'text':
                echo '<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" value="' . $meta . '" size="30" />
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
            case 'textarea':
                echo '<textarea name="' . $field['id'] . '" id="' . $field['id'] . '" cols="80" rows="10">' . $meta . '</textarea> 
        <br /><span class="description">' . $field['desc'] . '</span>';
                break;
        }
        echo '</td></tr>';
    }
    echo '</table>';
}


// Пишем функцию для сохранения
function save_my_meta_fields($post_id)
{
    global $meta_fields;  // Массив с нашими полями

    // проверяем наш проверочный код
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__)))
        return $post_id;
    // Проверяем авто-сохранение
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // Проверяем права доступа
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
    } elseif (!current_user_can('edit_post', $post_id)) {
        return $post_id;
    }

    // Если все отлично, прогоняем массив через foreach
    foreach ($meta_fields as $field) {
        $old = get_post_meta($post_id, $field['id'], true); // Получаем старые данные (если они есть), для сверки
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {  // Если данные новые
            update_post_meta($post_id, $field['id'], $new); // Обновляем данные
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old); // Если данных нету, удаляем мету.
        }
    } // end foreach
}

add_action('save_post', 'save_my_meta_fields'); // Запускаем функцию сохранения

function create_posttype()
{
    //Registering post-type for section We are Offering on front page
    register_post_type('offering_post',
        array(
            'labels' => array(
                'name' => __('Offerings'),
                'singular_name' => __('offering'),
                'add_new' => __('New offering'),
                'edit_item' => __('Change offering')
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('thumbnail', 'title', 'editor')
        )
    );
    //Registering post-type for tabs
    register_post_type('latest_works_post',
        array(
            'labels' => array(
                'name' => __('Latest works'),
                'singular_name' => __('Latest work'),
                'add_new' => __('New works'),
                'edit_item' => __('Change Latest work')
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('thumbnail', 'title', 'editor'),
            'taxonomies' => array('category'),
        )
    );
    //Registering post-type for slider
    //Registering post-type for carousel on front page
    register_post_type('slider_post',
        array(
            'labels' => array(
                'name' => __('Slides'),
                'singular_name' => __('Slide'),
                'add_new' => __('New slide'),
                'menu_name' => __('Slides'),
                'edit_item' => __('Change slide')
            ),
            'public' => false,
            'show_ui' => true,
            'show_in_menu' => true,
            'query_var' => true,
            'rewrite' => true,
            'supports' => array('thumbnail', 'title')
        )
    );
}

add_action('init', 'create_posttype');