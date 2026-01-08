<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<header class="site-header">
  <div class="header-container">
    <div class="site-branding">
      <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) : ?>
        <?php the_custom_logo(); ?>
      <?php else : ?>
        <a class="site-title" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
      <?php endif; ?>
    </div>

    <nav class="site-navigation" role="navigation" aria-label="Menu Principal">
      <?php if ( has_nav_menu( 'primary' ) ) : ?>
        <?php
          wp_nav_menu( array(
            'theme_location' => 'primary',
            'menu_class'     => 'nav-menu',
            'container'      => false,
            'fallback_cb'    => 'lexilala_primary_menu_fallback',
          ) );
        ?>
      <?php else : ?>
        <?php /* Pas de menu assigné — afficher le fallback directement */ ?>
        <?php lexilala_primary_menu_fallback(); ?>
      <?php endif; ?>
    </nav>

    <div class="language-switch">
      <div class="lang">
        <span class="current-lang">Français</span>
        <span class="arrow">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/FLECHE.svg" alt="Flèche vers le bas">
        </span>
      </div>
    </div>

  </div>
</header>
