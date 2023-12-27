<?php

add_action('wp_enqueue_scripts', 'theme_enqueue_styles');
function theme_enqueue_styles()
{
    
    wp_enqueue_style('parent-style', get_template_directory().'/style.css');

    wp_enqueue_style('theme-style', get_stylesheet_directory_uri() . '/style.css', array(), filemtime(get_stylesheet_directory() . '/style.css'));
    wp_enqueue_style('theme-style-2', get_stylesheet_directory_uri() . '/css/theme.css', array(), filemtime(get_stylesheet_directory() . '/css/theme.css'));

}


function generateMenu($items, $args) {
    // Vérifier si l'utilisateur est connecté
    if (is_user_logged_in()) {
        // Si l'utilisateur est connecté, ajouter le lien "Admin" 
        $items =  $items .'<li id="admin"><a href="' . admin_url() . '">Admin</a></li>' ;
    }

    // Retourner le menu final
    return $items;
}

// le filtre pour manipuler le menu
add_filter('wp_nav_menu_items', 'generateMenu', 10, 2);

?>