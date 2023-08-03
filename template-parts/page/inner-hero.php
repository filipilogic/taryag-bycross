<?php

$svg_color = get_field('icon_and_line_colors');
$title = get_field('inner_hero_title');
$subtitle = get_field('inner_hero_subtitle');
$content = get_field('inner_hero_content');
$title_color = get_field('title_color');
$icon = get_field('disable_icon');
$bg_img_mob = get_field('mobile_background');
$size = 'full';
$custom_classes = get_field('custom_classes');

if ( have_rows('top_bar_links') ) :

$class = 'il_top_bar_links';

?>
<div class="<?php echo $class ?>">
<div class="il_top_bar_links_inner container">
	<ul>
		<?php while( have_rows('top_bar_links') ) : the_row();
			$link = get_sub_field('link');
			if( $link ):
				$link_url = $link['url'];
				$link_title = $link['title'];
				$link_target = $link['target'] ? $link['target'] : '_self';
			?>
			<li style="background-color: <?php echo esc_url( $svg_color ); ?>"><a class="il_btn" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a></li>
			<?php endif;
		endwhile; ?>
	</ul>
</div>
</div>
<?php endif; ?>

<div class="il_inner_hero">
<div class="il_inner_hero_bg">
<?php

if ( has_post_thumbnail() ) {
	the_post_thumbnail();
}
else {
	$bg = get_field('default_hero', 'option');
	if( $bg ) {
		echo wp_get_attachment_image( $bg, $size, array( 'class' => 'desk_bg' ) );
	}
} ?>
</div>

	<div class="il_inner_hero_inner <?php echo esc_html($custom_classes); ?>">
		<div class="il_inner_hero_inner_top">
			<div class="il_block_bg">
				<?php
					if( $bg_img_mob ) {
						echo wp_get_attachment_image( $bg_img_mob, $size, "",array( 'class' => 'mob_bg' ) );
					} 
				?>
			</div>

			<div class="container">
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1349 446" class="il_inner_hero_bg_svg">
				<defs>
					<clipPath id="clip-path">
					<rect id="Rectangle_910" data-name="Rectangle 910" width="1349" height="446" transform="translate(-22883 326)" fill="#fff" stroke="#707070" stroke-width="1"/>
					</clipPath>
					<linearGradient id="linear-gradient" x1="0.892" y1="0.141" x2="0.037" y2="0.781" gradientUnits="objectBoundingBox">
					<stop offset="0" stop-color="#06286f"/>
					<stop offset="1" stop-color="#021031"/>
					</linearGradient>
				</defs>
				<g id="Mask_Group_261" data-name="Mask Group 261" transform="translate(22883 -326)" clip-path="url(#clip-path)">
					<g id="Group_2117" data-name="Group 2117">
					<path id="Path_1390" data-name="Path 1390" d="M-20618,267V717l143.924-143.5h897.746l306.342-305.431Z" transform="translate(-2265 53)" fill="url(#linear-gradient)"/>
					<path id="Path_1391" data-name="Path 1391" d="M-20640.828,737.834l166.74-164.316h900.125l304.969-304.056" transform="translate(-2265.172 53)" fill="none" stroke="<?php echo esc_html($svg_color); ?>" stroke-width="5"/>
					</g>
				</g>
				</svg>
				<h1 class="il_inner_hero_title" style="color: <?php echo $title_color; ?>"><span><?php if($title):
					echo $title;

				else:
					the_title();

				endif; ?></span>
				<?php if(!$icon): ?>
				<span><svg xmlns="http://www.w3.org/2000/svg" width="47.738" height="41.343" viewBox="0 0 47.738 41.343" class="il_inner_hero_icon_svg"><path id="Path_637" data-name="Path 637" d="M11.935,0,0,20.672H23.785L35.72,41.343H35.8L47.739,20.672,35.8,0Z" transform="translate(0 0)" fill="<?php echo esc_html($svg_color); ?>"/></svg></span>
				<?php endif; ?>
				</h1>
				<?php if($subtitle): ?>
				<div class="il_inner_hero_text">
					<?php echo $subtitle; ?>
				</div>
				<?php endif; ?>
			</div>
		</div>

				
		<?php if( have_rows('content') ): ?>
			<?php while( have_rows('content') ): the_row();
				$title = get_sub_field('title');
				$text = get_sub_field('text');

				if( $title ):
				?>
				<div class="il_inner_hero_inner_bottom">
					<div class="container">
						<div class="il_inner_hero_inner_bottom_content">
							<h2 class="il_inner_hero_inner_bottom_title tg_title_1"><?php echo $title; ?></h2>
							<p class="il_inner_hero_inner_bottom_text"><?php echo $text ?></p>
							<?php get_template_part('components/buttons'); ?>
						</div>
					</div>
				</div>
				<?php endif; ?>
			<?php endwhile; ?>
		<?php endif; ?>
	</div>


</div>
