<?php
$margin = get_field_object('margin');
$padding = get_field_object('padding');

$class = 'il_block il_publications-and-endorsements';
if ( ! empty( $margin ) ) {
    $class .=  ' ' . $margin['value'];
}
if ( ! empty( $padding) ) {
    $class .=  ' ' . $padding['value'];
}

?>

<div class="<?php echo $class; ?>">
    <?php get_template_part('components/background'); ?>
        <div class="il_publications">
            <div class="container">
                    <?php 
                        $args = array(
                            'post_type' => 'publication',
                            'post_status' => 'publish',
                            'posts_per_page' => 1
                        );
                        $posts = new WP_Query( $args );
                        
                        if ( $posts->have_posts() ) :
                        
                            while ( $posts->have_posts() ) :
                                $posts->the_post();

                                $publication_or_endorsement_link = get_post_meta(get_the_ID(), 'publication_or_endorsement_link', true);
                                ?>

                                <div class="il_publication">
                                    <div class="il_pe_left">
                                        <h2 class="il_pe_title tg_title_1 tg_dark"><?php the_title(); ?><?php ?></h2>
                                        <span class="date"><?php echo get_the_date(); ?></span>
                                        <div class="il_pe_text">
                                        <?php if (get_the_excerpt()) {
                                            echo get_the_excerpt();
                                        } else {
                                            echo wp_trim_words(get_the_content(), 25);
                                        } ?>
                                    </div>
                                    <a class="il_btn" href="<?php echo $publication_or_endorsement_link; ?>"><span class="il_btn_text">Learn more</span><span class="il_btn_icon"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="27.109" height="29.565" viewBox="0 0 27.109 29.565"><defs><clipPath id="a"><rect width="24.1" height="17.388" fill="#fec000"></rect></clipPath></defs><g transform="translate(12.05 29.565) rotate(-120)" style="isolation:isolate"><g transform="translate(0 0)" style="mix-blend-mode:multiply;isolation:isolate"><g clip-path="url(#a)"><path d="M23.773,11.863H9.918L3.069,0,0,5.316,6.97,17.388h13.94l3.19-5.525h-.326Z" transform="translate(0 0)" fill="#fec000"></path></g></g></g></svg></span></a>
                                    </div>
                                    <div class="il_pe_right">
                                        <?php the_post_thumbnail(); ?>
                                    </div>
                                </div>
                                <?php
                            endwhile;

                            wp_reset_query();
                        endif;
                    ?>

            </div>
        </div>
        
        <div class="il_endorsements">
            <div class="container">
                <?php 
                    $args = array(
                        'post_type' => 'endorsement',
                        'post_status' => 'publish',
                        'posts_per_page' => 1
                    );
                    $posts = new WP_Query( $args );
                    
                    get_template_part('components/intro');

                    if ( $posts->have_posts() ) :
                    
                        while ( $posts->have_posts() ) :
                            $posts->the_post(); 
                            
                            $publication_or_endorsement_link = get_post_meta(get_the_ID(), 'publication_or_endorsement_link', true);
                            ?>

                            <div class="il_endorsement">
                                <div class="il_pe_text">
                                    <?php if (get_the_excerpt()) { ?>
                                        <a href="<?php echo $publication_or_endorsement_link; ?>"><span><svg xmlns="http://www.w3.org/2000/svg" width="24" height="20" viewBox="0 0 24 20">
                                        <path id="Path_246" data-name="Path 246" d="M6,0,0,10H11.958l6,10H18l6-10L18,0Z" transform="translate(0 0)" fill="#009688"/>
                                    </svg>
                                    </span><?php echo get_the_excerpt(); ?></a>
                                    <?php } ?>
                                </div>
                            </div>
                            <?php
                        endwhile;

                        wp_reset_query();
                    endif;
                ?>

            </div>
    </div>

</div>
