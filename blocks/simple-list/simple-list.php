<?php

$cols = get_field_object('columns');
$tab_cols = get_field_object('tab_columns');
$mob_cols = get_field_object('mob_columns');

$margin = get_field_object('margin');
$padding = get_field_object('padding');

$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

$class = 'il_block il_simple-list il_columns';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}

if ( ! empty( $cols ) ) {
    $class .=  ' ' . $cols['value'];
}
if ( ! empty( $tab_cols ) ) {
    $class .=  ' ' . $tab_cols['value'];
}
if ( ! empty( $mob_cols ) ) {
    $class .=  ' ' . $mob_cols['value'];
}

if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding ) ) {
    $class .=  ' ' . $padding['value'];
}


 ?>

<div <?php echo $anchor; ?> class="<?php echo $class ?>">
<?php get_template_part('components/background'); ?>
	<div class="container">
		<?php get_template_part('components/intro'); ?>

		<div class="il_columns_inner">
        <?php
            // Columns repeater
            if( have_rows('columns_block') ):

                while( have_rows('columns_block') ) : the_row(); ?>
					<div class="il_col column">
						<?php get_template_part('components/list-items'); ?>
					</div>
                <?php endwhile;
            endif; ?>
        </div>
        <?php get_template_part('components/buttons'); ?>
	</div>
</div>
