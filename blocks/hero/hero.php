<?php
$subtitle = get_field('subtitle');
$content = get_field('content');
$height = get_field_object('height');
$margin = get_field_object('margin');
$padding = get_field_object('padding');

$class = 'il_block il_hero';
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
	<div class="il_block_bg">
		<video autoplay muted loop id="myVideo">
			<source src="<?php the_field('background_video'); ?>" type="video/mp4">
		</video>
	</div>
	<div class="container il_hero_inner">
	<?php get_template_part('components/title'); ?>
	<h2 class="il_hero_subtitle"><?php echo $subtitle ?></h2>
	<div class="il_hero_content"><?php echo $content ?></div>
	<?php get_template_part('components/buttons'); ?>
	</div>
</div>