<?php get_header(); ?>



<?php get_header(); ?>
<main>
    <?php
        $query = new WP_Query(array(
            'post_type' => 'accueil',
            'p' => 25, // ID du post "Accueil"
        ));

        if ($query->have_posts()):
            while ($query->have_posts()):
                $query->the_post();
                the_content();
            endwhile;
        endif;

        wp_reset_postdata();
        ?>
</main> 

<?php get_footer(); ?>

