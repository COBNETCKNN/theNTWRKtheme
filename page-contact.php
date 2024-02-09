<?php get_header(); ?>

<!-- Contact Heading Section -->
<section id="contact_heading">
    <div class="container mx-auto relative">
        <!-- Line Art -->
        <div class="page_lineArt"></div>
        <div class="mx-10">
            <div class="contact_heading__wrapper pt-24 pb-1">
                <h1 class="text-center lg:text-left thentwrktheme_page__heading text-white font-prompt lg:ml-14">Contact</h1>
            </div>
        </div>
    </div>
</section>

<section id="contactContent" class="my-16">
    <div class="container mx-auto">
        <div class="mx-10">
            <div class="grid lg:grid-cols-2 gap-4">
            <?php if( have_rows('contact_page') ): ?>
                <?php while( have_rows('contact_page') ): the_row(); 

                    // Get sub field values.
                    $contactPageImage = get_sub_field('contact_page_left_side');
                    $contactPageFormShortcode = get_sub_field('contact_page_contact_form_shortcode'); ?>

                    <!-- Thumbnail -->
                    <div class="hidden lg:block contactPage_thumbnail__wrapper mt-0 md:mt-5 xl:mt-0">
                        <?php 
                            $size = 'full'; // (thumbnail, medium, large, full or custom size)
                            if( $contactPageImage ) {
                                echo wp_get_attachment_image( $contactPageImage, $size );
                            }
                        ?>
                    </div>
                    <!-- Contact Form -->
                    <div class="">
                    <?php if( have_rows('contact_page_contact_form') ): ?>
                        <?php while( have_rows('contact_page_contact_form') ): the_row(); 
                        
                        $contactPageFormText = get_sub_field('contact_page_contact_form_text');
                        $contactPageShortcode = get_sub_field('contact_page_contact_form_shortcode');
                        ?>

                        <p class="text-center lg:text-left text-white font-jost thentwrkTheme_paragraph mb-0 xl:mb-5 xl:w-2/3"><?php echo $contactPageFormText; ?></p>
                        <div class="contactPage_contactForm text-white font-jost mt-10 xl:mt-0 lg:my-5">
                            <?php echo do_shortcode($contactPageShortcode); ?>
                        </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>