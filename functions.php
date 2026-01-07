<?php
// Fonctions du thème
if ( ! function_exists( 'lexilala_setup' ) ) {
	function lexilala_setup() {
		add_theme_support( 'custom-logo', array(
            'flex-height' => true,
            'flex-width'  => true,
        ) );
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'lexilala' ),
		) );
	}
	add_action( 'after_setup_theme', 'lexilala_setup' );
}

function theme_enqueue_assets() {
  // CSS
  wp_enqueue_style(
    'theme-main-style',
    get_template_directory_uri() . '/assets/dist/main.css',
    array(),
    '1.0'
  );
  
  // JavaScript
  wp_enqueue_script(
    'theme-header-js',
    get_template_directory_uri() . '/assets/js/header.js',
    array(),
    '1.0',
    true
  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );

/**
 * Fallback menu: affiche des liens vers les catégories "Jeux" et "Ressources" si aucun menu n'est défini.
 */
function lexilala_primary_menu_fallback() {
  $cats = array( 'Jeux', 'Ressources' );
  echo '<ul class="nav-menu">';
  foreach ( $cats as $name ) {
    $term = term_exists( $name, 'category' );
    if ( $term !== 0 && $term !== null ) {
      $term_id = is_array( $term ) ? $term['term_id'] : $term;
      $link = get_category_link( $term_id );
    } else {
      $slug = sanitize_title( $name );
      $link = home_url( '/category/' . $slug . '/' );
    }
    printf( '<li><a href="%s">%s</a></li>', esc_url( $link ), esc_html( $name ) );
  }
  echo '</ul>';
}

/**
 * Get available languages from database
 */
function lexilala_get_languages() {
  global $wpdb;
  
  $languages = wp_cache_get('lexilala_languages');
  
  if (false === $languages) {
    $languages = $wpdb->get_results(
      "SELECT id, name FROM languages ORDER BY name ASC"
    );
    wp_cache_set('lexilala_languages', $languages, '', 3600);
  }
  
  return $languages ? $languages : array();
}

/**
 * Get default menu items if no menu is assigned
 */
function lexilala_get_default_menu_items() {
  return array(
    array(
      'url' => home_url('/mots/'),
      'title' => __('Les mots', 'lexilala')
    ),
    array(
      'url' => home_url('/jeux/'),
      'title' => __('Jeux', 'lexilala')
    ),
    array(
      'url' => home_url('/ressources/'),
      'title' => __('Ressources', 'lexilala')
    ),
    array(
      'url' => home_url('/a-propos/'),
      'title' => __('A propos', 'lexilala')
    ),
    array(
      'url' => home_url('/contact/'),
      'title' => __('Contact', 'lexilala')
    ),
  );
}

function lexilala_enqueue_fonts() {
  wp_enqueue_style(
    'noto-sans-font',
    'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
    array(),
    null
  );
}
add_action( 'wp_enqueue_scripts', 'lexilala_enqueue_fonts' );
