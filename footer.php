<footer class="site-footer">

  <section class="footer-newsletter">
    <div class="newsletter-container">

      <h2>
        Abonnez-vous à Dulala pour ne rien manquer<br>
        sur les nouveautés
      </h2>

      <form class="newsletter-form">
        <div class="form-row">
          <div class="form-field">
            <label>Adresse e-mail</label>
            <input type="email" placeholder="Saisir votre adresse e-mail">
          </div>

          <div class="form-field">
            <label>Pays</label>
            <select>
              <option>Sélectionner votre pays</option>
            </select>
          </div>
        </div>

        <div class="form-consent">
          <input type="checkbox" id="consent">
          <label for="consent">
            J'accepte de recevoir vos e-mails et confirme avoir pris connaissance
            de votre politique de confidentialité et mentions légales.
            Je comprends que je peux me désabonner à tout moment
          </label>
        </div>

        <button type="submit" class="newsletter-button">
          S'abonner
        </button>
      </form>

    </div>
  </section>

  <section class="footer-social">
    <div class="social-icons">
      <a href="#" aria-label="Instagram" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ICON_INSTAGRAM.svg" alt="Instagram">
      </a>
      <a href="#" aria-label="YouTube" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ICON_YOUTUBE.svg" alt="YouTub">
      </a>
      <a href="#" aria-label="LinkedIn" class="social-icon">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/ICON_LINKEDIN.svg" alt="LinkedIn">
      </a>
    </div>
  </section>

  <section class="footer-main">
    <div class="footer-container">

      <div class="footer-brand">
        <?php
          $logo_url = get_template_directory_uri() . '/assets/images/LOGO.svg';
          $logo_file = get_template_directory() . '/assets/images/LOGO.svg';
        ?>
        <?php if ( file_exists( $logo_file ) ) : ?>
          <img class="footer-logo" src="<?php echo esc_url( $logo_url ); ?>" alt="<?php echo esc_attr( bloginfo( 'name' ) ); ?>">
        <?php else : ?>
          <img class="footer-logo" src="<?php echo get_template_directory_uri(); ?>/wp-content/themes/Lexilala/LOGO.svg" alt="Lexilala">
        <?php endif; ?>
        <p>
          Ces contenus sont mis à disposition selon les termes de la Licence Creative Commons Attribution -
          Pas d'Utilisation Commerciale - Partage dans les Mêmes Conditions 3.0 France.
        </p>
      </div>

      <div class="footer-column">
        <h4>Lexilala</h4>
        <ul>
          <li><a href="#">À propos de nous</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Accès Rapide</h4>
        <ul>
          <li><a href="#">Les mots</a></li>
          <li><a href="#">Les jeux</a></li>
          <li><a href="#">Ressources</a></li>
        </ul>
      </div>

      <div class="footer-column">
        <h4>Légal</h4>
        <ul>
          <li><a href="#">Politique de confidentialité</a></li>
          <li><a href="#">Gestion des cookies</a></li>
          <li><a href="#">Conditions générales</a></li>
        </ul>
      </div>

    </div>
  </section>

</footer>

<?php wp_footer(); ?>
</body>
</html>

