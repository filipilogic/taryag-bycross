<?php
$height = get_field_object('height');

$class = 'il_block il_triggers';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
if ( ! empty( $height ) ) {
    $class .=  ' ' . $height['value'];
}

if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}
?>

<div class="<?php echo $class; ?>">
	<div class="il_triggers_inner_wrap">
		<div class="container il_triggers_inner">
			<?php get_template_part('components/title'); ?>
		</div>
	</div>
	<div class="si_container">
		<div class="si_container_inner">
			<div class="si_triggers">
			<div class="il_block_bg">
			<?php
				$trigger_background = get_field('trigger_background');
				$size = 'full';
				if( $trigger_background ) {
					echo wp_get_attachment_image( $trigger_background, $size );
				} ?>
			</div>
			<div class="container">
				<div class="triggers_container">
					<?php
						// Check rows existexists.
						if( have_rows('slide_in_trigger') ):
							$item=1;
							// Loop through rows.
							while( have_rows('slide_in_trigger') ) : the_row();

								// Load sub field value.
								$trigger_text = get_sub_field('trigger_text'); ?>
								<div class="trigger-wrap">
									<a class="si_trigger si-<?php echo $item; ?>"><span class="si_tt"><?php echo $trigger_text; ?></span><span class="si_ti"><svg xmlns="http://www.w3.org/2000/svg" width="30.256" height="22.186" viewBox="0 0 30.256 22.186">
  <g id="fast-forward" transform="translate(0 -64.013)">
    <g id="Group_2753" data-name="Group 2753" transform="translate(13.11 64.013)">
      <g id="Group_2752" data-name="Group 2752">
        <path id="Path_1909" data-name="Path 1909" d="M224.887,74.432l-9.076-10.085a1.009,1.009,0,0,0-.75-.335H209.01a1.008,1.008,0,0,0-.75,1.682l8.469,9.411-8.469,9.409a1.009,1.009,0,0,0,.75,1.684h6.051a1.022,1.022,0,0,0,.75-.333l9.076-10.085A1.009,1.009,0,0,0,224.887,74.432Z" transform="translate(-208 -64.013)" fill="#009688"/>
      </g>
    </g>
    <g id="Group_2755" data-name="Group 2755" transform="translate(0 64.013)">
      <g id="Group_2754" data-name="Group 2754" transform="translate(0)">
        <path id="Path_1910" data-name="Path 1910" d="M16.887,74.432,7.811,64.348a1.009,1.009,0,0,0-.75-.335H1.01A1.008,1.008,0,0,0,.259,65.7l8.469,9.411L.259,84.515A1.009,1.009,0,0,0,1.01,86.2H7.06a1.022,1.022,0,0,0,.75-.333l9.076-10.085A1.009,1.009,0,0,0,16.887,74.432Z" transform="translate(0 -64.013)" fill="#009688"/>
      </g>
    </g>
  </g>
</svg>
</span></a>
									<a class="close-trigger"></a>
								</div>
								<?php $item++;?>
								<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>

				<?php
					// Check rows existexists.
					if( have_rows('hero_slide_in') ):
						$item2=1;
						// Loop through rows. ?>

						<?php while( have_rows('hero_slide_in') ) : the_row();
						$si_title = get_sub_field('si_title');
						?>
							<a class="mobile_trigger si_trigger si-<?php echo $item2; ?>"><span class="si_tt"><?php echo $si_title; ?></span><span class="si_ti"><svg xmlns="http://www.w3.org/2000/svg" width="24.612" height="25.899" viewBox="0 0 24.612 25.899"><path d="M5.061,0,0,8.365H10.087l5.062,8.365h.036l5.061-8.365L15.185,0Z" transform="translate(14.489 0) rotate(60)" fill="#f21971"/></svg></span></a>
						<div class="tg_slidein si-<?php echo $item2; ?>">
						<?php $si_title = get_sub_field('si_title');
						$si_content = get_sub_field('si_content');
						$si_bg = get_sub_field('si_bg');
						$si_bg_mob = get_sub_field('si_bg_mob');
						$size = 'full';
						 ?>
						<div class="si_bg il_block_bg">
						<?php if( $si_bg ) {
							echo wp_get_attachment_image( $si_bg, $size, "",array( 'class' => 'desk_bg' ) );
						} ?>
						<?php if( $si_bg_mob ) {
							echo wp_get_attachment_image( $si_bg_mob, $size, "",array( 'class' => 'mob_bg' ) );
						} ?>
						</div>
						<div class="si_inner container">
							<div class="si_content">
								<h2 class="si_title"><?php echo $si_title; ?><svg xmlns="http://www.w3.org/2000/svg" width="24.612" height="25.899" viewBox="0 0 24.612 25.899"><path d="M5.061,0,0,8.365H10.087l5.062,8.365h.036l5.061-8.365L15.185,0Z" transform="translate(14.489 0) rotate(60)" fill="#f21971"/></svg></h2>
								<div class="si_text"><?php echo $si_content; ?></div>
								<?php get_template_part('components/buttons'); ?>
							</div>
						</div>
						<?php $item2++; ?>
					</div>
					<?php endwhile; ?>

				<?php endif; ?>

		</div>
	</div>
</div>
