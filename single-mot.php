<?php
get_header();
?>

<main id="primary" class="site-main">

<?php while ( have_posts() ) : the_post(); ?>

<article <?php post_class(); ?>>

    <div class="mot-page">

        <!-- TITRE -->
        <h1 class="mot-title"><?php the_title(); ?></h1>

        <!-- CONTENU ET IMAGE -->
        <div class="mot-wrapper">

            <!-- IMAGE À LA UNE -->
            <div class="mot-image">
                <?php
                if ( has_post_thumbnail() ) {
                    the_post_thumbnail( 'large' );
                }
                ?>
            </div>

            <!-- CONTENU / TRADUCTIONS -->
            <div class="mot-contenu">
                <?php the_content(); ?>
            </div>

        </div>

    </div>

</article>

<?php endwhile; ?>

</main>

<?php
/*get_footer();*/
