<?php get_header(); ?>

    <!-- Suite de ma Page, après mon bandeau du haut -->
    <div class="page">
        <?php
            # https://www.smashingmagazine.com/2015/06/wordpress-custom-page-templates/
            get_template_part( 'content', 'accueil' );
        ?>
    </div>

<?php get_footer(); ?>