<?php get_header(); ?>

<main class="mots-list">

  <h1>Liste des mots</h1>

  <ul>
    <?php
    $query = new WP_Query(array(
      'post_type' => 'mot',
      'posts_per_page' => -1,
    ));

    while ( $query->have_posts() ) : $query->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>">
          <?php the_title(); ?>
        </a>
      </li>
    <?php endwhile; wp_reset_postdata(); ?>
  </ul>

</main>

<?php get_footer(); ?>
