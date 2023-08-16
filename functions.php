<?php
/**
 * ilogic functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ilogic
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ilogic_setup() {

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'ilogic' ),
			'footer' => esc_html__( 'Footer', 'ilogic' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);


	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 150,
			'width'       => 300,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'ilogic_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ilogic_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'ilogic' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'ilogic' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'ilogic_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ilogic_scripts() {
	wp_enqueue_style( 'ilogic-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'frontend-style', get_template_directory_uri() . '/assets/public/css/frontend.css', array(), _S_VERSION );
	wp_enqueue_script( 'ilogic-script', get_template_directory_uri() . '/assets/public/js/frontend.js', array('jquery'), _S_VERSION );

	wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/public/js/vendor/fancybox.js',array('jquery'),_S_VERSION,true);
	wp_enqueue_script( 'flickity', get_template_directory_uri() . '/assets/public/js/vendor/flickity.js',array('jquery'),_S_VERSION,true);

}
add_action( 'wp_enqueue_scripts', 'ilogic_scripts' );

function ilogic_admin_styles() {
	wp_enqueue_style( 'backend-styles', get_template_directory_uri() . '/assets/public/css/backend.css' );
}
add_action( 'admin_enqueue_scripts', 'ilogic_admin_styles' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/includes/theme-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/includes/theme-functions.php';

// Theme options

require get_template_directory() . '/includes/theme-options.php';

// Fun Facts

require get_template_directory() . '/includes/theme-facts.php';


// Register Blocks

add_action( 'init', 'register_acf_blocks' );
function register_acf_blocks() {
	register_block_type( __DIR__ . '/blocks/hero' );
    register_block_type( __DIR__ . '/blocks/section' );
	register_block_type( __DIR__ . '/blocks/accordion' );
	register_block_type( __DIR__ . '/blocks/gallery' );
	register_block_type( __DIR__ . '/blocks/team' );
	register_block_type( __DIR__ . '/blocks/columns' );
	register_block_type( __DIR__ . '/blocks/tabs' );
	register_block_type( __DIR__ . '/blocks/logos' );
	register_block_type( __DIR__ . '/blocks/simple-list' );
	register_block_type( __DIR__ . '/blocks/olsec' );
	register_block_type( __DIR__ . '/blocks/lb-carousel' );
	register_block_type( __DIR__ . '/blocks/contact-us' );
	register_block_type( __DIR__ . '/blocks/timeline' );
	register_block_type( __DIR__ . '/blocks/our-clients' );
	register_block_type( __DIR__ . '/blocks/triggers' );
	register_block_type( __DIR__ . '/blocks/certifications' );
	register_block_type( __DIR__ . '/blocks/publications-and-endorsements' );
}


function filter_block_categories_when_post_provided( $block_categories, $editor_context ) {
    if ( ! empty( $editor_context->post ) ) {
        array_push(
            $block_categories,
            array(
                'slug'  => 'ilogic-category',
                'title' => __( 'iLogic Blocks', 'ilogic' ),
                'icon'  => null,
            )
        );
    }
    return $block_categories;
}

add_filter( 'block_categories_all', 'filter_block_categories_when_post_provided', 10, 2 );

  /*
  * Action for load more posts
  */

function endorsement_load_more() {
	$countPosts = (isset($_GET['countPosts'])) ? $_GET['countPosts'] : 8;

	$args = array(
		'post_type' => 'endorsement',
		'posts_per_page' => $countPosts,
		'offset' => 8,
	);

	$my_posts = new WP_Query($args);

	$count_posts =  $my_posts->found_posts;
	$postLimit = intval($countPosts) + 8;

	if ( $postLimit >= intval($count_posts) ) {
		echo '<style>.ilLoadMore{display:none !important;}</style>';
	  }

	 if ( $my_posts->have_posts() ) :
        while ( $my_posts->have_posts() ) : 
			
			$my_posts->the_post();

			$publication_or_endorsement_link = get_post_meta(get_the_ID(), 'publication_or_endorsement_link', true);
			?>

			<div class="il_endorsement">
				<div class="il_pe_text">
					<?php if (get_the_excerpt()) { ?>
							<a href="<?php echo $publication_or_endorsement_link; ?>"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20">
									<path id="Path_246" data-name="Path 246" d="M6,0,0,10H11.958l6,10H18l6-10L18,0Z" transform="translate(0 0)" fill="#009688"/>
									</svg>
							</span><?php echo get_the_excerpt(); ?></a>
					<?php } ?>
				</div>
			</div>
		<?php
        endwhile;
    endif;

    wp_die();
}
  
add_action('wp_ajax_endorsement_load_more', 'endorsement_load_more');
add_action('wp_ajax_nopriv_endorsement_load_more', 'endorsement_load_more');
