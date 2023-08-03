<?php

$margin = get_field_object('margin');
$padding = get_field_object('padding');

$class = 'il_block il_our-clients';
if ( ! empty( $block['className'] ) ) {
    $class .= ' ' . $block['className'];
}

if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}

if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

?>

<div class="<?php echo $class ?>">
<?php get_template_part('components/background'); ?>
	<div class="container">
        <div class="il_our-clients_inner">
        <?php get_template_part('components/title'); ?>
        <?php
            // Rows repeater
            if( have_rows('clients_row') ):

                while( have_rows('clients_row') ) : the_row(); ?>

                    <div class="il_our-clients_row">
                
                    <?php 
                        $image = get_sub_field('columns');
                            // Columns repeater
                            if( have_rows('columns') ):
                                
                                while( have_rows('columns') ) : the_row();

                                    $image = get_sub_field('image');
                                    $size = 'full';

                                    ?>
                                    <div class="il_col column">
                                        <?php if( $image ) {
                                            echo wp_get_attachment_image( $image, $size );
                                        }

                                        ?>
                                    </div>
                                <?php endwhile;
                            endif; ?>
                    </div>
                <?php endwhile;
            endif; ?>
        </div>
	</div>
</div>