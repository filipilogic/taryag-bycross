<?php
$style = get_field_object('choose_style');
$layout = get_field_object('layout');
$stack = get_field_object('stack');

$margin = get_field_object('margin');
$padding = get_field_object('padding');

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class = 'il_block il_section';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}
if ( ! empty( $style ) ) {
    $class .=  ' ' . $style['value'];
}
if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

?>


<div <?php echo $anchor; ?> class="<?php echo $class; ?>">
<?php get_template_part('components/background'); ?>
<div class="il_section_inner container">
<?php if( have_rows('info_box') ): ?>
<?php while( have_rows('info_box') ): the_row();
	$title = get_sub_field('title');
	$text = get_sub_field('text');
	$tag = get_sub_field('heading_tag');
	$title_color = get_sub_field('title_color');
	$title_style = get_sub_field('title_style');
	$prefix = get_sub_field('buttons_prefix');
	?>

	<div class="il_section_content">
		<<?php echo esc_html($tag); ?> class="il_section_title tg_title_1 <?php echo $title_style; ?>" style="color: <?php echo $title_color; ?>;"><?php echo $title; ?></<?php echo esc_html($tag); ?>>
		<div class="il_section_text"><?php echo $text ?></div>
		<?php if($prefix) { ?>
		<div class="tg_btns_wrap">
		<strong class="tg_buttons_prefix"><?php	echo $prefix; ?></strong>
		<?php }
			 get_template_part('components/buttons');
		if($prefix) { ?>
		</div>
		<?php } ?>
	</div>

<?php endwhile; ?>
<?php endif; ?>

</div>
</div>