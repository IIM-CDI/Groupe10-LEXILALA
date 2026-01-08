<?php
/*
Template Name: Jeu Histoire
*/
get_header();
?>
<div class="jeu-histoire-wrapper">
<?php

if (have_posts()) :
    while (have_posts()) : the_post();
        the_content();
    endwhile;
endif;
?>

<div class="new-story-wrapper">
  
</div>

    <div class="new-story-output" id="new-story-output" style="margin-top:1rem;">
	</div>
</div>


<?php get_footer(); ?>
