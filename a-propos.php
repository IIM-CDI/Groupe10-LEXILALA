<?php get_header(); ?>
<main>
    <?php
        $query = new WP_Query(array(
            'post_type' => 'accueil',
            'p' => 55, // ID du post "Vos suggestions"
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