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
    'jeu-histoire-css',
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

add_action('wp_ajax_new_story_post', 'get_new_story');
add_action('wp_ajax_nopriv_new_story_post', 'get_new_story');

function get_new_story() {
    $query = new WP_Query(array(
        'post_type'      => 'post',
        'posts_per_page' => 1,
        'orderby'        => 'rand',
		'cat_id' => 2
    ));

    if ($query->have_posts()) {
        $query->the_post();
        echo '<p>' . apply_filters('the_content', get_the_content()) . '</p>';
        wp_reset_postdata();
    }

    wp_die();
}

function enqueue_new_story_script() {
    wp_enqueue_script(
        'new-story-js',
        get_template_directory_uri() . '/assets/js/jeu-histoire.js',
        array('jquery'),
        null,
        true
    );

    wp_localize_script('new-story-js', 'ajaxData', array(
        'ajaxUrl' => admin_url('admin-ajax.php')
    ));
}
add_action('wp_enqueue_scripts', 'enqueue_new_story_script');

function enqueue_jeu_histoire_styles() {

    if (is_page_template('jeu-histoire.php')) {
        wp_enqueue_style(
            'theme-main-style',
            get_template_directory_uri() . '/assets/dist/jeu-histoire.css',
            array(),
            null
        );
    }

}
add_action('wp_enqueue_scripts', 'enqueue_jeu_histoire_styles');



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

// function get_random_story_html() {

//     if (
//         !get_query_var('new_story') &&
//         !isset($_GET['jkpdf'])
//     ) {
//         return '';
//     }

//     $query = new WP_Query([
//         'post_type'      => 'post',
//         'posts_per_page' => 1,
//         'orderby'        => 'rand',
//         'cat_id'         => 2
//     ]);

//     if ($query->have_posts()) {
//         $query->the_post();
//         $html = '<p>' . apply_filters('the_content', get_the_content()) . '</p>';
//         wp_reset_postdata();
//         return $html;
//     }

//     return '';
// }

// add_filter('query_vars', function ($vars) {
//     $vars[] = 'new_story';
//     return $vars;
// });

add_shortcode('jk_story', function () {

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_GET['jkpdf']) && isset($_SESSION['jk_story_id'])) {
        $post_id = $_SESSION['jk_story_id'];
        return '<p class="story">'
            . apply_filters('the_content', get_post_field('post_content', $post_id))
            . '</p>';
    }

    if (!isset($_SESSION['jk_story_id']) || isset($_POST['new_story'])) {
        $query = new WP_Query([
            'post_type' => 'post',
            'posts_per_page' => 1,
            'orderby' => 'rand',
            'cat' => 2,
        ]);

        if ($query->have_posts()) {
            $query->the_post();
            $_SESSION['jk_story_id'] = get_the_ID();
            wp_reset_postdata();
        } else {
            return '<p>No post found</p>';
        }
    }

    $post_id = $_SESSION['jk_story_id'];
    return '<p>'
        . apply_filters('the_content', get_post_field('post_content', $post_id))
        . '</p>';
});



