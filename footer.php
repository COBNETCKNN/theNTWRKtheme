<?php

$args = array( 
    'post_type' => 'page',
    'page_id' => 21
);

$footerQuery = new WP_Query($args);
if ($footerQuery->have_posts()) {
    // Loop through the posts (in this case, just one)
    while ($footerQuery->have_posts()) {
        $footerQuery->the_post();
?>

<footer class="">
    <div class="container mx-auto">
        <div class="footerGrid grid lg:grid-cols-3 gap-4 py-10 mx-10">
            <!-- Left side -->
            <div class="col-span-2">
                <div class="logoWrapper">
                    <a href="<?php echo site_url(); ?>">
                        <?php 
                            $custom_logo_id = get_theme_mod( 'custom_logo' );
                            $logo = wp_get_attachment_image_src( $custom_logo_id , 'logo-size' );
                            if ( has_custom_logo() ) {
                                echo '<img class="logo" src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                            } else {
                                echo '<h1>' . get_bloginfo('name') . '</h1>';
                            }
                        ?>
                    </a>
                </div>
                <div class="footer_leftSide_content max-w-[420px]">
                    <?php if( have_rows('footer_content_left_side') ): ?>
                        <?php while( have_rows('footer_content_left_side') ): the_row(); 

                            // Get sub field values.
                            $heading = get_sub_field('footer_content_left_side_heading');
                            $subheading = get_sub_field('footer_content_left_side_subheading');
                            ?>

                            <h3 class="text-white font-prompt font-normal text-2xl mt-12 mb-4"><?php echo $heading; ?></h3>
                            <h4 class="text-white font-prompt font-normal text-lg"><?php echo $subheading; ?></h4>

                            <a class="getInTouch_button py-2 px-5 bg-green text-brown font-jost font-normal text-lg rounded-lg mt-6" type="button" href="<?php echo site_url('/contact')?>" target="_blank">Get in touch &#8594;</a>
                            
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
            <!-- Right side -->
            <div class="hidden lg:block col-span-1 mx-auto my-auto">
                <div class="footer_rightSide_content">
                <?php if( have_rows('footer_content_right_side') ): ?>
                        <?php while( have_rows('footer_content_right_side') ): the_row(); 

                            // Get sub field values.
                            $email = get_sub_field('footer_content_right_side_email');
                            $phoneNumber = get_sub_field('footer_content_right_side_phone_number');
                            ?>

                            <a href="mailto:<?php echo $email; ?>" class="footerLinks text-white font-prompt font-normal text-lg my-1"><?php echo $email; ?></a>
                            <a href="tel:<?php echo $phoneNumber; ?>" class="footerLinks text-white font-prompt font-normal text-lg"><?php echo $phoneNumber; ?></a>
                            <div class="footerRight_socialMedia flex justify-start mt-5">
                            <?php
                            if( have_rows('footer_content_right_side_social_media_icons') ):
                                while( have_rows('footer_content_right_side_social_media_icons') ) : the_row();

                                    $socialMedia_icon = get_sub_field('footer_content_right_side_repeater_icon');
                                    $socialMedia_link = get_sub_field('footer_content_right_side_repeater_link');
                                    $size = 'social-media-icons';
                                    if( $socialMedia_icon ) { ?>

                                    <a href="<?php echo $socialMedia_link; ?>" target="_blank"><?php echo wp_get_attachment_image( $socialMedia_icon, $size ); ?></a>

                                    <?php 
                                    }

                                endwhile;
                            endif;
                            ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</footer>

<?php
        }

    } else {
        // No posts found
        echo '<p>Page not found.</p>';
    }
    wp_reset_postdata();
?>

<?php wp_footer(); ?>
</body>
</html>