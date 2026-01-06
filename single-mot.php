<?php get_header(); ?>

<main class="mot-page">

  <?php while ( have_posts() ) : the_post(); ?>

    <h1 class="mot-title"><?php the_title(); ?></h1>

    <div class="mot-wrapper">

      <!-- Image -->
      <div class="mot-image">
        <?php if ( has_post_thumbnail() ) : ?>
          <?php the_post_thumbnail('large'); ?>
        <?php endif; ?>
      </div>

      <!-- Traductions -->
      <div class="mot-content">

        <?php
        $traductions = get_post_meta( get_the_ID(), 'traductions', true );
        ?>

        <?php if ( ! empty( $traductions ) && is_array( $traductions ) ) : ?>
          <ul class="mot-traductions">
            <?php foreach ( $traductions as $traduction ) : ?>
              <li class="mot-traduction">
                <span class="mot-langue">
                  <?php echo esc_html( $traduction['langue'] ); ?>
                </span>
                <span class="mot-texte">
                  <?php echo esc_html( $traduction['texte'] ); ?>
                </span>
              </li>
            <?php endforeach; ?>
          </ul>
        <?php else : ?>
          <p>Aucune traduction disponible.</p>
        <?php endif; ?>

      </div>

    </div>

  <?php endwhile; ?>

</main>

<?php get_footer(); ?>
