<?php
function add_scripts_styles() {

    // Регистрирую стили
    wp_register_style( 'libs', get_template_directory_uri() . '/css/libs.min.css', array());
    wp_register_style( 'main', get_template_directory_uri() . '/css/main.css', array('libs'));
    wp_register_style( 'media', get_template_directory_uri() . '/css/media.css', array('main'));

    // Подключаю стили
    wp_enqueue_style( 'libs');
    wp_enqueue_style( 'main');
    wp_enqueue_style( 'media');

    // Регистируем файл с JS скриптом
    wp_register_script( 'jquery', 'https://code.jquery.com/jquery-2.2.4.min.js', array(), NULL, true);
    wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array('jquery'), NULL, true);
// Подключаем файл с JS скриптом
    wp_enqueue_script( 'jquery');
    wp_enqueue_script( 'main');


}

//remove_action('wp_head', 'add_scripts_styles');
add_action( 'wp_enqueue_scripts', 'add_scripts_styles', 1);

add_filter( 'wp_tag_cloud', 'mystyle_tag_cloud' );
function mystyle_tag_cloud( $tags )
{
    $removeStyle = preg_replace(
        '/style="font-size: (\d+)pt;"/',
        '',
        $tags
    );

    $addClass = preg_replace(
        '/class="tag-cloud-link/',
        'class="tags-list__item__link tag-cloud-link',
        $removeStyle
    );

    $wrapped = preg_replace(
         '/(\<\a\>.*\<\/\a\>)/',
         '<li class="tags-list__item">$1</li>',
         $addClass
    );

    return $wrapped;
}

register_nav_menus( array(
    'main' => 'Меню в хедере',
    'footer' => 'Меню в футере',
));

add_filter( 'nav_menu_css_class', 'add_my_class_to_nav_menu', 10, 2 );
function add_my_class_to_nav_menu( $classes, $item ){
    $classes = [];
    $classes[] = 'nav-list__nav-item b-menu__list__item';

    return $classes;
}

add_filter( 'nav_menu_link_attributes', 'filter_nav_menu_link_attributes', 10, 4 );
function filter_nav_menu_link_attributes( $atts, $item, $args, $depth ) {
    $atts['class'] = 'nav-list__nav-item__nav-link b-menu__list__item__link';

    if ( $item->current ) {
        $atts['class'] .= ' nav-list__nav-item__nav-link--active b-menu__list__item__link--active';
    }

    return $atts;
}