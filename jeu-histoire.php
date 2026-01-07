<?php
/*
Template Name: Jeu Histoire
*/
get_header();

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<div class="new-story-wrapper">
    <button class="new-story-btn" id="new-story-btn">Nouvelle histoire</button>
</div>

    <div class="new-story-output" id="new-story-output" style="margin-top:1rem;"></div>


<?php get_footer(); ?>
