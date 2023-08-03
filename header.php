<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ilogic
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php the_field('head_script', 'option') ?> <!-- Head(er) External Code -->
	<?php wp_head(); ?>
	<meta name="theme-color" content="#010d28" />
</head>

<body <?php body_class(); ?>>
<?php the_field('body_top_script', 'option') ?> <!-- Body Top External Script -->
<?php wp_body_open(); ?>
<div id="page" class="site header-version-1">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'ilogic' ); ?></a>
	<header id="masthead" class="header-main">
		<div class="container header-main-inner">
			<div class="logo-wrap">
				<?php the_custom_logo(); ?>
			</div><!-- .site-branding -->

			<nav id="site-navigation" class="main-navigation">
			<!-- Mobile Nav Button -->
			<button class="menu-toggle" onclick="this.classList.toggle('menu-opened');this.setAttribute('aria-expanded', this.classList.contains('menu-opened'))" aria-label="Main Menu">
				<svg viewBox="0 0 100 100">
					<path class="line line1" d="M 20,29.000046 H 80.000231 C 80.000231,29.000046 94.498839,28.817352 94.532987,66.711331 94.543142,77.980673 90.966081,81.670246 85.259173,81.668997 79.552261,81.667751 75.000211,74.999942 75.000211,74.999942 L 25.000021,25.000058" />
					<path class="line line2" d="M 20,50 H 80" />
					<path class="line line3" d="M 20,70.999954 H 80.000231 C 80.000231,70.999954 94.498839,71.182648 94.532987,33.288669 94.543142,22.019327 90.966081,18.329754 85.259173,18.331003 79.552261,18.332249 75.000211,25.000058 75.000211,25.000058 L 25.000021,74.999942" />
				</svg>
			</button>
			<!-- Mobile Nav Button -->
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					)
				);
				?>
			</nav><!-- #site-navigation -->
			<?php
			$nav_btn = get_field('button_after_nav', 'option');
			if( $nav_btn ):
				$nav_btn_url = $nav_btn['url'];
				$nav_btn_title = $nav_btn['title'];
				$nav_btn_target = $nav_btn['target'] ? $nav_btn['target'] : '_self';
				?>
				<a class="nav-button il_btn" href="<?php echo esc_url( $nav_btn_url ); ?>" target="<?php echo esc_attr( $nav_btn_target ); ?>"><?php echo esc_html( $nav_btn_title ); ?></a>
			<?php endif; ?>
		</div>
	</header><!-- #masthead -->
