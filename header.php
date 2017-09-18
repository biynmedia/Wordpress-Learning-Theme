<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <!-- Encodage de la Page -->
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <!-- Titre de la Page -->
    <title><?php wp_title(); ?></title>
    <!-- Affichage pour les mobiles -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <!-- Chargement de l'Entete WP | OBLIGATOIRE -->
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    
    <!-- Le Contenu de ma Page -->
    <div class="page">
           
        <p><?php bloginfo( 'name' ); ?> : <?php bloginfo( 'description' ); ?></p>
        
        <!-- TOPHEADER -->
        <div class="topheader">
            <p><i class="fa fa-users" aria-hidden="true"></i> Espace Clients : 
            <a href="<?php echo wp_login_url(); ?>">Connexion</a> | 
            <a href="<?php echo wp_registration_url(); ?>">Inscription</a></p>
        </div>
        
        <!-- HEADER -->
        <header>
            <div class="logo">
                <?php
                    # https://developer.wordpress.org/themes/functionality/custom-logo/
                    # Je vérifie que WP prend en charge cette fonctionnalité
                    if( function_exists( 'the_custom_logo' ) ) {
                        # Si un "custom logo" à été défini
                        if( has_custom_logo() ) {
                            the_custom_logo();
                        }
                        # Sinon, j'affiche mon logo par défaut.
                        else {
                            echo '<img src="'.get_template_directory_uri().'/assets/img/isen-groupe.jpg" alt="Logo ISEN">';
                        }
                    }
                ?>
            </div>
            <nav>
                <!-- Menu Principal | Menu du Haut -->
                <?php wp_nav_menu( array( 'theme_location' => 'lyon-menu' ) ) ?>
            </nav>
        </header>
        
        
    </div> <!-- FIN CLASS PAGE -->
        
    <!-- PROJECTEUR -->
    <div id="projecteur">
        <?php
            if( has_post_thumbnail() AND get_post_type() == 'page' ) :
                echo get_the_post_thumbnail();
            else :
                if(has_header_image()) : ?>
                    <img src="<?php header_image(); ?>" 
                        width="<?php echo get_custom_header()->width; ?>" 
                        height="" alt="BandeauDuHaut">
                <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/bandeauDuHaut.jpg" alt="BandeauDuHaut">
            <?php endif;
            endif;
        ?>        
    </div>

