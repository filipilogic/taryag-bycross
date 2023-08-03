<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ilogic
 */

?>

	<footer id="colophon" class="site-footer">
		<div class="footer_main">
			<div class="container">
			<figure class="footer_logo">
				<?php
				$footer_logo = get_field('footer_logo', 'option');
				$size = 'full';
				if( $footer_logo ):
					echo wp_get_attachment_image( $footer_logo, $size );
				else:
				the_custom_logo();

				endif; ?>
			</figure>
			<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
						'menu_id'        => 'footer',
					)
				);
				?>
				<div class="footer-icons">
				<?php
				$iso_img = get_field('after_menu_icon', 'option');
				if( $iso_img ) {
					echo wp_get_attachment_image( $iso_img, $size );
				}
				$ln_link = get_field('footer_linkedin_link', 'option');
				$ln_img = get_field('footer_linkedin_icon', 'option');
				if( $ln_img && $ln_link ) {
					echo "<a href='" . $ln_link . "' target='_blank' class='ln-footer-link'>" . wp_get_attachment_image( $ln_img, $size ) . "</a>";
				} ?>
				</div>
			</div>
		</div>
		<div class="footer_bottom">
			<div class="container">
				<?php the_field('bottom_bar', 'option'); ?>
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>
<!--
	         (__)
     `\------(oo)
       ||    (__) <(What are you looking for?)
       ||w--||
-->
<?php the_field('body_bottom_script', 'option') ?> <!-- Body End External Script -->
</body>
</html>
