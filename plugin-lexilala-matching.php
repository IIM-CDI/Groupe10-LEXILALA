<?php
/*
Template Name: Jeu de carte
*/
get_header();
?>
<main class="jeu-de-carte">
    <?php
    while ( have_posts() ) :
        the_post();
        the_content(); 
    endwhile;
    ?>
</main>
<?php get_footer(); ?>
