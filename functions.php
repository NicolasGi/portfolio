<?php
//menu//
register_nav_menu('main-menu', 'Le menu de navigation principal');

/**
 * Retrieves navigation objects (links) for given custom locaction
 *
 * @param string $location      The nav_menu location (main, social, ...)
 * @param string $baseClass     A CSS class to use for BEM syntax
 **/

function pt_get_menu($location, $baseClass) {
    global $post;

    $items = [];

    // On va remplir le tableau $items
    // 1. Récupérer la structure du menu WP pour $location
    $locations = get_nav_menu_locations();
    $id = $locations[$location];
    $menu = wp_get_nav_menu_items($id);

    foreach($menu as $i => $object) {
        // 2. On va formater chaque lien récupérer en un objet qui contient :
        $item = new stdClass();
        //      - l'URL du lien
        $item->url = $object->url;
        //      - le label du lien
        $item->label = $object->title;
        //      - l'état "current" du lien
        $isTargettingHome = rtrim($object->url, '/') == rtrim(home_url(), '/');
        $item->current = (is_home() && $isTargettingHome) || ($object->object_id == $post->ID);
        //      - l'état "target" du lien
        $item->target = $object->target;
        //      - les éventuelles classes CSS
        $item->classes = array_map(function($item) use ($baseClass) {
            return $baseClass . '--' . $item;
        }, array_filter(array_merge([$item->current ? 'current' : null], $object->classes)));

        array_unshift($item->classes, $baseClass);

        $items[] = $item;
    }

    return $items;
}

register_post_type('projects', [
    'label' => 'Projects',
    'labels' => [
        'name' => 'Projects',
        'singular_name' => 'Projects',
        'all_items' => 'All Projects',
        'add_new' => 'Add new Projects',
        'add_new_item' => 'Add Projects',
        'edit_item' => 'Modify Projects',
    ],

    'public' => true,
    'menu_position' => 5,
    'description' => 'Les projects realisés ',
    'menu_icon' => 'dashicons-html',
    'rewrite' => array('slug' => 'historic/exhibitions')
]);
register_post_type('about', [
    'label' => 'About',
    'labels' => [
        'name' => 'About',
        'singular_name' => 'About',
        'all_items' => 'All About',
        'add_new' => 'Add new About',
        'add_new_item' => 'Add About',
        'edit_item' => 'Modify About',
    ],

    'public' => true,
    'menu_position' => 5,
    'description' => 'Description sur Nicolas Gilson',
    'menu_icon' => 'dashicons-admin-users',
    'rewrite' => array('slug' => 'historic/exhibitions')
]);

function pt_add_filters_image(array $element)
{
    $element[] = 'project_img';
    return $element;
}
add_filter('rwp_add_filter', 'pt_add_filters_image');


function pt_get_theme_asset($asset)
{
    return get_stylesheet_directory_uri() .'/' . ltrim($asset, '/');
}

function pt_get_title($separator = "|", $displayTitleLeft = true)
{
    $separator = ' ' . $separator . ' ';

    $title = trim(wp_title('', false, 'right'));
    if(!$title) {
        return get_bloginfo('name');
    }

    if($displayTitleLeft) {
        return $title . $separator . get_bloginfo('name');
    } else {

        return get_bloginfo('name') . $separator . $title;
    }
}
function pt_wp_query(string $elementType, int $ElementNumber )
{
    $loop = new WP_Query([
        'post_type' => $elementType,
        'posts_per_page' => $ElementNumber,
        'rwp_settings' => array(
            'sizes' => array('thumbnail', 'medium', 'large'),
            'media_queries' => array(
                'medium' => 'min-width: 500px',
                'large' => 'min-width: 1024px'
            )
        )
    ]);
    return $loop;
}


