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
register_nav_menus([
  'primary' => 'Menu principal',
  'footer'  => 'Menu footer',
]);
function lexilala_register_mot_cpt() {
  register_post_type('mot', array(
    'labels' => array(
      'name' => 'Mots',
      'singular_name' => 'Mot',
    ),
    'public' => true,
    'has_archive' => true,
    'menu_icon' => 'dashicons-translation',
    'supports' => array('title', 'thumbnail'),
    'rewrite' => array('slug' => 'mot'),
  ));
}
function lexila_enqueue_traduction_styles() {

    if (is_singular('traduction')) {
        wp_enqueue_style(
            'lexila-traduction-style',
            get_template_directory_uri() . '/assets/css/traduction.css',
            array(),
            '1.0',
            'all'
        );
    }

}

add_action('wp_enqueue_scripts', 'lexila_enqueue_traduction_styles');

add_action('init', 'lexilala_register_mot_cpt');
function contact_page_styles() {
    if (is_page_template('page-contact.php')) {
        wp_enqueue_style(
            'contact-css',
            get_template_directory_uri() . '/assets/css/contact.css',
            [],
            '1.0'
        );
    }
}
add_action('wp_enqueue_scripts', 'contact_page_styles');
/*add_action( 'wp_enqueue_scripts', 'lexilala_enqueue_fonts' );*/

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
function lexila_enqueue_ressource_styles() {

    if (is_singular('ressource')) {
        wp_enqueue_style(
            'lexila-ressource-style',
            get_template_directory_uri() . '/assets/css/ressource.css',
            array(),
            '1.0',
            'all'
        );
    }

}
function lexilala_force_css_debug() {
    wp_enqueue_style(
        'lexilala-force-css',
        get_template_directory_uri() . '/assets/css/force.css',
        [],
        time()
    );
}
add_action('wp_enqueue_scripts', 'lexilala_force_css_debug');
