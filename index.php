<?php get_header(); ?>

<!-- Hero Section -->
<section id="hero">
    <div class="hero_video__overlay relative h-[82vh]">
        <video autoplay muted loop id="myVideo">
        <source src="<?php echo get_template_directory_uri() . '/assets/videos/thentwrkvideo.mp4'; ?>" type="video/mp4">
        </video>
    </div>
    <!-- Line Art -->
    <img class="homepage_lineArt__top" src="<?php echo get_template_directory_uri() . './assets/LineArt/Group73.png' ?>" alt="Line Art Group 74">
</section>

<!-- Our Projcts Section -->
<section id="ourProjects">
  <div class="container mx-auto">
    <div class="mx-10 ">
      <?php if( have_rows('overview_content') ): ?>
        <?php while( have_rows('overview_content') ): the_row(); 

            $overviewTitle = get_sub_field('overview_heading');

            ?>
            <h1 class="homepage_overview__title text-center lg:text-left text-white font-prompt lg:w-[760px]"><?php echo $overviewTitle; ?></h1>

            <div class="grid lg:grid-cols-6 gap-4 mt-16 lg:mt-36">
              <!-- Left side -->
              <div class="lg:col-span-2">
                <?php 
                  $overviewContent = get_field('overview_content'); 
                  $overviewLeftSide = $overviewContent['overview_left_side'];
                  $overviewLeftSideTitle = $overviewLeftSide['overview_left_side_heading'];
                ?>

                <span class="homepageOverview_ourProjects__span text-center lg:text-left text-green font-jost">Our projects</span>
                <h3 class="thentwrkTheme_title text-center lg:text-left font-prompt text-white mt-2"><?php echo $overviewLeftSideTitle; ?></h3>
              </div>
              <!-- Right side -->
              <div class="lg:col-span-4 lg:ml-24 no-cursor">
                <?php 
                    $overviewRightSide = $overviewContent['overview_right_side'];
                    $overviewRightSideDescription = $overviewRightSide['overveiw_right_side_description'];
                  ?>

                  <p class="thentwrkTheme_paragraph text-center lg:text-left text-white font-normal font-jost lg:w-10/12"><?php echo $overviewRightSideDescription; ?></p>
                  <a class="ourProejcts_getInTouch__button getInTouch_button py-2 px-5 bg-green text-brown font-jost font-normal text-lg rounded-lg mt-6" type="button" href="<?php echo get_post_type_archive_link('project')?>" target="_blank">View all work &#8594;</a>
              </div>
            </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
    <div id="specificDiv" class="ourProjects_carousel my-14 lg:my-24">
      <?php
        // The Query
        $args = array(
            'post_type' => 'project',   // Specify the custom post type
            'posts_per_page' => -1,      // Number of posts to display
            'orderby' => 'date',        // Order by date
            'order' => 'DESC',           // Sort in descending order
        );

        $projectQuery = new WP_Query($args); ?>

        <div class="owl-carousel owl-theme">

        <?php 
        // The Loop
        if ($projectQuery->have_posts()) :
            while ($projectQuery->have_posts()) : $projectQuery->the_post(); ?>
                
          <a class="hover" href="<?php the_permalink(); ?>">
            <div class="projectsCard_wrapper relative">
                <?php the_post_thumbnail('project-carousel') ?>
              <h3 class="projectCard_title font-prompt text-white absolute bottom-1 left-3 z-20"><?php the_title(); ?></h3>
            </div>
          </a>

          <?php 
            endwhile;
        else :
            // No posts found
            echo 'No projects found';
        endif; ?>

        </div>
        <!-- Cursor blob element -->
        <div class="cursor-blob"></div>
        <?php 
        // Restore original post data
        wp_reset_postdata();
      ?>
    </div>
  </div>
</section>

