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
  wp_enqueue_style(
    'theme-main-style',
    get_template_directory_uri() . '/assets/dist/main.css',
    array(),
    '1.0'
  );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_assets' );


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

function lexilala_enqueue_fonts() {
  wp_enqueue_style(
    'noto-sans-font',
    'https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
    array(),
    null
  );
}
add_action( 'wp_enqueue_scripts', 'lexilala_enqueue_fonts' );

function theme_enqueue_styles() {

    // CSS global
    wp_enqueue_style(
        'theme-main-style',
        get_template_directory_uri() . '/assets/dist/main.css',
        [],
        filemtime( get_template_directory() . '/assets/dist/main.css' )
    );

    // CSS spécifique à la front page
    if ( is_front_page() ) {
        wp_enqueue_style(
            'theme-front-page-style',
            get_template_directory_uri() . '/assets/dist/front-page.css',
            [],
            filemtime( get_template_directory() . '/assets/dist/front-page.css' )
        );
    }
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');

function mon_theme_enqueue_styles() {
    wp_enqueue_style('mon-theme-style', get_template_directory_uri() . '/assets/css/main.css', [], '1.0', 'all');
}
add_action('wp_enqueue_scripts', 'mon_theme_enqueue_styles');
