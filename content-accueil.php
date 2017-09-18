<!-- Section qui comprend : ASIDE, ARTICLE, PARTENAIRES -->
<section>

    <?php the_content(); ?>
    <?php
        $args = array(
            'post_type'      => 'accueil-news',
            'orderby'        => 'rand',
            'posts_per_page' => 1
        );

        $loop = new WP_Query( $args );

        # Vérifie si notre requète retourne au moins un résultat
        if( $loop->have_posts() ) :
            # Tant qu'il y a des résultats, je parcours les résultats dans ma boucle
            while( $loop->have_posts() ) : $loop->the_post(); global $post;

                echo'<aside>';
                    echo get_the_post_thumbnail( $id, 'accueil-size' );
                echo '</aside>';
                echo '<article>';
                echo '<h3>'. get_the_title() .'</h3>';
                echo the_content();
                echo '</article>';

            endwhile;
        endif;
    ?>
    
    <!-- ZONE PARTENAIRES -->
    <div class="partenaires">
        <h2>Nos Partenaires</h2>
        <ul>
            <li>
                <img src="assets/img/logos/cp11.jpg" alt="Logo 1">
            </li>
            <li>
                <img src="assets/img/logos/fond_norbert_segard.jpg" alt="Logo 2">
            </li>
            <li>
                <img src="assets/img/logos/frenchtech.jpg" alt="Logo 3">
            </li>
            <li>
                <img src="assets/img/logos/logo_cge_web.jpg" alt="Logo 4">
            </li>
        </ul>
    </div> <!-- FIN PARTENAIRE -->

</section>