<!-- Services Section -->
<section id="services" class="my-10 no-cursor">
  <div class="container mx-auto">
    <div class="servicesHeading mx-10 mb-14">
      <span class="homepageOverview_ourProjects__span text-green font-jost">Services</span>
      <h3 class="thentwrkTheme_title text-center lg:text-left font-prompt text-white mt-2">What we do</h3>
    </div>
  </div>
  <!-- Upper Slider -->
  <?php 
  if( have_rows('services_section') ): ?>
    <?php while( have_rows('services_section') ): the_row(); 
      $upperSlider = get_sub_field('services_section_upper_slider');
      $size = 'services-carousel'; // (thumbnail, medium, large, full or custom size)
      if( $upperSlider ): ?>
          <div class="my-carousel-reverse">
            <?php foreach( $upperSlider as $upperSliderImage ): ?>
              <div class="my-slide-reverse">
                <?php echo wp_get_attachment_image( $upperSliderImage, $size ); ?>
              </div>
            <?php endforeach; ?>
          </div>
      <?php endif; ?>
  <!-- Bottom slider -->
  <?php 
    $bottomSlider = get_sub_field('services_section_bottom_slider');
    if( $bottomSlider ): ?>
        <div class="my-carousel mt-14">
          <?php foreach( $bottomSlider as $bottomSliderImage ): ?>
            <div class="my-slide">
              <?php echo wp_get_attachment_image( $bottomSliderImage, $size ); ?>
            </div>
          <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="container mx-auto">
      <div class="mx-10 services_content mt-14 lg:mt-24 mb-0 lg:mb-10">
            <?php 
              $servicesHeading = get_sub_field('services_section_heading');
              $servicesParagraph = get_sub_field('services_section_paragraph');
            ?>

            <h3 class="thentwrkTheme_title text-center lg:text-left font-prompt text-white mb-5"><?php echo $servicesHeading; ?></h3>
            <p class="thentwrkTheme_paragraph text-center lg:text-left text-white font-normal font-jost lg:w-1/2"><?php echo $servicesParagraph; ?></p>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
</section>

<!-- Connect and Join Section -->
<section id="connectAndJoin" class="mt-20 lg:mt-36 mb-24 no-cursor">
  <div class="container mx-auto relative">
    <!-- Line Art -->
    <img class="homepage_lineArt__bottom" src="<?php echo get_template_directory_uri() . './assets/LineArt/Group74.png' ?>" alt="Line Art Group 74">
    <div class="mx-10">
      <div class="grid lg:grid-cols-2 gap-8">
        <!-- Left side -->
        <div class="connectAndJoin_card__wrapper bg-darkBrown flex justify-center items-center py-6 px-12">
          <div class="connectAndJoin_card w-full h-fit">
            <?php if( have_rows('join_connect_section') ): ?>
              <?php while( have_rows('join_connect_section') ): the_row(); ?>


                  <?php if( have_rows('join_connect_section_left_side') ): ?>
                    <?php while( have_rows('join_connect_section_left_side') ): the_row(); 

                        $joinConnectLeftSideHeading = get_sub_field('join_connect_section_left_side_heading');
                        $joinConnectLeftSideParagraph = get_sub_field('join_connect_section_left_side_paragraph');

                        ?>

                        <h3 class="connectAndJoinSection_cardTitle text-center lg:text-left font-prompt text-white mb-5 lg:w-10/12"><?php echo $joinConnectLeftSideHeading; ?></h3>
                        <p class="thentwrkTheme_paragraph text-center lg:text-left text-white font-normal font-jost lg:w-[95%]"><?php echo $joinConnectLeftSideParagraph; ?></p>
                        <a class="connectAndJoin_getInTouch__button getInTouch_button py-2 px-5 bg-green text-brown font-jost font-normal text-lg rounded-lg mt-6" type="button" href="<?php echo site_url('/contact')?>" target="_blank">Get in touch &#8594;</a>

                    <?php endwhile; ?>
                  <?php endif; ?>
          </div>
        </div>

        <!-- Right side -->
        <div class="connectAndJoin_card__wrapper bg-darkBrown flex justify-center items-center py-6 px-12">
          <div class="connectAndJoin_card w-full h-fit">

            <?php if( have_rows('join_connect_section_right_side') ): ?>
              <?php while( have_rows('join_connect_section_right_side') ): the_row(); 

                  $joinConnectRightSideHeading = get_sub_field('join_connect_section_right_side_heading');
                  $joinConnectRightSideParagraph = get_sub_field('join_connect_section_right_side_paragraph');

                  ?>

                  <h3 class="connectAndJoinSection_cardTitle text-center lg:text-left font-prompt text-white mb-5 lg:mb-14 lg:w-10/12"><?php echo $joinConnectRightSideHeading; ?></h3>
                  <p class="thentwrkTheme_paragraph text-center lg:text-left text-white font-normal font-jost lg:w-[95%]"><?php echo $joinConnectRightSideParagraph; ?></p>
                  <?php
                  if( have_rows('footer_content_right_side', 21) ): ?>
                    <?php while( have_rows('footer_content_right_side', 21) ): the_row(); ?>
                            <div class="footerRight_socialMedia flex justify-center lg:justify-start mt-10 lg:mt-5">
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
              <?php endwhile; ?>
            <?php endif; ?>

            <?php endwhile; ?>
          <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>