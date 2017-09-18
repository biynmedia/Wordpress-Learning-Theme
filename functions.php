<?php

//             ##############################################
//             #                                            # 
//  ############           Styles CSS et Script JS          ############ //
//             #                                            #
//             ##############################################


// -- Chargement des styles CSS de notre thème
function lyon_enqueue_style() {

    // -- Normalize.css
    wp_enqueue_style( "normalizecss", get_template_directory_uri().'/assets/css/normalize.css', false );

    // -- WP Style
    wp_enqueue_style( 'lyoncss', get_stylesheet_uri(), false );

    // -- Google Font
    wp_enqueue_style( 'latofont', '//fonts.googleapis.com/css?family=Lato', false );

    // -- Font Awesome CDN
    wp_enqueue_style( 'font-awesome-cdn', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
}

function lyon_enqueue_script() {
    //wp_enqueue_script( handle, src, deps );
}

add_action( 'wp_enqueue_scripts', 'lyon_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'lyon_enqueue_script' );

//             ##############################################
//             #                                            # 
//  ############          Fonctionnalités du Thème          ############ //
//             #                                            #
//             ##############################################

# Image de Logo Personnalisable
# https://developer.wordpress.org/themes/functionality/custom-logo/
add_theme_support( 'custom-logo', array(
    'height'        => 50,
    'width'         => 200,
    'flex-height'   => false,
    'flex-width'    => false,
    'header-text'   => array( 'site-title', 'site-description' )
));

# Menu Wordpress
# https://codex.wordpress.org/Function_Reference/register_nav_menu

function register_lyon_menu() {
    register_nav_menu( 'lyon-menu', 'Menu du Haut' );
}
add_action( 'init', 'register_lyon_menu' );

# Image du Header Personnalisable
add_theme_support( 'custom-header', array(
    'width'         => 1600,
    'height'        => 359,
    'default-image' => get_template_directory_uri(). '/assets/img/bandeauDuHaut.jpg',
    'uploads'       => true
));

# Register Header
register_default_headers( array(
    'bandeauDuHaut' => array(
        'url'           =>  '%s/assets/img/bandeauDuHaut.jpg',
        'thumbnail_url' =>  '%s/assets/img/bandeauDuHaut.jpg',
        'description'   =>  __( 'Proposition 1', 'isen' )
    ),
    'bandeauDuHaut2' => array(
        'url'           =>  '%s/assets/img/bandeauDuHaut2.jpg',
        'thumbnail_url' =>  '%s/assets/img/bandeauDuHaut2.jpg',
        'description'   =>  __( 'Proposition 2', 'isen' )
    )
));

# Custom background
add_theme_support( 'custom-background' );

# Création d'un CUSTOM POST TYPE
# https://wpchannel.com/creer-custom-post-types-wordpress/
add_action( 'init', 'create_post_type' );
function create_post_type() {
    register_post_type( 'accueil-news', array(
        'labels'    => array(
            'name'          =>  __( 'Accueil News' ),
            'singular_name' =>  __( 'Accueil News' )
        ),
        'public'        => true,
        'has_archive'   => false
    ));
}

# Featured Image
add_theme_support( 'post-thumbnails' );
# Featured Image avec le custom post type 'accueil-news'
add_post_type_support( 'accueil-news', 'thumbnail' );
# Création d'une dimension personnalisé dans WP
add_image_size( 'accueil-size', 500, 265, true );