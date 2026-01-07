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
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/logo_lexilala 1.svg' ); ?>" 
             alt="<?php bloginfo( 'name' ); ?>" 
             class="site-logo">
      </a>
    </div>

    <nav class="site-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Menu Principal', 'lexilala' ); ?>">
      <?php
      if ( has_nav_menu( 'primary' ) ) {
        wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_class'     => 'nav-menu',
          'container'      => false,
        ) );
      } else {
        $menu_items = lexilala_get_default_menu_items();
        echo '<ul class="nav-menu">';
        foreach ( $menu_items as $item ) {
          printf(
            '<li><a href="%s">%s</a></li>',
            esc_url( $item['url'] ),
            esc_html( $item['title'] )
          );
        }
        echo '</ul>';
      }
      ?>
    </nav>

    <div class="language-switch">
      <?php if (function_exists('pll_current_language')) : ?>
        <?php
        // Get current language name
        $current_lang_name = pll_current_language('name');
        $current_lang_slug = pll_current_language('slug');
        
        // Get all configured languages
        $all_langs = pll_languages_list(array('fields' => array()));
        ?>
        
        <button class="lang-toggle" id="lang-toggle" aria-label="<?php esc_attr_e( 'Changer de langue', 'lexilala' ); ?>" aria-haspopup="true" aria-expanded="false">
          <span class="current-lang"><?php echo esc_html($current_lang_name); ?></span>
          <span class="arrow">▾</span>
        </button>
        
        <ul class="lang-dropdown" id="lang-dropdown" role="menu">
          <?php if ($all_langs) : ?>
            <?php foreach ($all_langs as $lang) : ?>
              <?php 
              $lang_url = pll_home_url($lang->slug);
              $is_current = ($lang->slug === $current_lang_slug);
              ?>
              <li role="menuitem">
                <a href="<?php echo esc_url($lang_url); ?>" 
                   hreflang="<?php echo esc_attr($lang->slug); ?>"
                   <?php echo $is_current ? 'aria-current="page"' : ''; ?>>
                  <?php echo esc_html($lang->name); ?>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      <?php else : ?>
        <!-- Fallback si Polylang n'est pas activé -->
        <button class="lang-toggle" id="lang-toggle" aria-label="<?php esc_attr_e( 'Changer de langue', 'lexilala' ); ?>" aria-haspopup="true" aria-expanded="false">
          <span class="current-lang"><?php esc_html_e( 'Français', 'lexilala' ); ?></span>
          <span class="arrow">▾</span>
        </button>
        <ul class="lang-dropdown" id="lang-dropdown" role="menu">
          <?php
          $languages = lexilala_get_languages();
          if ( ! empty( $languages ) ) {
            foreach ( $languages as $lang ) {
              printf(
                '<li role="menuitem"><a href="#" data-lang="%s">%s</a></li>',
                esc_attr( strtolower( $lang->name ) ),
                esc_html( $lang->name )
              );
            }
          }
          ?>
        </ul>
      <?php endif; ?>
    </div>

  </div>
</header>
