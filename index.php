<?php get_header(); ?>
<main>
    <?php
    // Boucle pour afficher le contenu de la page "Accueil"
    if ( have_posts() ) :
        while ( have_posts() ) : the_post();
            the_content();
        endwhile;
    endif;
    ?>
</main>

<?php get_footer(); ?>
