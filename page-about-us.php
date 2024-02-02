<?php get_header(); ?>

<!-- About Us Heading Section -->
<section id="aboutUs_heading">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="aboutUs_heading__wrapper pt-24 pb-1">
                <h1 class="text-center lg:text-left thentwrktheme_page__heading text-white font-prompt lg:ml-14">About</h1>
            </div>
        </div>
    </div>
</section>

<!-- About Us Content Section -->
<section id="aboutUs_content" class="my-10 lg:h-screen">
    <div class="container mx-auto">
        <div class="mx-10">
            <?php if( have_rows('about_us_page') ): ?>
                <?php while( have_rows('about_us_page') ): the_row(); 

                    // Get sub field values.
                    $aboutUsContentText = get_sub_field('about_us_left_side_content_text');
                    ?>

                    <div class="grid lg:grid-cols-2 gap-10 py-2">
                        <!-- Left side -->
                        <div class="text-white thentwrkTheme_paragraph font-jost mb-10 lg:mb-0 lg:my-10">
                            <div class="text-center lg:text-left aboutUs_content__wrapper">
                                <?php echo $aboutUsContentText; ?>
                            </div>
                            <!-- Get in touch carrds -->
                            <div class="aboutUs_getInTouch__wrapper mt-10 lg:mt-0 lg:my-24">
                                <!-- First card -->
                                <div class="flex justify-start items-center aboutUs_getInTouch__cards px-10 py-5 bg-darkBrown lg:w-9/12 mt-6">
                                    <div class="">
                                        <h4 class="text-white font-prompt aboutUs_cards__title">Stay updated with us</h4>
                                        <?php if( have_rows('footer_content_right_side', 21) ): ?>
                                            <?php while( have_rows('footer_content_right_side', 21) ): the_row(); ?>
                                                    <div class="footerRight_socialMedia flex justify-start mt-2">
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
                                                    <?php
                                            endwhile;
                                        endif;
                                        ?>
                                    </div>
                                </div>
                                <!-- Second Card -->
                                <div class="flex justify-start items-center aboutUs_getInTouch__cards px-10 py-5 bg-darkBrown lg:w-9/12 mt-6">
                                    <div class="">
                                        <h4 class="text-white font-prompt aboutUs_cards__title">Interested in joining the team?</h4>
                                        <a class="py-2 text-white font-jost font-normal text-lg" type="button" href="<?php echo site_url('/contact')?>" target="_blank">Get in touch <span class="text-green">&#8594;</span></a>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <!-- Right side -->
                        <div class="">
                            <?php 
                            $aboutUsGallery = get_sub_field('about_us_right_side_gallery');
                            $size = 'large'; // (thumbnail, medium, large, full or custom size)
                            if( $aboutUsGallery ): 
                            $i = 0;
                            ?>
                                <div class="gridAboutUs">
                                    <?php foreach( $aboutUsGallery as $aboutUsGalleryImage ): ?>
                                        <div class="gridAboutUs gridAboutUs-item-<?php echo $i; ?>">
                                            <?php echo wp_get_attachment_image( $aboutUsGalleryImage, $size ); ?>
                                        </div>
                                    <?php 
                                    $i++;
                                    endforeach; ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?php get_footer(); ?>