<?php
$layout = get_field_object('layout');
$stack = get_field_object('stack');

$margin = get_field_object('margin');
$padding = get_field_object('padding');

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class = 'il_block il_section ol_section';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}

if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

$sec_in_class = 'il_section_inner container';

if ( ! empty( $stack ) ) {
    $sec_in_class .=  ' ' . $stack['value'];
}


?>


<div <?php echo $anchor; ?> class="<?php echo $class; ?>">
<?php get_template_part('components/background'); ?>
<div class="<?php echo $sec_in_class ?>">
<?php if( have_rows('info_box') ): ?>
<?php while( have_rows('info_box') ): the_row();
	$title = get_sub_field('title');
	$text = get_sub_field('text');
	$tag = get_sub_field('heading_tag');
	$title_color = get_sub_field('title_color');
	$style = get_sub_field('title_style');
	?>

	<div class="left">
		<<?php echo esc_html($tag); ?> class="il_section_title tg_title_1 <?php echo $style; ?>" style="color: <?php echo $title_color; ?>;"><?php echo $title; ?></<?php echo esc_html($tag); ?>>
		<div class="il_section_text"><?php echo $text ?></div>
		<?php get_template_part('components/buttons'); ?>
	</div>

<?php endwhile; ?>
<?php endif; ?>
<div class="right">
	<?php
	$image = get_field('media');
	$size = 'full'; // (thumbnail, medium, large, full or custom size)
	if( $image ) {
		echo wp_get_attachment_image( $image, $size );
	} ?>

	</div>
</div>
</div>
