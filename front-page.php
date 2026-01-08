<?php get_header(); ?>

<!-- <main class="home">

  <section class="home-hero">
    <div class="hero-container">

      <h1>
        <span class="brand">LEXILALA</span><br>
        d'une langue à l'autre
      </h1>

      <p class="hero-text">
        <strong>Lexilala</strong> est un site interactif pour faciliter la communication
        entre les structures éducatives (crèches, écoles, collèges...)
        et les familles dont le français n'est pas la langue première.
        <br><br>
        Le site propose une liste de plus de
        <strong>700 mots clés et expressions d'usage</strong>
        fréquents dans les structures de la Petite Enfance et en contexte scolaire,
        traduits en 17 langues, plus le français !
      </p>

      <form class="hero-search">
        <input type="search" placeholder="Rechercher un mot">
      </form>

    </div>
  </section>

  <section class="home-how">
    <div class="how-container">

      <h2>Comment utiliser Lexilala ?</h2>

      <div class="how-content">
        <div class="how-text">
          <p>
            Lexilala est un outil de traduction pensé pour faciliter la médiation.
          </p>

          <p>
            Contrairement à un traducteur automatique, le site propose des traductions
            de termes spécifiques au contexte éducatif français, en ayant parfois
            recours à des périphrases pour expliquer chaque concept.
          </p>

          <p>
            En plus de consulter les traductions écrites et orales des termes,
            vous pouvez également générer pour les mots de votre choix une carte-image
            en sélectionnant les langues pertinentes dans votre contexte.
          </p>
        </div>

        <div class="how-card">
          <!-- future image slider -->
        <!-- </div>
      </div>

      <div class="how-arrows">
        <button class="arrow prev"></button>
        <button class="arrow next"></button>
      </div>

    </div>
  </section> -->
<!-- 
</main> -->

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

