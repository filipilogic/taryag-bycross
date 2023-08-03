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

$class = 'il_block il_certifications';
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

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

?>

<div <?php echo $anchor; ?> class="<?php echo $class ?>">
<?php get_template_part('components/background'); ?>
	<div class="container">
		<?php get_template_part('components/intro'); ?>
        <div class="il_certifications_inner">
        <?php
            // Columns repeater
            if( have_rows('certifications_block') ):

                while( have_rows('certifications_block') ) : the_row();

                $link = get_sub_field('link');
                if( $link ) {
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ? $link['target'] : '_self';
                }
                $bg_color = get_sub_field('text_background_color');
                $text = get_sub_field('text');

                // Title ?>
                <div class="il_col column">
                    <a class="il_cert_link" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?>
                        <div class="cert-comp-top">
                            <img src="/wp-content/uploads/2023/06/Layer-41.png">
                            <?php 
                            get_template_part('components/nested-title');
                            ?>
                        </div>

                        <div class="cert-comp-bottom" style="background-color: <?php echo $bg_color; ?>; border: 1px solid <?php echo $bg_color; ?>">
                            <?php echo $text; ?>
                        </div>
                    </a>
                </div>
                <?php endwhile;
            endif; ?>
        </div>
	</div>
</div>