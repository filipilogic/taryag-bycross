<?php
if( have_rows('buttons') ): ?>
	<div class="il_buttons">
		<?php while( have_rows('buttons') ) : the_row();

			$button = get_sub_field('button');
			if( $button ):
				$button_url = $button['url'];
				$button_title = $button['title'];
				$button_target = $button['target'] ? $button['target'] : '_self';
				?>
				<a class="il_btn" href="<?php echo esc_url( $button_url ); ?>" target="<?php echo esc_attr( $button_target ); ?>"><span class="il_btn_text"><?php echo esc_html( $button_title ); ?></span><span class="il_btn_icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27.109" height="29.565" viewBox="0 0 27.109 29.565"><defs><clipPath id="a"><rect width="24.1" height="17.388" fill="#fec000"/></clipPath></defs><g transform="translate(12.05 29.565) rotate(-120)" style="isolation:isolate"><g transform="translate(0 0)" style="mix-blend-mode:multiply;isolation:isolate"><g clip-path="url(#a)"><path d="M23.773,11.863H9.918L3.069,0,0,5.316,6.97,17.388h13.94l3.19-5.525h-.326Z" transform="translate(0 0)" fill="#fec000"/></g></g></g></svg></span></a>
			<?php endif;

		endwhile; ?>
	</div>
<?php endif; ?>
