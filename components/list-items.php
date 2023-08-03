<?php
if( have_rows('list_items') ): ?>
	<ul class="il_list_items">
		<?php while( have_rows('list_items') ) : the_row();

			$list_item = get_sub_field('list_item');
			if( $list_item ):
				?>
				<li class="il_list_item"><span class="il_list_item_icon"><svg xmlns="http://www.w3.org/2000/svg" width="24.429" height="21.156" viewBox="0 0 24.429 21.156"><path id="Path_246" data-name="Path 246" d="M6.108,0,0,10.578H12.171l6.108,10.578h.043l6.107-10.578L18.322,0Z" transform="translate(0 0)" fill="#009688"/></svg></span><span class="il_list_item_text"><?php echo esc_html( $list_item ); ?></span></li>
			<?php endif;

		endwhile; ?>
	</ul>
<?php endif; ?>
